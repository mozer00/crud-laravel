<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::all();
        return view('carros.index', compact('carros'));
    }


    public function create()
    {
        return view('carros.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|max:50',
            'modelo' => 'required|max:50',
            'ano' => 'required|digits:4'
        ]);

        Carro::create(
            $request->only(['marca', 'modelo', 'ano'])
        );
        return redirect()->route('carros.index')->with('success', 'Carro adicionado!');
    }

    public function show(Carro $carro)
    {
        return view('carros.show', compact('carro'));
    }

    public function edit(Carro $carro)
    {
        return view('carros.edit', compact('carro'));
    }


    public function update(Request $request, Carro $carro)
    {
        $request->validate([
            'marca' => 'required|max:50',
            'modelo' => 'required|max:50',
            'ano' => 'required|digits:4'
        ]);

        $carro->update($request->only(['marca', 'modelo', 'ano']));
        return redirect()->route('carros.index')->with('success', 'Carro atualizado!');
    }


    public function destroy(Carro $carro)
    {
        $carro->delete();
        return redirect()->route('carros.index')->with('success', 'Carro excluído');
    }
}
