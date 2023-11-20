@extends('adminlte::page')

@section('title', "Pacote de festas")

@section('content_header')
    <h1>Novo Pacote de festas</h1>
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

            <form action="{{route('packages.store')}}" class="form" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Pacote Mickey - 2023 - Menino">
                </div>
                <div class="form-group">
                    <label for="year">Ano:</label>
                    <select class="custom-select rounded-0" id="year" name="year">
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Número de convidados:</label>
                    <input type="number" name="guests" class="form-control" placeholder="120">
                </div>
                <div class="form-group">
                    <label>Valor:</label>
                    <input type="number" name="price" class="form-control" placeholder="10500">
                </div>

                {{-- <div class="form-group">
                    <label for="unity">Unidade:</label>
                    <select class="custom-select rounded-0" id="unity" name="unity">
                        @foreach ($unities as $unity)
                            <option value="{{$unity->id}}">{{$unity->fantasyName}}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="form-group">
                    <label for="type">Salões:</label>
                    @foreach ($rooms as $room)
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input custom-control-input-danger" type="checkbox" id="{{$room->id}}" name="rooms[]" value="{{$room->id}}">
                            <label for="{{$room->id}}" class="custom-control-label">{{$room->name}}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
