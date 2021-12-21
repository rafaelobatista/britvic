@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Novo veículo</div>

                <div class="card-body">
                    
                    <form action="/veiculos" method="POST">
                    	@csrf
                    	<div class="form-group mb-3">
                    		<label for="modelo">Modelo</label>
                    		<input type="text" name="modelo" id="modelo" placeholder="Modelo" class="form-control" required>
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="marca">Marca</label>
                    		<input type="text" name="marca" id="marca" placeholder="Marca" class="form-control" required>
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="ano">Ano</label>
                    		<input type="text" name="ano" id="ano" placeholder="Ano" class="form-control" required>
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="placa">Placa</label>
                    		<input type="text" name="placa" id="placa" placeholder="Placa" class="form-control" required>
                    	</div>

                    	<button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
