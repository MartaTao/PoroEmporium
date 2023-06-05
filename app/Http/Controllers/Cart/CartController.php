<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categorie\Categorie;

class CartController extends Controller
{
    /**
     * Render la vista del carrito
     */
    public function index()
    {
        $categorias = Categorie::all();
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }

        return view('cart.cart', compact('categorias', 'cart', 'total'));
    }

    /**
     * Agregar un producto al carrito
     */

    public function addToCart($id, Request $request)
    {
        //se busca el producto por su id
        $product = Product::findOrFail($id);
        //con la sesion obtenemos los elementos del carrito
        $cart = session()->get('cart', []);
        //Cogemos la cantidad que ha sido seleccionada
        $cantidadSeleccionada = $request->cantidad;
        //y la cantidad disponible de ese producto en particular
        $cantidadDisponible = $product->cantidad;
        //si la cantidad seleccionada es menor o igual que la disponible , se crea el elemento de ese producto en el carrito con la cantidad seleccionada
        if ($cantidadSeleccionada <= $cantidadDisponible) {
            $producto = [
                "id" => $product->id,
                "nombre" => $product->nombre,
                "precio" => $product->precio,
                "cantidad" => $cantidadSeleccionada
            ];
            array_push($cart, $producto);
            $product->cantidad -= $cantidadSeleccionada;
            $product->save();

            $message = 'Product successfully added to cart!';
        } else {
            //si la cantidad selecionada supera a la disponible , solo se añadira al carrito la cantidad máxima que hay de dicho producto al carrito
            $producto = [
                "id" => $product->id,
                "nombre" => $product->nombre,
                "precio" => $product->precio,
                "cantidad" => $cantidadDisponible
            ];
            array_push($cart, $producto);
            $product->cantidad = 0;
            $product->save();

            $message = 'Only the maximum available quantity of the product could be added to the cart!';
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('message', $message);
    }

    /**
     * Eliminar un producto del carrito
     */
    public function destroy(Request $request)
    {
        if ($request->nombre) {
            $cart = session()->get('cart');
            foreach ($cart as $key => $producto) {
                if ($producto['nombre'] === $request->nombre) {
                    $product = Product::findOrFail($producto['id']);
                    $product->cantidad += $producto['cantidad'];
                    $product->save();
                    unset($cart[$key]);
                    session()->put('cart', $cart);
                    break;
                }
            }
        }

        return redirect()->route('cart.index')->with('message', 'Product successfully removed from cart!');
    }
}
