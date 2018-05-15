<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UsersRequest;

class UserController extends Controller
{
    public function __construct(User $modelUser)
    {
        $this->modelUser = $modelUser;
    }

    public function index()
    {
        return view('auth.auth.register');
    }

    public function store(UsersRequest $request)
    {
        $userArr = $request->only([
            'username',
            'password',
            'email',
            'fullname',
            'role',
        ]);

        try {
            $this->modelUser->create($userArr);
            $messages = trans('user.register_success');
        } catch (Exception $e) {
            $messages = trans('user.register_failure');
        }

        return redirect()->route('store')->with('msg', $messages);
    }
}
