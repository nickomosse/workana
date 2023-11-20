@extends('adminlte::page')

@section('title', "Serviço")

@section('content_header')
    <h1>Serviço Extra</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('services.update', $service->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Decoração Mega" value="{{ $service->name ?? old('name') }}">
                </div>

                {{-- <div class="form-group">
                    <label>Valor:</label>
                    <input type="number" min="0.00" max="10000.00" step="0.01" name="price" class="form-control" placeholder="120.00" value="{{ $service->price ?? old('price') }}>
                </div> --}}

                <div class="form-group">
                    <label for="serviceType_id">Tipo de Serviço Extra:</label>
                    <select class="custom-select rounded-0" id="serviceType_id" name="service_type_id">
                        @foreach ($serviceTypes as $serviceType)
                            <option @if ($service->serviceType->id == $serviceType->id) selected @endif value="{{$serviceType->id}}">{{$serviceType->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
