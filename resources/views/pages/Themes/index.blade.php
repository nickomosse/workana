@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Temas
        </div>

        <div class="card-body">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Gênero</th>
                        <th style="width: 50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($themes as $theme)
                        <tr>
                            <td>
                                {{$theme->name}}
                            </td>
                            <td>
                                @if ($theme->genero == 0) Masculino @endif
                                @if ($theme->genero == 1) Feminino @endif
                                @if ($theme->genero == 2) Unissex @endif
                            </td>
                            <td>
                                <a href="{{route('themes.show', $theme->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('themes.edit', $theme->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('themes.create')}}" class="btn btn-dark">Novo Tema</a>
        </div>
    </div>
@stop
