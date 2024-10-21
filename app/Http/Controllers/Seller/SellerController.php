<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sellers'],
            'nombre' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:255', 'unique:sellers,nombre'],
        ]);
        Seller::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
        ]);
        return redirect(route('admin.index'))->with('message', 'Proveedor creado correctamente.')->with('tab', 'sellers');
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
        $seller=Seller::where('id',$id)->first();
        $request->validate([
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:sellers,email,'.$seller->id],
            'nombre' => ['nullable', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:255', 'unique:sellers,nombre,'.$seller->id],
        ]);
        $seller->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
        ]);
        return redirect(route('admin.index'))->with('message', 'Proveedor editado correctamente.')->with('tab', 'sellers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seller=Seller::where('id',$id)->first();
        $seller->delete();
        return redirect(route('admin.index'))->with('message', 'Proveedor eliminado correctamente.')->with('tab','sellers');
    }
}
