<?php

namespace App\Http\Controllers\Discount;

use App\Http\Controllers\Controller;
use App\Models\Discount\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
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
            'cantidad'=>['required','numeric','min:1','max:100'],
        ]);
        $product->discount()->create([
            'descuento'=>$request->cantidad,
            'precio'=>$product->precio*$request->cantidad/100,
        ]);
        return redirect(route('admin.index'))->with('message', 'Descuento creado correctamente.')->with('tab','products');

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
        $discount=Discount::where('product_id',$id)->first();
        $discount->delete();
        return redirect(route('admin.index'))->with('message', 'Descuento eliminado correctamente.')->with('tab','products');
    }
}
