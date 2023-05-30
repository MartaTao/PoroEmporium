<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrito\Carrito;
use App\Models\Categorie\Categorie;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function show()
    {

        $categorias = Categorie::all();
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }

        return view('checkout.checkout', compact('categorias', 'cart', 'total'));
    }

    public function pay(Request $request)
    {

        $cardNumber = $request->input('card_number');
        $expirationDate = $request->input('expiration_date');
        $cvv = $request->input('cvv');




        // Verificar la tarjeta de crédito
        $isCardValid = $this->verifyCreditCard($cardNumber, $expirationDate, $cvv);

        if ($isCardValid) {
            // Procesar el pago
            $correctBuy = $this->processPayment($request);

            if ($correctBuy) {
                return redirect()->route('checkout')->with('message', 'Pago realizado correctamente. ¡Gracias por tu compra!');
            } else {
                return redirect()->route('checkout')->with('message', 'Datos introducidos erroneos en el pago. Por favor, inténtalo de nuevo.');
            }
        } else {
            return redirect()->route('checkout')->with('message', 'Datos no introducidos. Por favor,inténtalo de nuevo.');
        }
    }

    public function verifyCreditCard($cardNumber, $expirationDate, $cvv)
    {

        $isValidCard = !empty($cardNumber) && !empty($expirationDate) && !empty($cvv);

        return $isValidCard;
    }

    public function processPayment(Request $request)
    {

        $cardNumber = $request->input('card_number');
        // Eliminar espacios en blanco del número de tarjeta de crédito
        $cardNumber = str_replace(' ', '', $cardNumber);
        // Convertir a número
        $cardNumber = intval($cardNumber);

        $expirationDate = $request->input('expiration_date');

        // Obtener la fecha actual
        $currentDate = now();

        $cvv = $request->input('cvv');

        $creditCartPattern = '/^[1-9]{16}$/';
        $cvvPattern = '/^[0-9]{3,4}$/';

        // Validar la tarjeta de crédito
        if (!preg_match($creditCartPattern, $cardNumber)) {

            return false;
        }


        // Validar la fecha de expiración
        if ($expirationDate <= $currentDate) {

            return false;
        }


        // Validar el CVV
        if (!preg_match($cvvPattern, $cvv)) {

            return false;
        }


        return true;
    }
}
