<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

use App\Models\User;


class RegisterController extends Controller

{

    public function register(Request $request)

    {

        $validator = Validator::make($request->all(),[

            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8'

        ]);

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()

            ]);

        }

        $user = User::create([

            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),


        ]);

        $token = $user->createToken('remember_token')->plainTextToken;

        return response()->json([
            'user'    => $user,
            'remember_token'   => $token,
            'success' => true,
            'message' => 'Usuario registrado exitosamente.'
        ], 201);

    }

}
