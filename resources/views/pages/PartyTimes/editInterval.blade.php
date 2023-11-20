@extends('adminlte::page')

@section('title', "Intervalo mínimo entre horários de festas")

@section('content_header')
    <h1>Intervalo mínimo entre horários de festas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('partyTimeMinInterval.update') }}" class="form" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Intervalo (número de minutos):</label>
                    <input type="number" name="party_time_min_interval" class="form-control" value="{{$partyTimeMinInterval}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
