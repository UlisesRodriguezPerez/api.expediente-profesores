<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'last_name' => 'required|string|max:255',
            'second_last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $user = new User();
        $user->name = $request->get('name');
        $user->last_name = $request->get('last_name');
        $user->second_last_name = $request->get('second_last_name');
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

        $user->save();

        return UserResource::make($user);
    }
}
