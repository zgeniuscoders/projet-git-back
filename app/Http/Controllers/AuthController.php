<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors(), 403);

        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $token = $user->createToken('token')->plainTextToken;
            $user['token'] = $token;

            return response()->json([

                'data' => $user,
            ], 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }

    }

    public function login(Request $request)
    {

        $validated = Validator::make($request->all(), [

            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors(), 403);

        }
        $credentials = ['email' => $request->email, 'password' => $request->password];
        try {
            if (!auth()->attempt($credentials)) {
                return response()->json(['error' => 'Email or password incorrect ']);

            }
            $user = User::where('email', $request->email)->firstOrFail();
            $token = $user->createToken('token')->plainTextToken;
            $user['token'] = $token;
            return response()->json([
                'data' => $user,
            ], 201);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }





    }

    public function logout(Request $request)
    {

        $request->user()->currentAccessToken(null)->delete();

        return response()->json([
            'message' => "user has been logged out succesfully"
        ], 200);

    }
}
