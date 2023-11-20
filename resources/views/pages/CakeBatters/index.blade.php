@extends('adminlte::page')

@section('title', 'Massa de bolo')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Massa de bolo
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
                    @foreach ($cakeBatters as $cakeBatter)
                        <tr>
                            <td>
                                {{$cakeBatter->name}}
                            </td>
                            <td>
                                <a href="{{route('cakebatters.show', $cakeBatter->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('cakebatters.edit', $cakeBatter->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('cakebatters.create')}}" class="btn btn-dark">Nova Massa de Bolo</a>
        </div>
    </div>
@stop
