@extends('adminlte::page')

@section('title', "Tipo de serviço")

@section('content_header')
    <h1>Tipo de serviço</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $serviceType->id }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $serviceType->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('servicetypes.destroy', $serviceType->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
