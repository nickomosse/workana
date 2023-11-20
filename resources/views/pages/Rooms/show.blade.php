@extends('adminlte::page')

@section('title', "Salão de festa")

@section('content_header')
    <h1>Salão de festa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $room->id }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $room->name }}
                </li>
                <li>
                    <strong>Unidade: </strong> {{ $room->unity->fantasyName }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
