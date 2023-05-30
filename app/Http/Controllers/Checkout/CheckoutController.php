<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrito\Carrito;
use App\Models\Categorie\Categorie;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller{
    public function show(){
        $categorias = Categorie::all();
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }

        return view('checkout.checkout', compact('categorias', 'cart', 'total'));
    }
    public function pay(Request $request){
        $cardNumber = $request->input('card_number');
        $expirationDate = $request->input('expiration_date');
        $cvv = $request->input('cvv');
        $name =$request->input('name');
        

        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'card_number' => 'required|numeric',
            'expiration_date' => 'required|date_format:d/m/y',
            'cvv' => 'required|numeric',
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('checkout')
                ->withErrors($validator)
                ->withInput()
                ->with('message', 'incorrect data please enter the data again!');
        }

        // Verificar la tarjeta de crédito
        $isCardValid = $this->verifyCreditCard($cardNumber, $expirationDate, $cvv);

        if($isCardValid){
            $correctBuy=$this->processPayment($cardNumber,$expirationDate, $cvv);
            if($correctBuy){
                redirect()->route('producto.index')->with('success', 'Pago realizado correctamente. ¡Gracias por tu compra!');
            }
        }
    }

    public function verifyCreditCard($cardNumber, $expirationDate, $cvv){
        $isValidCard = !empty($cardNumber) && !empty($expirationDate) && !empty($cvv);

        return $isValidCard;
    }
    public function processPayment(Request $request){
        $cardNumber = $request->input('card_number');
        $expirationDate = $request->input('expiration_date');
        $cvv = $request->input('cvv');

        $creditCartPattern = '/^\d{16}$/';
        $expirationPattern = '/^(0[1-9]|1[0-2])\/([0-9]{2})$/';
        $cvvPattern = '/^[0-9]{3,4}$/';

        // Validar la tarjeta de crédito
        if (!preg_match($creditCartPattern, $cardNumber)) {
            return redirect()->back()->with('message', 'Número de tarjeta de crédito inválido. Por favor, inténtalo de nuevo.');
        }

        // Validar la fecha de expiración
        if (!preg_match($expirationPattern, $expirationDate)) {
            return redirect()->back()->with('message', 'Fecha de expiración inválida. Por favor, inténtalo de nuevo.');
        }

        // Validar el CVV
        if (!preg_match($cvvPattern, $cvv)) {
            return redirect()->back()->with('message', 'CVV inválido. Por favor, inténtalo de nuevo.');
        }

        return redirect()->route('producto.index')->with('message', 'Pago realizado correctamente. ¡Gracias por tu compra!');
    }
}
