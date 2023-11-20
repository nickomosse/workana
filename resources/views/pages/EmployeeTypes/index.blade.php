@extends('adminlte::page')

@section('title', 'Tipos de funcionários')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Tipos de Funcionário
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
                    @foreach ($employeeTypes as $employeeType)
                        <tr>
                            <td>
                                {{$employeeType->name}}
                            </td>
                            <td>
                                <a href="{{route('employeetypes.show', $employeeType->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('employeetypes.edit', $employeeType->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('employeetypes.create')}}" class="btn btn-dark">Novo tipo de funcionários</a>
        </div>
    </div>
@stop
