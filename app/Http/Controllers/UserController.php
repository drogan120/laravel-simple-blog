<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index', ['users' => User::all()]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $userRequest)
    {
        $data = [
            'name' => $userRequest->name,
            'email' => $userRequest->email,
            'password' => bcrypt('pass' . $userRequest->email)
        ];

        User::create($data);

        return redirect('/user')->with('success', 'User has been added');
    }
}
