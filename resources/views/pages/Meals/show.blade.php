@extends('adminlte::page')

@section('title', "Refeições")

@section('content_header')
    <h1>Refeições</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $meal->id }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $meal->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('meals.destroy', $meal->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
