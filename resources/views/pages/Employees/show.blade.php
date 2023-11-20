@extends('adminlte::page')

@section('title', "Funcionário")

@section('content_header')
    <h1>Funcionário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <img class="shadow-lg rounded" style="height: 200px; width: 200px; border: solid 3px #324158; border-radius: 2%" src="{{url("storage/{$employee->photo}")}}" alt="">
            <div class="my-3">
                <div class="mb-2">
                    <strong>NÚMERO IDENTIFICADOR (ID): </strong> {{ $employee->id }}
                </div>
                <div class="mb-2">
                    <strong>NOME: </strong> {{ $employee->name }}
                </div>
                <div class="mb-2">
                    <strong>APELIDO: </strong> {{ $employee->nick }}
                </div>
                <div class="mb-2">
                    <strong>EMAIL: </strong> {{ $employee->email }}
                </div>
                <div class="mb-2">
                    <strong>CELULAR: </strong> {{ $employee->cell }}
                </div>
                <div class="mb-2">
                    <strong>GÊNERO: </strong> {{ $employee->gender }}
                </div>
                <div class="mb-2">
                    <strong>CPF: </strong> {{ $employee->cpf }}
                </div>
                <div class="mb-2">
                    <strong>RG: </strong> {{ $employee->rg }}
                </div>
                <div class="mb-2">
                    <strong>ENDEREÇO: </strong> {{ $employee->address }}
                </div>
                <hr>
                <div class="mb-2">
                    <strong>Nome do contato de emergência: </strong> {{ $employee->emergency_contact_name }}
                </div>
                <div class="mb-2">
                    <strong>Telefone do contato de emergência: </strong> {{ $employee->emergency_contact_cell}}
                </div>

            </div>
        </div>
        <div class="card-footer">
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
