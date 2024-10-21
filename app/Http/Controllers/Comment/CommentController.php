<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        $request->user()->comment()->create([
            'product_id' => $request->id_product,
            'valoracion' => $request->rating,
            'comentario' => $request->comment,
        ]);
        $valoracion = Comment::where('product_id', $request->id_product)->avg('valoracion');
        $valoracion = number_format($valoracion, 1);
        $producto = Product::where('id', $request->id_product);
        $producto->update([
            'valoracion' => $valoracion,
        ]);
        return redirect(route('product.show', $request->id_product,));
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
