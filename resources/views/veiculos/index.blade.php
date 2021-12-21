@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between"><span class="d-block">Veículos</span><a href="/veiculos/create" class="btn btn-primary">Novo</a></div>

                <div class="card-body">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Modelo</th>
                          <th scope="col">Marca</th>
                          <th scope="col">Placa</th>
                          <th scope="col">Funções</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($veiculos as $veiculo)
                          <tr>
                            <th scope="row">{{$veiculo->id}}</th>
                            <td>{{$veiculo->modelo}}</td>
                            <td>{{$veiculo->marca}}</td>
                            <td>{{$veiculo->placa}}</td>
                            <td class="">
                              <a href="/veiculos/{{$veiculo->id}}" class="btn btn-primary">Exibir</a>
                              <a href="/veiculos/{{$veiculo->id}}/edit" class="btn btn-primary">Editar</a>
                              <a href="/veiculos/{{$veiculo->id}}/bookings" class="btn btn-primary">Reservas</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection