@extends('adminlte::page')

@section('title', "Novo horário de festa")

@section('content_header')
    <h1>Novo horário de festa</h1>
@stop

@section('content')
    <div class="card w-25">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{route('partytimes.store')}}" class="form" method="POST">
                @csrf

                <div class="form-group">
                    <label>Início:</label>
                    <input type="time" name="start" class="form-control" placeholder="14:00">
                </div>

                <div class="form-group">
                    <label>Fim:</label>
                    <input type="time" name="end" class="form-control" placeholder="18:00">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
