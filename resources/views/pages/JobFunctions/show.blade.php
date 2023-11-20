@extends('adminlte::page')

@section('title', "Função de funcionário")

@section('content_header')
    <h1>Função de funcionário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $jobfunction->id }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $jobfunction->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('jobfunctions.destroy', $jobfunction->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
