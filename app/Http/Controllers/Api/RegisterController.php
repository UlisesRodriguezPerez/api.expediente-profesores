<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

        $user = User::create($request->all());

        return response()->json($user, 201);
    }
}
