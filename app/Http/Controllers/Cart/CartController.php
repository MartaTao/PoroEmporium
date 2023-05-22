<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Carrito\Carrito;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categorie\Categorie;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    /**
     *Render la vista del cart
     */
    public function index()
    {
        $total=0;
        $categorias = Categorie::all();
        $cart = session()->get('cart', []);
        return view('cart.cart', compact('categorias', 'cart','total'));
    }

    /**
     * Add an item to a cart
     */
    public function addToCart($id, Request $request)
    {


        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        $hola = array_filter(
            $cart,
            function ($registro)
            use ($id) {
                return $registro['id'] == $id;
            }
        );

        if (!empty($hola)) {
            $registroEncontrado = reset($hola); // Obtener el primer registro encontrado
            $registroEncontrado['cantidad'] += $request->cantidad;
        } else {
            $producto=([
                "id" => $product->id,
                "nombre" => $product->nombre,
                "precio" => $product->precio,
                "cantidad" => $request->cantidad
            ]);
            array_push($cart,$producto);
        }
        session()->put('cart', $cart);
        return $request->cantidad;
        //redirect()->back()->with('message', 'Producto añadido al carrito con éxito');
    }
    /**
     * Update the cart
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
    /**
     * Remove a product from the cart
     */
    public function destroy(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
}
