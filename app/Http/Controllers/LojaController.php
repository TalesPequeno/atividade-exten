<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loja;
use App\Models\Pais;

class LojaController extends Controller
{
    public function index()
    {
        $lojas = Loja::paginate(20);
        return view('lojas.index', compact('lojas'));
    }

    public function create()
    {
        $paises = Pais::all();
        return view('lojas.create', compact('paises'));
    }

    public function store(Request $request)
    {
        $loja = Loja::create($request->all());
        return redirect()->route('lojas.index')->with('success', 'Loja criada com sucesso.');
    }

    public function show($id)
    {
        $loja = Loja::findOrFail($id);
        return view('lojas.show', compact('loja'));
    }

    public function edit($id)
    {
        $loja = Loja::findOrFail($id);
        $paises = Pais::all();
        return view('lojas.edit', compact('loja', 'paises'));
    }

    public function update(Request $request, $id)
    {
        $loja = Loja::findOrFail($id);
        $loja->update($request->all());
        return redirect()->route('lojas.index')->with('success', 'Loja atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $loja = Loja::findOrFail($id);
        $loja->delete();
        return redirect()->route('lojas.index')->with('success', 'Loja excluída com sucesso.');
    }
}
