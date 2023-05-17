<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Carrito\Carrito;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categorie\Categorie;

class CartController extends Controller
{
    /**
    *Render la vista del cart
    */
    public function index()
    {
        $categorias=Categorie::all();
        return view('cart.cart',compact('categorias'));
    }

    /**
     * Add an item to a cart
     */
    public function addToCart(Product $product,Request $request)
    {
        //Preguntar si deberia user()->carrito()->cliente()->create()
        // o solo user()->carrito()->create()
        $carrito=$request->user()->carrito()->cliente()->create([
            'producto'=>$product->id,
            'cantidad'=>$request->cantidad,
            'total'=>$product->precio*$request->cantidad,
        ]);
        return $carrito->total;
    }
    /**
     * Update the cart
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
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
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
}
