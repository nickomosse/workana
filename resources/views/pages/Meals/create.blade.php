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

            <form action="{{route('meals.store')}}" class="form" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Strogonoff de Frango">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
