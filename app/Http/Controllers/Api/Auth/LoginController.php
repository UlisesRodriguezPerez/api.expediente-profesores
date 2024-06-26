<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(Request $request) {
        info('1');
        info($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        info('2');

        $user = User::where(['email' => $request->email])->firstOrFail();

        info('3');

        if (Hash::check($request->password, $user->password)) {
            return UserResource::make($user);
        } else {
            return response()->json(['message' => 'Los credenciales son incorrectos'], 401);
        }
    }
}
