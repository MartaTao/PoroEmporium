<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Categorie\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /*
        public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }
    */
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->categoria != 'Categoria') {
            if($request->buscador!=''){
                $products= Product::where('categoria',$request->categoria)->where('nombre', 'LIKE', '%' . $request->buscador . '%')->paginate(10);
            }else{
                $products= Product::where('categoria',$request->categoria)->paginate(10);
            }

        }else{
            if($request->buscador!=''){
                $products= Product::where('nombre', 'LIKE', '%' . $request->buscador . '%')->paginate(10);
            }else{
                return redirect('/');
            }

        }
        $categorias=Categorie::all();
        return view('products', compact('products'));
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