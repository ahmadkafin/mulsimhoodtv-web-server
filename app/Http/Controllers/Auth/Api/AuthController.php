<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\AuthValidation;

class ApiAuthController extends Controller
{

    protected $authValidation;

    public function __construct(AuthValidation $authValidation)
    {
        $this->valid = $authValidation;
    }

    public function register(Request $request)
    {
        $validator = $this->valid->registerValidation($request->all(), $this->pesan());

        if ($validator->fails()) {
            $vals = $validator->errors()->all();
            return $this->errors($vals[0]);
        }

        $request = $this->valid->popDataRegister($request);
        $user = User::create($request);
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = [
            'token'     => $token,
            'status'    => 200
        ];
        return response()->json($response);
    }

    public function login(Request $request)
    {
        $validator = $this->valid->loginValidation($request->all(), $this->pesan());

        if ($validator->fails()) {
            $vals = $validator->errors()->all();
            return $this->errors($vals[0]);
        }

        $user = User::where('email', $request->username)
            ->orWhere('username', $request->username)
            ->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant')->accessToken;

                User::updateOrCreate(
                    [$request->username],
                    ['firebase_token' => $request->firebase_token]
                );

                $response = [
                    'token'     => $token,
                    'status'    => 200,
                    'message'   => 'You Have Successfully Logins',
                    'user'      => $user
                ];
                return response()->json($response);
            } else {
                return $this->errors('Password Salah');
            }
        } else {
            return $this->errors('Username ' . $request->username . ' tidak ditemukan');
        }
    }

    private function errors($msg)
    {
        $response = [
            'status'    => 422,
            'message'   => $msg
        ];
        return response()->json($response);
    }

    private function pesan()
    {
        return [
            'required'  => ':attribute tidak boleh kosong',
            'unique'    => ':input tidak bisa dipakai, sudah terdaftar',
            'confirmed' => ':attribute tidak sama',
            'email'     => ':input, bukan merupakan email valid'
        ];
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = [
            'message'   => 'kamu sukses logout',
            'status'    => 200
        ];
        return response()->json($response);
    }
}
