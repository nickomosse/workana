@extends('adminlte::page')

@section('title', 'Buscar Cliente')

@section('content_header')
    <h1>Administrativo</h1>
@stop



@section('content')
    <div class="card">
        <div class="card-header">
            Buscar Cliente
        </div>

        <div class="card-body">

            <form action="" class="form" method="POST">
                @csrf
                <h2 class="mb-2 text-center">Como deseja buscar o cliente?</h2 class="mb-2 text-center">
                <div class="form-group">
                    <label>Número do cpf:</label>
                    <input type="text" name="cpf" class="form-control" placeholder="15478445635">
                </div>

                <div class="form-group">
                    <label>Número do telefone:</label>
                    <input type="text" name="cell" class="form-control" placeholder="21985806404">
                </div>

                <div class="form-group">
                    <label>Data de nascimento do aniversariante:</label>
                    <input type="date" name="birthday" class="form-control">
                </div>


                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Buscar Cliente</button>
                </div>
            </form>

        </div>
    </div>
@stop
