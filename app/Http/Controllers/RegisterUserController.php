<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisterUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request = request();
        // validate the request
        $attributes = $request->validate([
            'first_name' => ['required', 'max:255', 'min:3'],
            'last_name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email', 'max:255', 'min:9'],
            'password' => ['required', Password::default(), 'confirmed'], // confirmed => password_confirmation match with password
        ]);

        // store user in database
        $user = User::create($attributes);

        // sign the user in
        Auth::login($user);
        // redirect

        // store user in database
        return redirect('/jobs');
    }

}