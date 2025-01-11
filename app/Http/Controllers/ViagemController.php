<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use App\Models\Veiculo;
use App\Models\Viagem;
use Illuminate\Http\Request;

class ViagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viagens = Viagem::all();
        return view('viagens.index', compact('viagens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $veiculos = Veiculo::all();
        $motoristas = Motorista::all();
        return view('viagens.create', compact('veiculos', 'motoristas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'veiculo_id' => 'required|exists:veiculos,id',
            'motorista_id' => 'required|exists:motoristas,id',
            'km_inicial' => 'required|integer',
            'km_final' => 'required|integer'
        ]);

        Viagem::create($request->all());
        return redirect()->route('viagens.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $viagem = Viagem::findOrFail($id);
        return view('viagens.show', compact('viagem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $viagem = Viagem::findOrFail($id);
        $veiculos = Veiculo::all();
        $motoristas = Motorista::all();
        return view('viagens.edit', compact('viagem', 'veiculos', 'motoristas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $viagem = Viagem::findOrFail($id);
        $viagem->update($request->all());
        return redirect()->route('viagens.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Viagem::destroy($id);
        return redirect()->route('viagens.index');
    }
}
