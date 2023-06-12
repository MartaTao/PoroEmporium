<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categorie\Categorie;
use Illuminate\Support\Facades\Session;

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

        //Cogemos la cantidad que ha sido seleccionada
        $cantidadSeleccionada = $request->cantidad;

        // Obtener el carrito de la sesión
        $cart = session()->get('cart', []);

        // Busca si el producto ya está en el carrito
        $productoEnCarritoIndex = null;
        foreach ($cart as $index => $producto) {
            if ($producto['id'] === $product->id) {
                $productoEnCarritoIndex = $index;
                break;
            }
        }

        // Verifica si el producto ya está en el carrito
        if ($productoEnCarritoIndex !== null) {
            // Agregar la cantidad seleccionada al producto existente en el carrito
            $cart[$productoEnCarritoIndex]['cantidad'] += $cantidadSeleccionada;
            $product->cantidad -= $cantidadSeleccionada;
            $product->save();

            $message = 'Product quantity updated in the cart!';
        } else {
            //si la cantidad seleccionada es menor o igual que la disponible , se crea el elemento de ese producto en el carrito con la cantidad seleccionada
            if ($cantidadSeleccionada <= $product->cantidad) {
                // Agregar el producto al carrito con la cantidad seleccionada
                $producto = [
                    "id" => $product->id,
                    "nombre" => $product->nombre,
                    "precio" => $product->discount ?  $product->precio - $product->discount->precio : $product->precio,
                    "cantidad" => $cantidadSeleccionada
                ];
                array_push($cart, $producto);
                $product->cantidad -= $cantidadSeleccionada;
                $product->save();

                $message = 'Product successfully added to cart!';
            } else {
                $message = 'Only the maximum available quantity of the product could be added to the cart!';
            }
        }

        // Actualizar el carrito en la sesión
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
    /**
     * Eliminar todos los productos del carrito
     */
    public function destroyAll()
    {
        $cart = Session::get('cart');
    
        foreach ($cart as $producto) {
            $product = Product::find($producto['id']);
            $cantidad = $producto['cantidad'];
            $product->cantidad += $cantidad;
            $product->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('message', 'The cart has been emptied successfully.');
    }

}
