@extends('adminlte::page')

@section('title', 'Horários de festas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Horários de festas
        </div>

        <div class="card-body">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th style="width: 50px">Início</th>
                        <th>Fim</th>
                        <th style="width: 70">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partyTimes as $partyTime)
                        <tr>
                            <td>
                                {{$partyTime->start}}
                            </td>
                            <td>
                                {{$partyTime->end}}
                            </td>
                            <td>
                                <a href="{{route('partytimes.show', $partyTime->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('partytimes.edit', $partyTime->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('partytimes.create')}}" class="btn btn-dark">Novo horário de festa</a>
        </div>
    </div>
@stop
