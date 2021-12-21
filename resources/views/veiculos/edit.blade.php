@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editando veículo: {{$veiculo->modelo}} - {{$veiculo->placa}}</div>

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

                    <form action="/veiculos/{{$veiculo->id}}" method="POST">
                        @method('PUT')
                    	@csrf
                    	<div class="form-group mb-3">
                    		<label for="modelo">Modelo</label>
                    		<input type="text" name="modelo" id="modelo" placeholder="Modelo" class="form-control" value="{{$veiculo->modelo}}">
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="marca">Marca</label>
                    		<input type="text" name="marca" id="marca" placeholder="Marca" class="form-control" value="{{$veiculo->marca}}">
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="ano">Ano</label>
                    		<input type="text" name="ano" id="ano" placeholder="Ano" class="form-control" value="{{$veiculo->ano}}">
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="placa">Placa</label>
                    		<input type="text" name="placa" id="placa" placeholder="Placa" class="form-control" value="{{$veiculo->placa}}">
                    	</div>

                    	<button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
