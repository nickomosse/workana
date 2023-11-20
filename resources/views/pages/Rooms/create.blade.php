@extends('adminlte::page')

@section('title', "Salão de festas")

@section('content_header')
    <h1>Novo Salão de festas</h1>
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

            <form action="{{route('rooms.store')}}" class="form" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Salão Branco">
                </div>

                <div class="form-group">
                    <label for="unity">Unidade:</label>
                    <select class="custom-select rounded-0" id="unity" name="unity">
                        @foreach ($unities as $unity)
                            <option value="{{$unity->id}}">{{$unity->fantasyName}}</option>
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
