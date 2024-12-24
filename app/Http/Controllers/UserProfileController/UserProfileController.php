<?php

namespace App\Http\Controllers\UserProfileController;

use App\Http\Controllers\Controller;
use App\Models\Categorie\Categorie;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Services\UserProfileServices\UserProfileService;
use Illuminate\Http\JsonResponse;


class UserProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    public function create()
    {
        $categorias=Categorie::all();
        return view('profile.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'first_surname' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'second_surname' => 'nullable|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'birthdate' => 'nullable|date',
            'mobile' => 'nullable|string|max:11|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/',
        ]);
        $request->user()->userProfile()->create([
            'name' => $request->name,
            'first_surname' => $request->first_surname,
            'second_surname' => $request->second_surname,
            'adress' => $request->adress,
            'birthdate' => $request->birthdate,
            'mobile' => $request->mobile,
        ]);

        return redirect('/');
    }

    public function edit(UserProfile $profile)
    {
        return view('profile.edit', compact('profile'));
    }
    /**
     * Display the specified resource.
     */
    public function show(UserProfile $profile)
    {
        $categorias=Categorie::all();
        $profilePhoto = $profile->getMedia('users_avatar')->first();
        return view('profile.profile', compact('profile', 'profilePhoto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserProfile $profile)
    {
        $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'first_surname' => 'required|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'second_surname' => 'nullable|string|regex:/^[a-zA-Z\s]*$/|max:255',
            'birthdate' => 'nullable|date',
            'bio' => 'nullable|string|max:255',
        ]);
        $profile->update([
            'name' => $request->name,
            'first_surname' => $request->first_surname,
            'second_surname' => $request->second_surname,
            'bio' => $request->bio,
        ]);

        if (isset($request->users_avatar)) {
            $profile->addMediaFromRequest('users_avatar')->toMediaCollection('users_avatar');
        }
        return redirect(route('profile.show', compact('profile')));
    }
}
