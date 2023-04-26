<?php

namespace App\Http\Controllers;

use App\Models\Testamento;
use Illuminate\Http\Request;

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Testamento::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Testamento::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $testamento)
    {
        return Testamento::findOrFail($testamento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $testamento)
    {
        $testamento = Testamento::findOrFail($testamento);

        $testamento->update($request->all());
        return $testamento;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $testamento)
    {
        return Testamento::destroy($testamento);
    }
}
