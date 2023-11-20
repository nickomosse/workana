@extends('adminlte::page')

@section('title', "Contrato")

@section('content_header')
    <h1>Contrato</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="my-3">
            {{-- $contract->name = $request->name;
            $contract->birthday = $request->birthday;
            $contract->gender = $request->gender;
            $contract->date = $request->date;
            $contract->age = date_create($request->birthday)->diff(date_create($request->date))->y;

            $contract->package_id = $request->package;
            $contract->referral_id = $request->referral;
            $contract->frespname = $request->frespname;
            $contract->frespcel = $request->frespcel;
            $contract->frespemail = $request->frespemail;
            $contract->srespname = $request->srespname;
            $contract->srespcel = $request->srespcel; --}}
                <div class="mb-2">
                    <strong>CÓDIGO: </strong> {{ $contract->cod }}
                </div>
                <hr>
                <div class="mb-2">
                    <strong>ANIVERSARIANTE: </strong> {{ $contract->name }}
                </div>
                <div class="mb-2">
                    <strong>GÊNERO: </strong> {{ $contract->gender ? "Masculino" : "Feminino"}}
                </div>
                <div class="mb-2">
                    <strong>IDADE ANIVERSÁRIO: </strong> {{ $contract->age }}
                </div>

                <div class="mb-2">
                    <strong>NASCIMENTO: </strong> {{ date('d/m/Y', strtotime($contract->birthday)) }}
                </div>
                <hr>
                <div class="mb-2">
                    <strong>DIA DA FESTA: </strong> {{ date('d/m/Y', strtotime($contract->date)) . " ($contract->dayOfWeek)" }}
                </div>
                <div class="mb-2">
                    <strong>HORA: </strong> {{ date('H:i', strtotime($contract->inittime)) }} às {{ date('H:i', strtotime($contract->endtime)) }}
                </div>
                <div class="mb-2">
                    <strong>PACOTE: </strong> {{$contract->package->name}}
                </div>
                <div class="mb-2">
                    <strong>Nº CONVIDADOS: </strong> {{$contract->package->guests}}
                </div>
                <hr>
                <div class="mb-2">
                    <strong>NOME DO RESPONSÁVEL: </strong> {{ $contract->frespname }}
                </div>
                <div class="mb-2">
                    <strong>TELEFONE DO RESPONSÁVEL: </strong> {{ $contract->frespcel }}
                </div>
                <div class="mb-2">
                    <strong>EMAIL DO RESPONSÁVEL: </strong> {{ $contract->frespemail }}
                </div>
                <div class="mb-2">
                    <strong>NÚMERO DO ORÇAMENTO: </strong> {{ $contract->estimate_id }}
                </div>
                <hr>
                 <div class="mb-2">
                    <strong>OBSERVAÇÃO INTERNA: </strong> {{ $contract->icomment }}
                </div>
                <div class="mb-2">
                    <strong>OBSERVAÇÃO EXTERNA: </strong> {{ $contract->ecomment }}
                </div>
                <div class="mb-2">
                    <strong>OBSERVAÇÕES ADICIONAIS: </strong>
                    <ul>
                        @foreach ($contract->observations as $observation)
                        <li>{{$observation->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
