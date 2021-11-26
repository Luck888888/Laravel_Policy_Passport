<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $responseArray = [];
        $responseArray['token'] = $user->createToken('MyApp')->accessToken;
        $responseArray['name'] = $user->name;

        return response()->json($responseArray, 200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $responseArray = [];
            $responseArray['token'] = $user->createToken('MyApp')->accessToken;
            $responseArray['name'] = $user->name;
            return response()->json($responseArray, 200);
        } else {
            return response()->json(['error' => 'Unauthenticated'], 203);
        }
    }

    public function getPostList()
    {
        $data = Post::all();
        $responseArray = [

            'status' => 'ok',
            'data'   => $data
        ];
        return response()->json($responseArray, 200);
    }

}
