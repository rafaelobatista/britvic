@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuário - {{$usuario->name}} - {{$usuario->cpf}}</div>

                <div class="card-body">

                    <form action="/usuarios" method="POST">
                    	@csrf
                    	<div class="form-group mb-3">
                    		<label for="name">Nome</label>
                    		<input type="text" name="name" id="name" placeholder="Nome" class="form-control" value="{{$usuario->name}}" readonly>
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="email">Email</label>
                    		<input type="text" name="email" id="email" placeholder="E-mail" class="form-control" value="{{$usuario->email}}" readonly>
                    	</div>
                    	<div class="form-group mb-3">
                    		<label for="cpf">CPF</label>
                    		<input type="text" name="cpf" id="cpf" placeholder="CPF" class="form-control" value="{{$usuario->cpf}}" readonly>
                    	</div>
                    	
                    	<a href="/usuarios/{{$usuario->id}}/edit" class="btn btn-primary">Editar</a>
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
                url: '/usuarios/{{$usuario->id}}',
                type: "DELETE",
                data: {
                    '_token': '{{ csrf_token() }}',
                },
                success: function () {
                    window.location.href = "/usuarios";
                }
            });
        }
    });
</script>

@endsection
