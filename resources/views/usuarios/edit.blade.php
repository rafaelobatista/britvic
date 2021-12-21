@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editando usuário: {{$usuario->name}} - {{$usuario->cpf}}</div>

                <div class="card-body">

                    <form action="/usuarios/{{$usuario->id}}" method="POST">
                        @method('PUT')
                    	@csrf
                    	<div class="form-group mb-3">
                    		<label for="name">Nome</label>
                    		<input type="text" name="name" id="name" placeholder="Nome" class="form-control" value="{{$usuario->name}}" required>
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="email">Email</label>
                    		<input type="text" name="email" id="email" placeholder="E-mail" class="form-control" value="{{$usuario->name}}" required>
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="cpf">CPF</label>
                    		<input type="text" name="cpf" id="cpf" placeholder="CPF" class="form-control" value="{{$usuario->cpf}}" required>
                    	</div>
                        <div class="form-group mb-3">
                            <label for="password">Senha</label>
                            <input type="password" name="password" id="password" placeholder="Senha" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirme senha</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme senha" class="form-control" required>
                        </div>
                    	<button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
