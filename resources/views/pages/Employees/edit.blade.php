@extends('adminlte::page')

@section('title', "Funcionário")

@section('content_header')
    <h1>Funcionário</h1>
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

            <form action="{{ route('employees.update', $employee->id) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Nome:</label>
                        <input type="text" name="name" class="form-control" value="{{$employee->name}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Apelido (opcional):</label>
                        <input type="text" name="nick" class="form-control" value="{{$employee->nick}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="gender">Gênero:</label>
                        <select class="custom-select rounded-0" id="gender" name="gender">
                            <option value="masculino" @if ($employee->gender == "masculino") selected @endif>Masculino</option>
                            <option value="feminino" @if ($employee->gender == "feminino") selected @endif>Feminino</option>
                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Data de nascimento:</label>
                        <input type="date" name="birth_date" class="form-control" value="{{$employee->birth_date}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>CPF:</label>
                        <input type="text" name="cpf" class="form-control" value="{{$employee->cpf}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>RG:</label>
                        <input type="text" name="rg" class="form-control" value="{{$employee->rg}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="employee_type">Tipo de funcionário:</label>
                        <select class="custom-select rounded-0" id="employee_type" name="employee_type">
                            @foreach ($employee_types as $employee_type)
                                <option value="{{$employee_type->id}}" @if ($employee->type == $employee_type->id) selected @endif>{{$employee_type->name}}</option>
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
                        <input type="text" name="email" class="form-control" value="{{$employee->email}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Celular:</label>
                        <input type="text" name="cell" class="form-control" value="{{$employee->cell}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Contato de emergência (nome):</label>
                        <input type="text" name="emergency_contact_name" class="form-control" value="{{$employee->emergency_contact_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Contato de emergência (telefone):</label>
                        <input type="text" name="emergency_contact_cell" class="form-control" value="{{$employee->emergency_contact_cell}}">
                    </div>
                </div>


                <div class="form-group">
                    <label>Endereço:</label>
                    <input type="text" name="address" class="form-control" value="{{$employee->address}}">
                </div>

                <div class="form-group">
                    <label for="type">Funções do funcionário:</label>
                    @foreach ($jobfunctions as $jobfunction)
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input custom-control-input-danger" type="checkbox" id="{{$jobfunction->id}}" name="jobfunctions[]" value="{{$jobfunction->id}}" @if ($employee->jobfunctions->contains($jobfunction))
                            checked
                            @endif>
                            <label for="{{$jobfunction->id}}" class="custom-control-label">{{$jobfunction->name}}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="image">Foto:</label>
                    <img class="d-inline m-2" style="max-width: 80px; border: solid 3px green" src="{{url("storage/{$employee->photo}")}}" alt="">
                    <input type="file" name="image" id="image" class="form-control-file">


                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
