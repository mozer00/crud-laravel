<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::paginate(30);
        return view('carros.index', compact('carros'));
    }


    public function create()
    {
        return view('carros.create');
    }


    public function store(Request $request)
    {
        $request->validate($this->regras());

        Carro::create($request->only(['marca', 'modelo', 'ano']));

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
        $request->validate($this->regras());

        $carro->update($request->only(['marca', 'modelo', 'ano']));
        return redirect()->route('carros.index')->with('success', 'Carro atualizado!');
    }


    private function regras(): array
    {
        return [
            'marca'  => 'required|string|min:2|max:50',
            'modelo' => 'required|string|min:2|max:50',
            'ano'    => 'required|integer|min:1886|max:' . date('Y'),
        ];
    }


    public function destroy(Carro $carro)
    {
        $carro->delete();
        return redirect()->route('carros.index')->with('success', 'Carro excluído');
    }
}
