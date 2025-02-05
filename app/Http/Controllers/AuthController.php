<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;


class AuthController extends Controller
{
    public function login()
    {
        //dd(Hash::make(123456));
if(!empty(Auth::check()))
{
    return redirect('admin/dashbaord');
}

return view('auth.login');
    }

    public function AuthLogin(Request $request)
{
    $remember = !empty($request->remember) ? true : false;

    if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
{
    return redirect('admin/dashbaord');
}
else
{
    return redirect()->back()->with('error', 'Please enter currect email and password');
}

}

public function logout()
{
    Auth::logout();
    return redirect(url(''));
}
}
