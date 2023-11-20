@extends('adminlte::page')

@section('title', "Serviço Extra")

@section('content_header')
    <h1>Novo Serviço Extra</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('services.store') }}" class="form" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Decoração Mega">
                </div>

                <div class="form-group">
                    <label for="serviceType_id">Tipo de Serviço Extra:</label>
                    <select class="custom-select rounded-0" id="serviceType_id" name="service_type_id">
                        @foreach ($serviceTypes as $serviceType)
                            <option value="{{$serviceType->id}}">{{$serviceType->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Valor:</label>
                    <input type="number" min="0.00" max="10000.00" step="0.01" name="price" class="form-control" placeholder="120.00">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
