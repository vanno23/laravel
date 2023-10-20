<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserRegistrationController extends Controller
{
    public function register(UserRegistrationRequest $request)
    {
        // Validation has passed; you can now create a new user and store their information.

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        // Store user information in a file
        $userData = $user->name . '|' . $user->email . '|' . $user->password . PHP_EOL;
        file_put_contents('user_data.txt', $userData, FILE_APPEND);

        // Return a JSON response with the appropriate content type
        return response()->json(['message' => 'User registered successfully'], JsonResponse::HTTP_CREATED);
    }
}
