@extends('adminlte::page')

@section('title', "Configuração do pagamento")

@section('content_header')
    <h1>Configuração do pagamento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('paymentsConfigs.update') }}" class="form" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group" style="max-width: 200px">
                    <label class="h5 mb-3">Dias antes do evento:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="limit" value="{{$limit_days_before_event}}">
                        <span class="input-group-append">
                        <button type="submit" class="btn btn-info btn-flat">Salvar</button>
                        </span>
                    </div>
                </div>
            </form>
            <hr>

            <h5 class="mt-4 mb-3 font-weight-bold">Formas de pagamento:</h5>
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



            {{-- <h5 class="mt-4 mb-3 font-weight-bold">Formas de pagamento:</h5>
            <table class="table table-condensed" style="max-width: 400px">
                <tbody>
                    @foreach ($signal_types as $signal_type)
                        <tr>
                            <td>
                                {{$signal_type['name']}}
                            </td>
                            <td>

                                @if (!$signal_type['active'])
                                    <a href="{{route('signal.enable', $signal_type['name'])}}" class="btn btn-sm btn-success">Habilitar</a>
                                @else
                                    <a href="{{route('signal.disable', $signal_type['name'])}}" class="btn btn-sm btn-info">Desativar</a>
                                @endif
                                @if (!$signal_type['native'])
                                    <a href="{{route('signal.del', $signal_type['name'])}}" class="btn btn-sm btn-danger">Remover</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <h5 class="mt-4 mb-3 font-weight-bold">Adicionar novo meio de pagamento:</h5>

            <form action="{{ route('signal.add') }}" class="form" method="POST">
                @csrf

                <div class="form-group" style="max-width: 200px">
                    <div class="input-group" style="max-width: 300px">
                        <input type="text" class="form-control" name="name" placeholder="Bitcoin">
                        <span class="input-group-append">
                        <button type="submit" class="btn btn-info btn-flat">Inserir</button>
                        </span>
                    </div>
                </div>
            </form> --}}
        </div>
    </div>
@endsection
