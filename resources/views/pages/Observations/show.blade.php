@extends('adminlte::page')

@section('title', "Observações")

@section('content_header')
    <h1>Observações</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $observation->id }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $observation->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('observations.destroy', $observation->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
