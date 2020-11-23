<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(request $request);
    $this->validate($request, [
        'name' => 'required',
        'email'=> 'required|email|unique:users',
        'passsword' => 'requred|string|min:8|confirmed'
        ]);

    $user = $this->newUser(request->all());

    if (empty($user)) {
        return response([
            'message' => 'Failed to create account'
            ]);
    } else {
        //send
    return response([
        'message' => 'account created, please verivy your email'
    ]);
}
}

    private function newUser(array $data)
{
    return User::create([
        'name' => $data['name'],
        'email' => 'data'['email']
        'password' => Hash::make($data['password']),
        'role_id' => 3,
        'activation_token' => Str::random( lenght: 20),

    ]);
}
