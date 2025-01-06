<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create ()
    {
        return view('auth.login');
    }

    public function store ()
    {
        //validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        //attempt to login
        if (! Auth::attempt($attributes))
        {
            throw ValidationException::withMessages([
                'email' => 'sorry, the credentials do not match',

            ]);
        }

        //regenerate the sessin token
        request()->session()->regenerate();

        return redirect(route('job.index'));


    }

    public function destroy ()
    {
        Auth::logout();

        return redirect('/');
    }
}
