@extends('adminlte::page')

@section('title', "Orçamento")

@section('content_header')
    <h1>Orçamento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="my-3">
            {{-- $estimate->name = $request->name;
            $estimate->birthday = $request->birthday;
            $estimate->gender = $request->gender;
            $estimate->date = $request->date;
            $estimate->age = date_create($request->birthday)->diff(date_create($request->date))->y;

            $estimate->package_id = $request->package;
            $estimate->referral_id = $request->referral;
            $estimate->frespname = $request->frespname;
            $estimate->frespcel = $request->frespcel;
            $estimate->frespemail = $request->frespemail;
            $estimate->srespname = $request->srespname;
            $estimate->srespcel = $request->srespcel; --}}
                <div class="mb-2">
                    <strong>CÓDIGO: </strong> {{ $estimate->cod }}
                </div>
                <hr>
                <div class="mb-2">
                    <strong>ANIVERSARIANTE: </strong> {{ $estimate->name }}
                </div>
                <div class="mb-2">
                    <strong>GÊNERO: </strong> {{ $estimate->gender ? "Masculino" : "Feminino"}}
                </div>
                <div class="mb-2">
                    <strong>IDADE ANIVERSÁRIO: </strong> {{ $estimate->age }}
                </div>

                <div class="mb-2">
                    <strong>NASCIMENTO: </strong> {{ date('d/m/Y', strtotime($estimate->birthday)) }}
                </div>
                <hr>
                <div class="mb-2">
                    <strong>DIA DA FESTA: </strong> {{ date('d/m/Y', strtotime($estimate->date)) . " ($estimate->dayOfWeek)" }}
                </div>
                <div class="mb-2">
                    <strong>HORA: </strong> {{ date('H:i', strtotime($estimate->inittime)) }} às {{ date('H:i', strtotime($estimate->endtime)) }}
                </div>
                <div class="mb-2">
                    <strong>PACOTE: </strong> {{$estimate->package->name}}
                </div>
                <div class="mb-2">
                    <strong>Nº CONVIDADOS: </strong> {{$estimate->package->guests}}
                </div>
                <hr>
                <div class="mb-2">
                    <strong>NOME DO RESPONSÁVEL: </strong> {{ $estimate->frespname }}
                </div>
                <div class="mb-2">
                    <strong>TELEFONE DO RESPONSÁVEL: </strong> {{ $estimate->frespcel }}
                </div>
                <div class="mb-2">
                    <strong>EMAIL DO RESPONSÁVEL: </strong> {{ $estimate->frespemail }}
                </div>

            </div>
        </div>

    </div>
@endsection
