@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Veículo - {{$veiculo->modelo}} - {{$veiculo->placa}}</div>

                <div class="card-body">

                    <form action="/veiculos" method="POST">
                    	@csrf
                    	<div class="form-group mb-3">
                    		<label for="modelo">Modelo</label>
                    		<input type="text" name="modelo" id="modelo" placeholder="Modelo" class="form-control" value="{{$veiculo->modelo}}" readonly>
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="marca">Marca</label>
                    		<input type="text" name="marca" id="marca" placeholder="Marca" class="form-control" value="{{$veiculo->marca}}" readonly>
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="ano">Ano</label>
                    		<input type="text" name="ano" id="ano" placeholder="Ano" class="form-control" value="{{$veiculo->ano}}" readonly>
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="placa">Placa</label>
                    		<input type="text" name="placa" id="placa" placeholder="Placa" class="form-control" value="{{$veiculo->placa}}" readonly>
                    	</div>
                    	<a href="/veiculos/{{$veiculo->id}}/edit" class="btn btn-primary">Editar</a>
                        <a href="#!" id="deletar" class="btn btn-primary">Deletar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#deletar').click(function (event) {
        if (confirm('Certeza que deseja deletar?')) {
            $.ajax({
                url: '/veiculos/{{$veiculo->id}}',
                type: "DELETE",
                data: {
                    '_token': '{{ csrf_token() }}',
                },
                success: function () {
                    window.location.href = "/veiculos";
                }
            });
        }
    });
</script>

@endsection
