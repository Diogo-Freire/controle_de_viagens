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
            'motoristas' => 'required|array',
            'motoristas.*' => 'exists:motoristas,id',
            'km_inicial' => 'required|numeric|min:0',
            'km_final' => 'required|numeric|gte:km_inicial',
        ]);
    
        // Cria a viagem
        $viagem = Viagem::create([
            'veiculo_id' => $request->input('veiculo_id'),
            'km_inicial' => $request->input('km_inicial'),
            'km_final' => $request->input('km_final'),
        ]);
    
        // Relaciona os motoristas à viagem na tabela pivot
        $viagem->motoristas()->attach($request->input('motoristas'));
    
        return redirect()->route('viagens.index')->with('success', 'Viagem criada com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $viagem = Viagem::with('motoristas', 'veiculo')->findOrFail($id);
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
    public function update(Request $request, Viagem $viagem)
    {
        $request->validate([
            'veiculo_id' => 'required|exists:veiculos,id',
            'km_inicial' => 'required|numeric|min:0',
            'km_final' => 'required|numeric|gte:km_inicial',
            'motoristas' => 'required|array|min:1',
            'motoristas.*' => 'exists:motoristas,id',
        ]);

        $viagem->update([
            'veiculo_id' => $request->veiculo_id,
            'km_inicial' => $request->km_inicial,
            'km_final' => $request->km_final,
        ]);

        // Atualizar motoristas associados
        $viagem->motoristas()->sync($request->motoristas);

        return redirect()->route('viagens.index')->with('success', 'Viagem atualizada com sucesso!');
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
