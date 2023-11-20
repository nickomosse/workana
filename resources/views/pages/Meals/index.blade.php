@extends('adminlte::page')

@section('title', 'Refeições')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Refeições
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
                    @foreach ($meals as $meal)
                        <tr>
                            <td>
                                {{$meal->name}}
                            </td>
                            <td>
                                <a href="{{route('meals.show', $meal->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('meals.edit', $meal->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('meals.create')}}" class="btn btn-dark">Nova Refeição</a>
        </div>
    </div>
@stop
