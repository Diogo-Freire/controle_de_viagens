<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use DateTime;
use Illuminate\Http\Request;

class MotoristaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motoristas = Motorista::all();
        return view('motoristas.index', compact('motoristas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('motoristas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**$origin = new DateTime('now');
        $target = new DateTime('2006-01-10'); //pegar a data do sistemas
        $interval = $origin->diff($target);
        echo $interval->format('%y anos');
        */

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date|', 
            'cnh' => 'required|string|max:255',
        ]);

        Motorista::create($validated);
        return response()->json(['message' => 'Motorista criado com sucesso'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $motoristas = Motorista::findOrFail($id);
        return view('motoristas.show', compact('motoristas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $motoristas = Motorista::findOrFail($id);
        return view('motoristas.edit', compact('motoristas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $motorista = Motorista::findOrFail($id);
        $motorista->update($request->all());
        return redirect()->route('motoristas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Motorista::destroy($id);
        return redirect()->route('motoristas.index');
    }
}
