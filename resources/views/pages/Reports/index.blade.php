@extends('adminlte::page')

@section('title', 'Relatórios')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Relatórios
        </div>

        <div class="card-body">

            <a href="{{route('reports.index')}}" class="btn btn-success d-block w-25 my-2">Componentes das festas e Serviços Extras</a>
            <a href="{{route('reports.index')}}" class="btn btn-success d-block w-25 my-2">Orçamentos realizados</a>
            <a href="{{route('reports.index')}}" class="btn btn-success d-block w-25 my-2">Valores de referência</a>
            <a href="{{route('reports.clientssearch')}}" class="btn btn-success d-block w-25 my-2">Relatório de clientes</a>
            <a href="{{route('reports.index')}}" class="btn btn-success d-block w-25 my-2">Relatório de festas</a>

        </div>
    </div>
@stop
