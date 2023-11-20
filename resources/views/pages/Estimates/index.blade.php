@extends('adminlte::page')

@section('title', 'Orçamentos')

@section('content_header')
    <h1>Orçamentos</h1>
@stop




@section('content')
    <div class="card">
        <div class="card-header">
            Orçamento
        </div>

        <div class="card-body">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Aniversariante</th>
                        <th>Pacote</th>
                        <th>Dia da festa</th>
                        <th>Hora da festa</th>
                        <th>Nome do responsável</th>
                        <th>Telefone do responsável</th>

                        <th style="width: 50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estimates as $estimate)
                        <tr>
                            <td>
                                {{$estimate->cod}}
                            </td>
                            <td>
                                {{$estimate->name}}
                            </td>
                            <td>
                                {{$estimate->package->name}}
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($estimate->date)) . " ($estimate->dayOfWeek)" }}
                            </td>
                            <td>
                                {{ date('H:i', strtotime($estimate->inittime)) }} às {{ date('H:i', strtotime($estimate->endtime)) }}
                            </td>
                            <td>
                                {{$estimate->frespname}}
                            </td>
                            <td>
                                {{$estimate->frespcel}}
                            </td>
                            <td>
                                <a href="{{route('estimates.show', $estimate->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('estimates.edit', $estimate->id)}}" class="btn btn-warning">Editar</a>
                                <a href="{{route('estimates.contract', $estimate->id)}}" class="btn btn-info">Gerar Contrato</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('estimates.create')}}" class="btn btn-dark">Novo orçamento</a>
        </div>
    </div>
@stop
