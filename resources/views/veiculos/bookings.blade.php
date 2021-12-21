@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @php
                    $hoje = today();
                @endphp

                <div class="card-header">Dezembro</div>
                <div class="card-body">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Dia</th>
                          <th scope="col">Status</th>
                          <th scope="col">Reservado para</th>
                          <th scope="col">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            
                            for($i=1; $i < $hoje->daysInMonth + 1; ++$i){
                                $date= \Carbon\Carbon::createFromDate($hoje->year, $hoje->month, $i);
                                $reservado = in_array($date->format('Y-m-d'), array_column($veiculo->bookings->toArray(), 'booked_for'))
                        @endphp
                          
                          <tr>
                            <td>{{$date->format('d/m/Y')}}</td>
                            <td>
                                @if($reservado == true)
                                    Reservado
                                @else
                                    Disponível
                                @endif
                            </td>
                            <td>
                                @if($reservado == true)
                                    {{$veiculo->bookings->where('booked_for',$date->format('Y-m-d'))->first()->user->name}}
                                @else
                                    
                                @endif
                            </td>
                            <td>
                                @if($reservado == true)
                                    <button class="btn btn-danger" onclick="cancelBooking('{{$veiculo->id}}','{{$date->format('Y-m-d')}}')">Cancelar reserva</button>
                                @else
                                    <button class="btn btn-primary" onclick="book('{{$veiculo->id}}','{{$date->format('Y-m-d')}}')">Reservar</button>
                                @endif
                            </td>
                          </tr>

                        @php
                            }
                        @endphp
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function cancelBooking(id, date){
        $.ajax({
            url: '/veiculos/'+id+'/cancel-booking/'+date,
            method: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
            },
            success: function () {
                window.location.reload();
            }
        });
    }

    function book(id, date){
        $.ajax({
            url: '/veiculos/'+id+'/book/'+date,
            method: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
            },
            success: function () {
                window.location.reload();
            }
        });
    }
</script>

@endsection
