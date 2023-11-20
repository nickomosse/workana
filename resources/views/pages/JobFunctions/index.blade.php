@extends('adminlte::page')

@section('title', 'Funções de funcionários')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Funções de Funcionário
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
                    @foreach ($jobfunctions as $jobfunction)
                        <tr>
                            <td>
                                {{$jobfunction->name}}
                            </td>
                            <td>
                                <a href="{{route('jobfunctions.show', $jobfunction->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('jobfunctions.edit', $jobfunction->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('jobfunctions.create')}}" class="btn btn-dark">Nova função de funcionários</a>
        </div>
    </div>
@stop
