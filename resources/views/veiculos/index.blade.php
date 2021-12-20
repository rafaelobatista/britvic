@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Veículos</div>

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