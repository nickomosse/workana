@extends('adminlte::page')

@section('title', "Configuração do pagamento")

@section('content_header')
    <h1>Configuração do sinal</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">

            {{-- <h5 class="font-weight-bold">Considerar no cálculo do sinal:</h5>
            <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                <label class="btn btn-sm bg-olive active">
                <input type="radio" name="options" id="option_b1" autocomplete="off" checked=""> Festa + Serviços extra
                </label>
                <label class="btn btn-sm bg-olive">
                <input type="radio" name="options" id="option_b2" autocomplete="off"> Somente valor da festa
                </label>
            </div> --}}

            <form action="{{ route('signalConfigs.update') }}" class="form" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group" style="max-width: 300px">
                    <label class="h5 mb-3" for="basecalc">Considerar para cálculo do sinal:</label>
                    <select class="custom-select rounded-0" id="basecalc" name="basecalc">
                        <option value="0" @if ($basecalc == 0) selected @endif>Somente o valor da festa</option>
                        <option value="1" @if ($basecalc == 1) selected @endif>Valor da festa + acréscimos</option>
                    </select>
                </div>
                <div class="form-group" style="max-width: 200px">
                    <label class="h5 mb-3">Percentual aplicado:</label>
                    <input type="number" class="form-control" name="signal" value="{{$signal}}">
                </div>

                <button type="submit" class="btn btn-info btn-flat">Salvar configurações</button>
            </form>

            <hr>

            <h5 class="mt-4 mb-3 font-weight-bold">Formas de pagamento:</h5>
            {{-- @foreach ($payments_types as $payments_type)
                <p>{{$payments_type}}</p>
            @endforeach --}}

            <table class="table table-condensed" style="max-width: 400px">
                <tbody>
                    @foreach ($payments_types as $payments_type)
                        <tr>
                            <td>
                                {{$payments_type['name']}}
                            </td>
                            <td>

                                @if (!$payments_type['active'])
                                    <a href="{{route('payments.enable', $payments_type['name'])}}" class="btn btn-sm btn-success">Habilitar</a>
                                @else
                                    <a href="{{route('payments.disable', $payments_type['name'])}}" class="btn btn-sm btn-info">Desativar</a>
                                @endif
                                @if (!$payments_type['native'])
                                    <a href="{{route('payments.del', $payments_type['name'])}}" class="btn btn-sm btn-danger">Remover</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <h5 class="mt-4 mb-3 font-weight-bold">Adicionar novo meio de pagamento:</h5>

            <form action="{{ route('payments.add') }}" class="form" method="POST">
                @csrf

                <div class="form-group" style="max-width: 200px">
                    <div class="input-group" style="max-width: 300px">
                        <input type="text" class="form-control" name="name" placeholder="Bitcoin" required>
                        <span class="input-group-append">
                        <button type="submit" class="btn btn-info btn-flat">Inserir</button>
                        </span>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
