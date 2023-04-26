<?php

namespace App\Http\Controllers;

use App\Models\Versiculo;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Versiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Versiculo::create($request->all())) {
            return response()->json([
                'message' => 'Versiculo salvo com sucesso'
            ], 201);
        }
        return response()->json([
            'message' => 'ERRO ao salvar Versiculo'
        ], 404);
        //return Versiculo::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $versiculo)
    {
        $versiculo = Versiculo::find($versiculo);
        if ($versiculo) {
            return $versiculo;
        }
        return response()->json([
            'message' => 'ERRO Pesquisar Versiculo'
        ],404);
        //return Versiculo::findOrFail($versiculo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $versiculo)
    {
        $versiculo = Versiculo::find($versiculo);
        if ($versiculo) {
            $versiculo->update($request->all());
            return $versiculo;
        }
        return response()->json([
            'message' => 'ERRO ao ATUALIZAR Versiculo'
        ],404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $versiculo)
    {
        if (Versiculo::destroy($versiculo)) {
            return response()->json([
                'message' => 'Versiculo DELETADO com sucesso'
            ], 201);
        }
        return response()->json([
            'message' => 'ERRO ao DELETAR Versiculo'
        ],404);
        //return Versiculo::destroy($versiculo);
    }
}
