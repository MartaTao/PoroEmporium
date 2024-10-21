<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie\Categorie;
use App\Models\Product;
use App\Models\Seller\Seller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Seller::paginate(10);
        $categorias=Categorie::all();
        $productos=Product::paginate(10);
        $users = User::with('userProfile')->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Admin');
        })->paginate(10);
        $sellers=Seller::paginate(10);
        return view('admin.index', compact('users','productos','categorias','proveedores','sellers'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
