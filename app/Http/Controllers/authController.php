<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class authController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
        ], [
            'username.required' => 'Please input the username'
        ]);

        $username = $request->input('username');

        if ($username == 'admin') {
            session(['is_logged_in' => true, 'user_id' => 987]);
            // return Redirect::route('admin');
            return redirect('/users');
        }
        return Redirect::route('login');
    }

    public function logout(Request $request)
    {
        if ($request->session()->has('is_logged_in')) {

            $request->session()->flush();
            // $request->session()->pull('is_logged_in');
            // $request->session()->pull('user_id');

        }
        return Redirect::route('login');
    }
}
