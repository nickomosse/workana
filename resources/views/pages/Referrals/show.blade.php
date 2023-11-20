@extends('adminlte::page')

@section('title', "Referências")

@section('content_header')
    <h1>Referências</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Id: </strong> {{ $referral->id }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $referral->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('referrals.destroy', $referral->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> | DELETAR</button>
            </form>
        </div>
    </div>
@endsection
