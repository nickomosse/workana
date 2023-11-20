@extends('adminlte::page')

@section('title', 'Serviço')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="" class="active">Serviço Extra</a></li>
    </ol>

    <h1>Serviço Extra</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Tipo</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>
                                {{ $service->id }}
                            </td>
                            <td>
                                {{ $service->name }}
                            </td>
                            <td>
                               R$ {{number_format($service->price, 2, ',', '.')}}
                            </td>
                            <td>
                                {{ $service->serviceType->name }}
                            </td>

                            <td style="width=10px;">
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('services.show', $service->id) }}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <a href="{{route('services.create')}}" class="btn btn-dark">Novo serviço extra</a>
        </div>

    </div>
@stop
