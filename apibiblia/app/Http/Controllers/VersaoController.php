<?php

namespace App\Http\Controllers;

use App\Http\Resources\VersaoResource;
use App\Http\Resources\VersoesCollection;
use App\Models\Versao;
use Illuminate\Http\Request;

class VersaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new VersoesCollection(Versao::select('id', 'nome', 'abreviacao')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Versao::create($request->all())) {
            return response()->json([
                'message' => 'Vesão cadastrada com sucesso'
            ], 201);
        }
        return response()->json([
            'message' => 'ERRO ao cadastrar a versão'
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $versao)
    {
        $versao = Versao::with('idioma', 'livros')->find($versao);
        if ($versao) {
            return new VersaoResource($versao);
        }

        return response()->json([
            'message' => 'Erro ao pesquisar a versão'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $versao)
    {
        $versao = Versao::find($versao);
        if ($versao) {
            $versao->update($request->all());
            return $versao;
        }
        return response()->json([
            'message' => 'ERRO ao ATUALIZAR a versão'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $versao)
    {
        if (Versao::destroy($versao)) {
            return response()->json([
                'message' => 'Versao DELETADO com sucesso'
            ], 201);
        }
        return response()->json([
            'message' => 'ERRO ao DELETAR versão'
        ],404);
    }
}
