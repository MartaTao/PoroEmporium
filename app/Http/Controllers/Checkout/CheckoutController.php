<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Auth\PurchaseConfirmation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrito\Carrito;
use App\Models\Categorie\Categorie;
use Illuminate\Support\Facades\Validator;
use App\Models\Order\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        //Datos traidos de la vista
        $cardNumber = $request->input('card_number');
        $expirationDate = $request->input('expiration_date');
        $cvv = $request->input('cvv');

        // Verificar  si a introducido datos
        $isCardValid = $this->verifyCreditCard($cardNumber, $expirationDate, $cvv);

        if ($isCardValid) {
            // Verifica que los datos introducidos sean correctos
            $correctBuy = $this->processPayment($request);

            if ($correctBuy) {

                // Clonar datos del carrito en una nueva orden
                $cart = session()->get('cart', []);
                $total = 0;

                foreach ($cart as $producto) {
                    $total += $producto['precio'] * $producto['cantidad'];
                }

                $user = Auth::user();
                $order = new Order();
                $order->user_id = $user->id;
                $order->total = $total;
                $order->status = 'pending';
                $order->save();

                foreach ($cart as $producto) {
                    $order->products()->attach($producto['id'], ['cantidad' => $producto['cantidad']]);
                }
                // Enviar correo de confirmación al usuario
                $userEmail = $user->email;
                Mail::to($userEmail)->send(new PurchaseConfirmation($order));
                // Borrar la sesión del carrito
                session()->forget('cart');
                return redirect()->route('product.index')->with('message', 'Thank you for your purchase!');
            } else {
                return redirect()->route('checkout')->with('message', 'Wrong data entered in the payment. Please try again.');
            }
        } else {
            return redirect()->route('checkout')->with('message', 'Data not entered. Please try again.');
        }
    }
    //Función que verifica que tenga datos dentro
    public function verifyCreditCard($cardNumber, $expirationDate, $cvv)
    {

        $isValidCard = !empty($cardNumber) && !empty($expirationDate) && !empty($cvv);

        return $isValidCard;
    }
    //comprueba que los datos sean correctos
    public function processPayment(Request $request)
    {
        $typeCard = $request->input('cardtype');
        $cardNumber = $request->input('card_number');
        // Eliminar espacios en blanco del número de tarjeta de crédito
        $cardNumber = str_replace(' ', '', $cardNumber);
        // Convertir a número
        $cardNumber = intval($cardNumber);

        $expirationDate = $request->input('expiration_date');
        // Obtener la fecha actual
        $currentDate = now();

        $cvv = $request->input('cvv');
        //pattern para la tarjeta de credito mastercard
        //tarjeta mastercard prueba 2436052436814934 
        //visa 4194248737008089
        $creditCartPatternMastercard = '/^5[1-5][0-9]{14}|^(222[1-9]|22[3-9]\\d|2[3-6]\\d{2}|27[0-1]\\d|2720)[0-9]{12}$/';
        $creditCartPatternVisa = '/^4[0-9]{12}(?:[0-9]{3})?$/';
        //pattern cvv
        $cvvPattern = '/^[0-9]{3,4}$/';

        // Validar la tarjeta de crédito
        if ($typeCard == 'visa') {
            if (!preg_match($creditCartPatternVisa, $cardNumber)) {
                return false;
            }
        } elseif ($typeCard == 'mastercard') {
            if (!preg_match($creditCartPatternMastercard, $cardNumber)) {
                return false;
            }
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
