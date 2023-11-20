@extends('adminlte::page')

@section('title', 'Pacote de festas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Pacote de festas
        </div>

        <div class="card-body">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ano</th>
                        <th>Quantidade de Convidados</th>
                        <th>Valor</th>

                        <th style="width: 50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                        <tr>
                            <td>
                                {{$package->name}}
                            </td>
                            <td>
                                {{$package->year}}
                            </td>
                            <td>
                                {{$package->guests}}
                            </td>
                            <td>
                                {{$package->price}}
                            </td>

                            <td>
                                <a href="{{route('packages.show', $package->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('packages.edit', $package->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('packages.create')}}" class="btn btn-dark">Novo Pacote de festas</a>
        </div>
    </div>
@stop
