@extends('adminlte::page')

@section('title', 'Funcionários')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Funcionário
        </div>

        <div class="card-body">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Gênero</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th style="width: 50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>
                                <img style="height: 50px; width: 50px; border: solid 1px green" src="{{url("storage/{$employee->photo}")}}" alt="">
                            </td>
                            <td>
                                {{$employee->name}}
                            </td>
                            <td>
                                {{$employee->nick}}
                            </td>
                            <td>
                                {{$employee->email}}
                            </td>
                            <td>
                                {{$employee->cell}}
                            </td>
                            <td>
                                {{$employee->gender}}
                            </td>
                            <td>
                                {{$employee->cpf}}
                            </td>
                            <td>
                                {{$employee->rg}}
                            </td>
                            <td>
                                <a href="{{route('employees.show', $employee->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('employees.create')}}" class="btn btn-dark">Novo funcionário</a>
        </div>
    </div>
@stop
