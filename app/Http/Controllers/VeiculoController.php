<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veiculos = Veiculo::all();
        return view('veiculos.index', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('veiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'modelo' => 'required|string|max:255',
            'ano' => 'required|integer|min:1900|max:' . date('Y'),
            'data_aquisicao' => 'required|date',
            'km_aquisicao' => 'required|integer|min:0',
            'renavam' => 'required|string|unique:veiculos,renavam',
        ]);

        Veiculo::create($validated);
        return response()->json(['message' => 'Veiculo criado com sucesso'], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $veiculo = Veiculo::findOrFail($id);
        return view('veiculos.show', compact('veiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $veiculo = Veiculo::findOrFail($id);
        return view('veiculos.edit', compact('veiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->update($request->all());
        return redirect()->route('veiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Veiculo::destroy($id);
        return redirect()->route('veiculos.index');
    }
}
