<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request)

    {

        $validator = Validator::make($request->all(),[

            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8'

        ], [
        'name.required' => 'El campo nombre es requerido.',
        'name.string' => 'El campo nombre debe ser una cadena de caracteres.',
        'name.max' => 'El campo nombre no puede tener más de 255 caracteres.',
        'email.required' => 'El campo email es requerido.',
        'email.email' => 'El formato del correo electrónico es incorrecto.',
        'email.unique' => 'El correo electrónico ya está en uso.',
        'password.required' => 'El campo contraseña es requerido.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
    ]);

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => $validator->errors()->toArray()

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


    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Faltan campos requeridos',
                'message' => $validator->errors()->first()
            ], 422);
        }
        $user = User::where('email', $request->email)->first();


        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Las credenciales proporcionadas son incorrectas.'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $token = $user->createToken('access_token')->plainTextToken;

        return response()->json([
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email
                ],
                'access_token' => $token,
                'message' => 'Inicio de sesión exitoso.'
            ]
        ], Response::HTTP_OK);
    }



    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada correctamente.'
        ], Response::HTTP_OK);
    }
}
