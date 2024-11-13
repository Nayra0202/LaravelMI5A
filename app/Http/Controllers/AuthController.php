<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user(); //AMBIL DATA USER DRI TABEL USERS SESUAI DGN EMAIL DAN PASS
            $success['token'] = $user->createToken('MDPApp')->plainTextToken; //BUAT TOKEN
            $success['name'] = $user->name; //RESPONSE NAMA USER
            return response()->json($success, 201);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
