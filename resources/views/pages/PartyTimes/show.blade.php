@extends('adminlte::page')

@section('title', "Horários de festa")

@section('content_header')
    <h1>Horário de festa</h1>
@stop

@section('content')
    <div class="card w-25">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $partyTime->id }}
                </li>
                <li>
                    <strong>Início: </strong> {{ $partyTime->start }}
                </li>
                <li>
                    <strong>Fim: </strong> {{ $partyTime->end }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('partytimes.destroy', $partyTime->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
