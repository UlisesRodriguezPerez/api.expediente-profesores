<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Mail\RecoveryPassword;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->filter() // Asumiendo que tienes un scope filter
            ->sort() // Asumiendo que tienes un scope sort
            ->exactFilter(); // Asumiendo que tienes un scope exactFilter

        $total = $users->count();
        $users = $users->getOrPaginate(); // Asumiendo que tienes un método getOrPaginate

        return UserResource::collection($users)->additional(compact('total'));
    }

    public function store(StoreUserRequest $request)
    {

        info('store user');
        info($request->all());
        $roles = null;

        // Utilizar transacción para asegurarse de que todo ocurre sin errores o se revierte completamente.
        $user = DB::transaction(function () use ($request, &$roles) {
            $user = new User();
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->second_last_name = $request->second_last_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            // Si se envían roles con la solicitud, asocia esos roles al usuario
            if ($request->has('roles')) {
                info('roles');
                // Asegúrate de que todos los roles asignados existan
                $roles = Role::find($request->roles);
                $user->roles()->sync($roles->pluck('id')->toArray());
            }

            return $user; // Devuelve el usuario para que esté disponible fuera de la función de la transacción.
        });

        return UserResource::make($user);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return UserResource::make($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        info('update user');
        info($request->all());

        // Utilizar transacción para asegurar que todos los cambios se realicen juntos.
        $updatedUser = DB::transaction(function () use ($request, $user) {
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->second_last_name = $request->second_last_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            // Guardar cambios en el usuario
            $user->save();

            // Actualizar roles si se proporcionan en la solicitud
            if ($request->has('roles')) {
                // Encontrar los roles validos y sincronizarlos con el usuario
                $roles = Role::find($request->roles);
                $user->roles()->sync($roles->pluck('id')->toArray());
            }

            return $user;
        });

        // Todo ha salido bien, devolver el recurso del usuario actualizado.
        return new UserResource($updatedUser);
    }


    public function destroy(User $user)
    {
        $user->delete();
        return UserResource::make($user);
    }

    public function recoveryPassword($email) {
        info('recovery password');
        $user = User::where('email', $email)->first();
        if ($user) {
            $password = Str::random(8);
            $user->password = Hash::make($password);
            $user->save();
            Mail::to($user->email)->send(new RecoveryPassword($user, $password));
            return response()->json(['message' => 'Se ha enviado un correo con la nueva contraseña'], 200);
        } else {
            return response()->json(['message' => 'No se ha encontrado el usuario'], 404);
        }
    } 
}
