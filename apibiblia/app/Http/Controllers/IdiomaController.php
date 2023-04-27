<?php

namespace App\Http\Controllers;

use App\Http\Resources\IdiomaResource;
use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Idioma::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Idioma::create($request->all())) {
            return response()->json([
                'message' => 'Idioma cadastrado com sucesso'
            ], 201);
        }
        return response()->json([
            'message' => 'Erro ao cadastrar o idioma',
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $idioma = Idioma::find($id);
        if ($idioma) {
            // $idioma->versoes;
            return new IdiomaResource($idioma);
        }
        return response()->json([
            'message' => 'Erro ao PESQUISAR o idioma',
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $idioma = Idioma::find($id);
        if ($idioma) {
            $idioma->update($request->all());
            return $idioma;
        }
        return response()->json([
            'message' => 'Erro ao ATUALIZAR o idioma',
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Idioma::destroy($id)) {
            return response()->json([
                'message' => 'Idioma DELETADO com sucesso'
            ], 201);
        }
        return response()->json([
            'message' => 'ERRO ao DELETAR Idioma'
        ],404);
    }
}
