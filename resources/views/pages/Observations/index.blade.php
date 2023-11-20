@extends('adminlte::page')

@section('title', 'Observações')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Observações
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
                    @foreach ($observations as $observation)
                        <tr>
                            <td>
                                {{$observation->name}}
                            </td>
                            <td>
                                <a href="{{route('observations.show', $observation->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('observations.edit', $observation->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('observations.create')}}" class="btn btn-dark">Nova Observação</a>
        </div>
    </div>
@stop
