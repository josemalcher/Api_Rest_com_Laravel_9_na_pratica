<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Livro::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Livro::create($request->all())) {
            return response()->json([
                'message' => 'Livro Cadastrado com sucesso'
            ], 201);
        }
        return response()->json([
            'message' => 'ERRO AO CADASTRAR'
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $livro)
    {
        $livro = Livro::find($livro);
        if ($livro) {
            return $livro;
        }
        return response()->json([
            'message' => 'ERRO Pesquisar Livro'
        ],404);
        // return Livro::findOrFail($livro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $livro)
    {
        $livro = Livro::find($livro);
        if ($livro) {
            $livro->update($request->all());
            return $livro;
        }
        return response()->json([
            'message' => 'ERRO ao ATUALIZAR Livro'
        ],404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $livro)
    {
        if (Livro::destroy($livro)) {
            return response()->json([
                'message' => 'Livro DELETADO com sucesso'
            ], 201);
        }
        return response()->json([
            'message' => 'ERRO ao DELETAR Livro'
        ],404);
        // return Livro::destroy($livro);
    }
}