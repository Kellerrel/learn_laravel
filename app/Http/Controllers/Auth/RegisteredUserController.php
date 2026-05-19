<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;


class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        // validate the request
        $request->validate([
            'name' => ['required', 'string', 'max-:255'],
            'email'=> ['required','string','email', 'max:255', 'unique:users'],
            'password'=> ['required', Password::default()],
        ]);
        //create the user in the db
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            ]);
        //log them in
        Auth::login($user);
        //redirect home
        return redirect('/ideas');
    }
}
