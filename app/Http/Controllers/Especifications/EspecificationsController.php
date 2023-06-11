<?php

namespace App\Http\Controllers\Especifications;

use App\Http\Controllers\Controller;
use App\Models\Especifications\Especification;
use App\Models\Product;
use Illuminate\Http\Request;

class EspecificationsController extends Controller
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
        $product=Product::findOrFail($request->id);
        $request->validate([
            'descripcion'=>['required','string','max:255',],
        ]);
        $esp=$product->especificaciones()->create([
            'descripcion'=>$request->descripcion,
        ]);
        if (isset($request->especificacionest_images)) {
            foreach ($request->especificacionest_images as $image) {
                $esp->addMedia($image)->toMediaCollection('products_especifications');
            }
        }
        return redirect(route('product.show',$product->id))->with('message', 'Especificación añadida correctamente.');
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
        $esp=Especification::where('id',$id)->first();
        $esp->delete();
        return redirect(route('product.show',$esp->product->id))->with('message', 'Especifricación eliminada correctamente.');
    }
}
