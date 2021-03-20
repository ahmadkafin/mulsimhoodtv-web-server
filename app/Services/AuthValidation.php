<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AuthValidation
{
    public function registerValidation($request, $pesan)
    {
        return Validator::make($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users|email',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'type'     => 'string'
        ], $pesan);
    }

    public function popDataRegister($request)
    {
        return [
            'name'              => $request->name,
            'email'             => $request->email,
            'username'          => $request->username,
            'password'          => Hash::make($request['password']),
            'remember_token'    => Str::random(10),
            'type'              => $request['type'] ? $request['type']  : 0,
        ];
    }

    public function loginValidation($request, $pesan)
    {
        return Validator::make($request, [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8'
        ], $pesan);
    }
}
