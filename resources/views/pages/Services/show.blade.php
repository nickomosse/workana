@extends('adminlte::page')

@section('title', "Serviço")

@section('content_header')
    <h1>Serviço Extra</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $service->id }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $service->name }}
                </li>
                <li>
                    <strong>Preço: </strong> R$ {{number_format($service->price, 2, ',', '.')}}
                </li>
                <li>
                    <strong>Tipo do serviço: </strong> {{ $service->serviceType->name }}
                </li>

            </ul>
            <hr>

            <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>DELETAR</button>
            </form>
        </div>
    </div>
@endsection
