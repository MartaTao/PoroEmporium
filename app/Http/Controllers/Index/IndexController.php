<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Categorie\Categorie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categorias=Categorie::all();

        return view('index',compact('categorias'));
    }
}
