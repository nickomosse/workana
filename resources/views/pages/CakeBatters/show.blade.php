@extends('adminlte::page')

@section('title', "Massa de bolo")

@section('content_header')
    <h1>Massa de bolo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $cakeBatter->id }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $cakeBatter->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('cakebatters.destroy', $cakeBatter->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
