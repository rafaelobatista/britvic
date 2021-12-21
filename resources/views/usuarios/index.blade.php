@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between"><span class="d-block">Usuários</span><a href="/usuarios/create" class="btn btn-primary">Novo</a></div>

                <div class="card-body">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nome</th>
                          <th scope="col">E-mail</th>
                          <th scope="col">CPF</th>
                          <th scope="col">Funções</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($usuarios as $usuario)
                          <tr>
                            <th scope="row">{{$usuario->id}}</th>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->cpf}}</td>
                            <td class="">
                              <a href="/usuarios/{{$usuario->id}}" class="btn btn-primary">Exibir</a>
                              <a href="/usuarios/{{$usuario->id}}/edit" class="btn btn-primary">Editar</a>
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