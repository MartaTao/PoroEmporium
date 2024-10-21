<?php

namespace App\Http\Controllers\config;

use App\Http\Controllers\Controller;
use App\Models\Categorie\Categorie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ConfigurationController extends Controller
{
    public function create()
    {
        $categorias=Categorie::all();
        return view('config.configuration',compact('categorias'));
    }
    public function changePass()
    {
        $categorias=Categorie::all();
        return view('config.change_password',compact('categorias'));
    }
    public function changeEmail()
    {
        $categorias=Categorie::all();
        return view('config.change_email',compact('categorias'));
    }

    public function storePass(Request $request)
    {
        $request->validate([
            'actualPassword' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $isPassCorrect=Hash::check($request->actualPassword, auth()->user()->password); //Comprueba si la contraseña introducida coincide con la del user
        if($isPassCorrect){
            User::findOrFail(Auth::user()->id)->update([
                'password'=>Hash::make($request->password),
            ]);
            $msg="Contraseña cambiada";
        }else{
            $msg="Contraseña incorrecta";
        }
        return redirect(route('configuration.create'))->with('message', $msg);
    }
    public function storeEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required',
        ]);

        $isPassCorrect=Hash::check($request->password, auth()->user()->password);
        if($isPassCorrect){
            User::findOrFail(Auth::user()->id)->update([
                'email' => $request->email,
            ]);
            $msg="Correo cambiado";
        }else{
            $msg="Contraseña incorrecta";
        }
        return redirect(route('configuration.create'))->with('message', $msg);
    }
}
