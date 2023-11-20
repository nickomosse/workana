@extends('adminlte::page')

@section('title', 'Referências')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Referências
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
                    @foreach ($referrals as $referral)
                        <tr>
                            <td>
                                {{$referral->name}}
                            </td>
                            <td>
                                <a href="{{route('referrals.show', $referral->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('referrals.edit', $referral->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('referrals.create')}}" class="btn btn-dark">Nova Referência</a>
        </div>
    </div>
@stop
