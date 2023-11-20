@extends('adminlte::page')

@section('title', "Unidade")

@section('content_header')
    <h1>Unidade</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $unity->id }}
                </li>
                <li>
                    <strong>Nome Fantasia: </strong> {{ $unity->fantasyName }}
                </li>
                <li>
                    <strong>Cnpj: </strong> {{ $unity->cnpj }}
                </li>
                <li>
                    <strong>Nome no CNPJ: </strong> {{ $unity->cnpjName }}
                </li>
                <li>
                    <strong>Email: </strong> {{ $unity->email }}
                </li>
                <li>
                    <strong>Telefone: </strong> {{ $unity->tel }}
                </li>
                <li>
                    <strong>Celular: </strong> {{ $unity->cel }}
                </li>
                <li>
                    <strong>Endereço: </strong> {{ $unity->address }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('unities.destroy', $unity->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
