@extends('adminlte::page')

@section('title', "Recheio de bolo")

@section('content_header')
    <h1>Recheio de bolo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $cakeFilling->id }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $cakeFilling->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('cakefillings.destroy', $cakeFilling->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
