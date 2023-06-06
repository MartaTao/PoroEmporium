<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Categorie\Categorie;
use App\Models\Cart\Cart;
use App\Models\Product;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $categorias = Categorie::all();
        return view('auth.login', compact('categorias'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Guardar los productos del carrito en la base de datos antes de destruir la sesión
        $cart = $request->session()->get('cart', []);

        foreach ($cart as $producto) {
            $product = Product::findOrFail($producto['id']);
            $product->cantidad += $producto['cantidad'];
            $product->save();
        }

        // Destruir la sesión y eliminar el carrito
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
