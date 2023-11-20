@extends('adminlte::page')

@section('title', "Salão de festas")

@section('content_header')
    <h1>Salão de festas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('packages.update', $package->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" value="{{$package->name}}">
                </div>

                <div class="form-group">
                    <label for="year">Ano:</label>
                    <select class="custom-select rounded-0" id="year" name="year">
                        <option value="2023" @if ($package->year == 2023) selected @endif>2023</option>
                        <option value="2024" @if ($package->year == 2024) selected @endif>2024</option>
                        <option value="2025" @if ($package->year == 2025) selected @endif>2025</option>
                        <option value="2026" @if ($package->year == 2026) selected @endif>2026</option>
                        <option value="2027" @if ($package->year == 2027) selected @endif>2027</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Número de convidados:</label>
                    <input type="number" name="guests" class="form-control" value="{{$package->guests}}">
                </div>
                <div class="form-group">
                    <label>Valor:</label>
                    <input type="number" name="price" class="form-control" value="{{$package->price}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
