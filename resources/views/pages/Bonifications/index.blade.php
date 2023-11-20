@extends('adminlte::page')

@section('title', 'Bonificações')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Bonificações
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
                    @foreach ($bonifications as $bonification)
                        <tr>
                            <td>
                                {{$bonification->name}}
                            </td>
                            <td>
                                <a href="{{route('bonifications.show', $bonification->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('bonifications.edit', $bonification->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('bonifications.create')}}" class="btn btn-dark">Nova Bonificação</a>
        </div>
    </div>
@stop
