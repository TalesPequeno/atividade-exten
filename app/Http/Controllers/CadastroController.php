<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function createLoja()
    {
        return view('cadastros.create-loja');
    }

    public function clientes()
    {
        return view('cadastros.clientes');
    }

    public function produtos()
    {
        return view('cadastros.produtos');
    }

    public function fornecedores()
    {
        return view('cadastros.fornecedores');
    }
}
