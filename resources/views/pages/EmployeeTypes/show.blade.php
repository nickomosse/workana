@extends('adminlte::page')

@section('title', "Tipo de funcionário")

@section('content_header')
    <h1>Tipo de funcionário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $employeeType->id }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $employeeType->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('employeetypes.destroy', $employeeType->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
