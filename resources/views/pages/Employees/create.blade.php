@extends('adminlte::page')

@section('title', "funcionários")

@section('content_header')
    <h1>Novo Funcionário</h1>
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

            <form action="{{route('employees.store')}}" class="form" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Nome:</label>
                        <input type="text" name="name" class="form-control" placeholder="Artur Santos">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Apelido (opcional):</label>
                        <input type="text" name="nick" class="form-control" placeholder="Tutu171">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="gender">Gênero:</label>
                        <select class="custom-select rounded-0" id="gender" name="gender">
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Data de nascimento:</label>
                        <input type="date" name="birth_date" class="form-control" placeholder="06/04/1995">
                    </div>
                    <div class="form-group col-md-3">
                        <label>CPF:</label>
                        <input type="text" name="cpf" class="form-control" placeholder="14435739738">
                    </div>
                    <div class="form-group col-md-3">
                        <label>RG:</label>
                        <input type="text" name="rg" class="form-control" placeholder="284453448">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="employee_type">Tipo de funcionário:</label>
                        <select class="custom-select rounded-0" id="employee_type" name="employee_type">
                            @foreach ($employee_types as $employee_type)
                                <option value="{{$employee_type->id}}">{{$employee_type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group col-md-3">
                        <label for="type">Funções do funcionário:</label>
                        <select class="custom-select rounded-0" id="type" name="type">
                            @foreach ($employee_functions as $employee_function)
                                <option value="{{$employee_functions->id}}">{{$employee_functions->name}}</option>
                            @endforeach
                        </select>
                    </div> --}}

                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Email:</label>
                        <input type="text" name="email" class="form-control" placeholder="tusantos@gmail.com">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Celular:</label>
                        <input type="text" name="cell" class="form-control" placeholder="21985806408">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Contato de emergência (nome):</label>
                        <input type="text" name="emergency_contact_name" class="form-control" placeholder="Roberta Santos">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Contato de emergência (telefone):</label>
                        <input type="text" name="emergency_contact_cell" class="form-control" placeholder="21995804508">
                    </div>
                </div>


                <div class="form-group">
                    <label>Endereço:</label>
                    <input type="text" name="address" class="form-control" placeholder="Rua Capitão Machado, 56 - casa 6">
                </div>

                <div class="form-group">
                    <label for="type">Funções do funcionário:</label>
                    @foreach ($jobfunctions as $jobfunction)
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input custom-control-input-danger" type="checkbox" id="{{$jobfunction->id}}" name="jobfunctions[]" value="{{$jobfunction->id}}">
                            <label for="{{$jobfunction->id}}" class="custom-control-label">{{$jobfunction->name}}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
