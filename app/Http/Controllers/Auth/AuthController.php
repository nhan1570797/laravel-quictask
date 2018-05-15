<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.auth.login');
    }

    public function showLogin(AuthRequest $request)
    {
        $auth = Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ( $auth ) {
            return redirect()->action('Task\TaskController@index');
        }

        return redirect()->route('showLogin')->with('msg', trans('user.login_message'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
