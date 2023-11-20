@extends('adminlte::page')

@section('title', "Bonificações")

@section('content_header')
    <h1>Bonificações</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $bonification->id }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $bonification->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('bonifications.destroy', $bonification->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
