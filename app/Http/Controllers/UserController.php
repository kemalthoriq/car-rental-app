<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
            'driver_license' => 'required|string|unique:users',
        ]);

        $user = User::create($request->all());
        return response()->json($user, 201);
    }
}
