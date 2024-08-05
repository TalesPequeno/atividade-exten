<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loja;

class LojaController extends Controller
{
    public function index()
    {
        $lojas = Loja::all();
        return view('lojas.lojas', compact('lojas'));
    }

    public function create()
    {
        return view('lojas.create');
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
        return view('lojas.edit', compact('loja'));
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
