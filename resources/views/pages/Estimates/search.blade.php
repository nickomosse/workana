@extends('adminlte::page')

@section('title', 'Orçamentos')

@section('content_header')
    <h1>Administrativo</h1>
@stop



@section('content')
    <div class="card">
        <div class="card-header">
            Buscar Orçamento
        </div>

        <div class="card-body">

            <form action="{{route('estimates.results')}}" class="form" method="POST">
                @csrf

                <div class="form-group">
                    <label>Número do orçamento:</label>
                    <input type="text" name="cod" class="form-control" placeholder="1358">
                </div>

                <div class="form-group">
                    <label>Data nascimento:</label>
                    <input type="date" name="birthday" class="form-control">
                </div>

                <div class="form-group">
                    <label>Data festa:</label>
                    <input type="date" name="date" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nome do aniversariante:</label>
                    <input type="text" name="name" class="form-control" placeholder="Marcos">
                </div>
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Buscar orçamento</button>
                </div>
            </form>

        </div>
    </div>
@stop
