@extends('adminlte::page')

@section('title', 'Recheio de bolo')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Recheio de bolo
        </div>

        <div class="card-body">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th style="width: 50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cakeFillings as $cakeFilling)
                        <tr>
                            <td>
                                {{$cakeFilling->name}}
                            </td>
                            <td>
                                <a href="{{route('cakefillings.show', $cakeFilling->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('cakefillings.edit', $cakeFilling->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('cakefillings.create')}}" class="btn btn-dark">Novo Recheio de Bolo</a>
        </div>
    </div>
@stop
