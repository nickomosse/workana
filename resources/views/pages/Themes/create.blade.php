@extends('adminlte::page')

@section('title', "Refeição")

@section('content_header')
    <h1>Nova Refeição</h1>
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

            <form action="{{route('themes.store')}}" class="form" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Mickey Mágico">
                </div>

                <div class="form-group">
                    <label for="genero">Genero:</label>
                    <select class="custom-select rounded-0" id="genero" name="genero">
                        <option value="0">Masculino</option>
                        <option value="1">Feminino</option>
                        <option value="2">Unissex</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
