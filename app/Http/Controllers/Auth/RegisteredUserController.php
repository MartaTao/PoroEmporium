<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Categorie\Categorie;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $categorias=Categorie::all();
        return view('auth.register',compact('categorias'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'first_surname' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'second_surname' => 'nullable|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'birthdate' => 'nullable|date',
            'mobile' => 'nullable|string|max:11|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/',
            'adress' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->userProfile()->create([
            'name' => $request->name,
            'first_surname' => $request->first_surname,
            'second_surname' => $request->second_surname,
            'adress' => $request->adress,
            'birthdate' => $request->birthdate,
            'mobile' => $request->mobile,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}
