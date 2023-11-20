@extends('adminlte::page')

@section('title', "Pacote de festa")

@section('content_header')
    <h1>Pacote de festa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $package->id }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $package->name }}
                </li>
                <li>
                    <strong>Ano: </strong> {{ $package->year }}
                </li>
                <li>
                    <strong>Número de convidados: </strong> {{ $package->guests }}
                </li>
                <li>
                    <strong>Valor: </strong> {{ $package->price }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('packages.destroy', $package->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
