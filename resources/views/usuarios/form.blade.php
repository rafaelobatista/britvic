@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Novo usuário</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/usuarios" method="POST">
                    	@csrf
                    	<div class="form-group mb-3">
                    		<label for="name">Nome</label>
                    		<input type="text" name="name" id="name" placeholder="Nome" class="form-control" required value="{{ old('name') }}">
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="email">Email</label>
                    		<input type="text" name="email" id="email" placeholder="E-mail" class="form-control" required value="{{ old('email') }}">
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="cpf">CPF</label>
                    		<input type="text" name="cpf" id="cpf" placeholder="CPF" class="form-control" required value="{{ old('cpf') }}">
                    	</div>
                        <div class="form-group mb-3">
                            <label for="password">Senha</label>
                            <input type="password" name="password" id="password" placeholder="Senha" class="form-control" required value="{{ old('password') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirme senha</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme senha" class="form-control" required value="{{ old('password_confirmation') }}">
                        </div>
                    	<button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
