@extends('adminlte::page')

@section('title', 'Tipos de serviços')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Tipos de Serviço
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
                    @foreach ($serviceTypes as $serviceType)
                        <tr>
                            <td>
                                {{$serviceType->name}}
                            </td>
                            <td>
                                <a href="{{route('servicetypes.show', $serviceType->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('servicetypes.edit', $serviceType->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('servicetypes.create')}}" class="btn btn-dark">Novo tipo de serviço</a>
        </div>
    </div>
@stop
