<?php

namespace App\Http\Controllers;

use App\Http\Resources\LivroResource;
use App\Http\Resources\LivrosCollection;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Livro::all();
        return new LivrosCollection(Livro::all());
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
        $livro = Livro::with('testamento', 'versiculos', 'versao')->find($livro);
        //dd(Storage::disk('public')->url($livro->capa));
        if ($livro) {

            return new LivroResource($livro);
        }

        return response()->json([
            'message' => ' Erro ao pesquisar o livro.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $livro)
    {
        $patch = $request->capa->store('capa_livro', 'public');

        $livro = Livro::find($livro);
        if ($livro) {

            $livro->capa = $patch;

            if ($livro->save()) {
                return $livro;
            }
            return response()->json([
                'message' => 'ERRO ao ATUALIZAR Livro'
            ], 404);


        }
        return response()->json([
            'message' => 'ERRO ao ATUALIZAR Livro'
        ], 404);
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
        ], 404);
        // return Livro::destroy($livro);
    }
}
