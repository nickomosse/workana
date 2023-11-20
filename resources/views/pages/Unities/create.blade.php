@extends('adminlte::page')

@section('title', "Unidade")

@section('content_header')
    <h1>Nova Unidade</h1>
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

            <form action="{{route('unities.store')}}" class="form" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nome Fantasia:</label>
                    <input type="text" name="fantasy_name" class="form-control" placeholder="Casa Alegria" required>
                </div>
                <div class="form-group">
                    <label>CNPJ:</label>
                    <input type="text" name="cnpj" class="form-control" placeholder="88552437000189" required>
                </div>
                <div class="form-group">
                    <label>Nome no CPNJ:</label>
                    <input type="text" name="cnpj_name" class="form-control" placeholder="Festa S.A." required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="casaalegria@gmail.com" required>
                </div>
                <div class="form-group">
                    <label>Telefone:</label>
                    <input type="tel" name="tel" class="form-control" placeholder="2124642264" required>
                </div>
                <div class="form-group">
                    <label>Celular:</label>
                    <input type="tel" name="cel" class="form-control" placeholder="21984757845" required>
                </div>
                <div class="form-group">
                    <label>Endereço:</label>
                    <input type="text" name="address" class="form-control" placeholder="Rua Oliveira, São Paulo - SP" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
