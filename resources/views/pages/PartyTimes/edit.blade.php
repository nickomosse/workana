@extends('adminlte::page')

@section('title', "Horário de festa")

@section('content_header')
    <h1>Horário de festa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('partytimes.update', $partyTime->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Início:</label>
                    <input type="time" name="start" class="form-control" value="{{ $partyTime->start ?? old('start') }}">
                </div>

                <div class="form-group">
                    <label>Fim:</label>
                    <input type="time" name="end" class="form-control" value="{{ $partyTime->end ?? old('end') }}">
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
