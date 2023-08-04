<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use function response;

class GenerateToken extends Controller
{
    public function __invoke()
    {
        $person = [
            'email' => 'test@test.com',
            'password' => 'password',

        ];
        if (!Auth::attempt($person)) {
            $user = new User();
            $user->name = "admin";
            $user->email = $person['email'];
            $user->password = Hash::make($person['password']);

            $user->save();
        }
        if (Auth::attempt($person)) {
            $user = Auth::user();
            $adminToken = $user->createToken('admin-token', ['create', 'delete', 'update']);
            $updateToken = $user->createToken('update-token', ['create', 'update']);
            $baseToken = $user->createToken('base-token', ['none']);

            return response()->json([
                'adminToken' => $adminToken->plainTextToken,
                'updateToken' => $updateToken->plainTextToken,
                'baseToken' => $baseToken->plainTextToken
            ]);
        }

    }
}
