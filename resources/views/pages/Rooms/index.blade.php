@extends('adminlte::page')

@section('title', 'Salão de festas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Salão de festas
        </div>

        <div class="card-body">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Unidade</th>
                        <th style="width: 50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <td>
                                {{$room->name}}
                            </td>
                            <td>
                                {{$room->unity->fantasyName}}
                            </td>
                            <td>
                                <a href="{{route('rooms.show', $room->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('rooms.edit', $room->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('rooms.create')}}" class="btn btn-dark">Novo Salão de festas</a>
        </div>
    </div>
@stop
