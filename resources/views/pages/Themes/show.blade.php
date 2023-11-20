@extends('adminlte::page')

@section('title', "Temas")

@section('content_header')
    <h1>Temas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $theme->id }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $theme->name }}
                </li>
                <li>
                    <strong>Genero: </strong>
                                @if ($theme->genero == 0) Masculino @endif
                                @if ($theme->genero == 1) Feminino @endif
                                @if ($theme->genero == 2) Unissex @endif
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('themes.destroy', $theme->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
