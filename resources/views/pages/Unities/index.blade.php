@extends('adminlte::page')

@section('title', 'Unidade')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Unidade
        </div>

        <div class="card-body">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome Fantasia</th>
                        <th>CNPJ</th>
                        <th>Nome no CNPJ</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Celular</th>
                        <th>Endereço</th>
                        <th style="width: 50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unities as $unity)
                        <tr>
                            <td>
                                {{$unity->fantasyName}}
                            </td>
                            <td>
                                {{$unity->cnpj}}
                            </td>
                            <td>
                                {{$unity->cnpjName}}
                            </td>
                            <td>
                                {{$unity->email}}
                            </td>
                            <td>
                                {{$unity->tel}}
                            </td>
                            <td>
                                {{$unity->cel}}
                            </td>
                            <td>
                                {{$unity->address}}
                            </td>
                            <td>
                                <a href="{{route('unities.show', $unity->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('unities.edit', $unity->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('unities.create')}}" class="btn btn-dark">Nova Unidade</a>
        </div>
    </div>
@stop
