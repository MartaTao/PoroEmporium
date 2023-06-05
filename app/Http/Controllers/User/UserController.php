<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'first_surname' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'second_surname' => 'nullable|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'birthdate' => 'nullable|date',
            'mobile' => 'nullable|string|max:11|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/',
        ]);
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $profile = $user->userProfile()->create([
            'name' => $request->name,
            'first_surname' => $request->first_surname,
            'second_surname' => $request->second_surname,
            'adress' => $request->adress,
            'birthdate' => $request->birthdate,
            'mobile' => $request->mobile,
        ]);
        if (isset($request->users_avatar)) {
            $user->userProfile->addMediaFromRequest('users_avatar')->toMediaCollection('users_avatar');
        }

        return redirect(route('admin.index'))->with('message', 'Usuario creado correctamente.')->with('tab', 'users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,email,' . $user->email],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,username,' . $user->username],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'name' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'first_surname' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'second_surname' => 'nullable|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'birthdate' => 'nullable|date',
            'mobile' => 'nullable|string|max:11|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/',
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);
        if (!empty($request->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }
        $user->userProfile()->update([
            'name' => $request->name,
            'first_surname' => $request->first_surname,
            'second_surname' => $request->second_surname,
            'adress' => $request->adress,
            'birthdate' => $request->birthdate,
            'mobile' => $request->mobile,
        ]);
        if (isset($request->users_avatar)) {
            $user->userProfile->addMediaFromRequest('users_avatar')->toMediaCollection('users_avatar');
        }

        return redirect(route('admin.index'))->with('message', 'Usuario editado correctamente.')->with('tab', 'users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect(route('admin.index'))->with('message', 'Usuario eliminado correctamente.')->with('tab', 'users');
    }
}
