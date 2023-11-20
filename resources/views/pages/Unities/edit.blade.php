@extends('adminlte::page')

@section('title', "Unidade")

@section('content_header')
    <h1>Unidade</h1>
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

            <form action="{{ route('unities.update', $unity->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nome Fantasia:</label>
                    <input type="text" name="fantasy_name" class="form-control" value="{{ $unity->fantasyName ?? old('fantasy_name') }}">
                </div>
                <div class="form-group">
                    <label>CNPJ:</label>
                    <input type="text" name="cnpj" class="form-control" value="{{ $unity->cnpj ?? old('cnpj') }}">
                </div>
                <div class="form-group">
                    <label>Nome no CPNJ:</label>
                    <input type="text" name="cnpj_name" class="form-control" value="{{ $unity->cnpjName ?? old('cnpj_name') }}">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ $unity->email ?? old('email') }}">
                </div>
                <div class="form-group">
                    <label>Telefone:</label>
                    <input type="tel" name="tel" class="form-control" value="{{ $unity->tel ?? old('tel') }}">
                </div>
                <div class="form-group">
                    <label>Celular:</label>
                    <input type="tel" name="cel" class="form-control" value="{{ $unity->tel ?? old('cel') }}">
                </div>
                <div class="form-group">
                    <label>Endereço:</label>
                    <input type="text" name="address" class="form-control" value="{{ $unity->address ?? old('address') }}">
                </div>
                {{-- <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $cakeBatter->name ?? old('name') }}">
                </div> --}}

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
