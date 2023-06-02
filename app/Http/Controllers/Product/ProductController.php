<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Categorie\Categorie;
use App\Models\Comment\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!is_null($request->categoria) && $request->categoria != 'Categoria') {
            if ($request->buscador != '') {
                $products = Product::where('categoria', $request->categoria)->where('nombre', 'LIKE', '%' . $request->buscador . '%')->paginate(10);
            } else {
                $products = Product::where('categoria', $request->categoria)->paginate(10);
            }
        } else {
            if ($request->buscador != '') {
                $products = Product::where('nombre', 'LIKE', '%' . $request->buscador . '%')->paginate(10);
            } else {
                $products = Product::all();
            }
        }
        $categorias = Categorie::all();
        return  view('product.index', compact('products', 'categorias'));
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
            'nombre'=>['required','string','max:255','regex:/^[a-zA-Z\s]*$/'],
            'categoria'=>['required', Rule::in(Categorie::pluck('nombre')->toArray())],
            'descripcion'=>['required','string','max:255',],
            'precio'=>['required'],
            'cantidad'=>['required'],
        ]);
        $producto = Product::create([
            'nombre'=>$request->nombre,
            'categoria'=>$request->categoria,
            'descripcion'=>$request->descripcion,
            'precio'=>$request->precio,
            'cantidad'=>$request->cantidad,
        ]);
        if (isset($request->product_avatar)) {
            $producto->addMediaFromRequest('product_avatar')->toMediaCollection('products_avatar');
        }
        if (isset($request->product_images)) {
            $images = array_slice($request->product_images, 0, 5);
            foreach ($images as $image) {
                $producto->addMedia($image)->toMediaCollection('products_images');
            }
        }
        return redirect(route('admin.index'))->with('message', 'Prodcuto añadido correctamente.')->with('tab','products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $categorias = Categorie::all();
        $comentarios = Comment::with('user.userProfile')->where('product_id', $product->id)->paginate(10);
        /* $mediaValoraciones = Comment::where('product_id',$product)->avg('valoracion');
        $mediaValoraciones = number_format($mediaValoraciones, 1); */
        $mediaTruncada = floor($product->valoracion);
        return view('product.product', compact('product', 'categorias', 'comentarios', 'mediaTruncada'));
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
