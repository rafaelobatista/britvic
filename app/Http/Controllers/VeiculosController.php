<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Http\Requests\StoreVeiculosRequest;
use App\Http\Requests\UpdateVeiculosRequest;

class VeiculosController extends Controller
{
    /**
     * Lista todos os veiculos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veiculos = Veiculo::all();

        return view('veiculos.index', ['veiculos' => $veiculos]);
    }

    /**
     * Exibe o formulário para criação de formulário.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('veiculos.form');
    }

    /**
     * Armazena novo veículo.
     *
     * @param  \App\Http\Requests\StoreVeiculosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVeiculosRequest $request)
    {
        $veiculo = Veiculo::create($request->all());

        return redirect('/veiculos/' . $veiculo->id);
    }

    /**
     * Exibe veículo.
     *
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Veiculo $veiculo)
    {
        return view('veiculos.show', ['veiculo' => $veiculo]);
    }

    /**
     * Exibe formulário para edição de veículo.
     *
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Veiculo $veiculo)
    {
        return view('veiculos.edit', ['veiculo' => $veiculo]);
    }

    /**
     * Atualiza veículo.
     *
     * @param  \App\Http\Requests\UpdateVeiculosRequest  $request
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVeiculosRequest $request, Veiculo $veiculo)
    {
        $veiculo->update($request->all());

        return redirect('/veiculos/' . $veiculo->id);
    }

    /**
     * Deleta veículo.
     *
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Veiculo $veiculo)
    {
        return $veiculo->delete();
    }
}
