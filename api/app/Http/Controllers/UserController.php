<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::paginate(10);
        return $users;
    }

    public function getUser($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function updateUser($id, Request $request)
    {
        $payload = (object) $request->only([
            'name',
            'course',
            'is_active'
        ]);

        $user = User::find($id);
        $user->name = $payload->name;
        $user->course = $payload->course;
        $user->is_active = $payload->is_active;
        $user->save();
        return $user;
    }
}
