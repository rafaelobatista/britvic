<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Models\Booking;
use App\Http\Requests\StoreVeiculosRequest;
use App\Http\Requests\UpdateVeiculosRequest;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

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

    /**
     * Exibe tela para reserva do veículo.
     *
     * @param  \App\Models\Veiculo  $veiculo
     */
    public function bookings(Veiculo $veiculo)
    {
        return view('veiculos.bookings', ['veiculo' => $veiculo]);
    }

    /**
     * Cria reserva do veiculo para o usuário autenticado.
     *
     * @param  \App\Models\Veiculo  $veiculo
     */
    public function book(Veiculo $veiculo, $date)
    {   
        $data = [
            'user_id' => Auth::id(),
            'veiculo_id' => $veiculo->id,
            'booked_for' => $date,
        ];
        
        $validator = Validator::make($data, [
            'booked_for'  => [
                'required',
                Rule::unique('bookings')->where(function($query) use ($veiculo, $date) {
                  $query->where('veiculo_id', $veiculo->id)->where('booked_for', $date);
            })
           ],
        ]);

        if ($validator->fails()) {
            return false;
        }

        $booking = Booking::create($data);

        Log::info('ID Usuário: '. Auth::id() . '. ID Veículo: ' . $veiculo->id);

        return response()->json($booking);
    }

    /**
     * Cancela a reserva para o veículo no dia especificado
     *
     * @param  \App\Models\Veiculo  $veiculo
     */
    public function cancelBooking(Veiculo $veiculo, $date)
    {   
        return Booking::where('veiculo_id', $veiculo->id)->where('booked_for', $date)->delete();
    }
}
