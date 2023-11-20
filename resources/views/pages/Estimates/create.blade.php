@extends('adminlte::page')

@section('title', "Orçamento")

@section('content_header')
    <h1>Novo Orçamento</h1>
@stop

@section('js')
    <script>
        // Manipulação da idade dinâmica
        document.querySelector('#date').addEventListener("blur", function(){
            insereIdade();
        });

        document.querySelector('#birthday').addEventListener("blur", function(){
            if(document.querySelector('#date').value) insereIdade();
        });

        function insereIdade(){
            const birthday = new Date(document.querySelector("#birthday").value);
            const date = new Date(document.querySelector("#date").value);

            var diffMilissegundos = date - birthday;
            var diffSegundos = diffMilissegundos / 1000;
            var diffMinutos = diffSegundos / 60;
            var diffHoras = diffMinutos / 60;
            var diffDias = diffHoras / 24;
            var diffMeses = diffDias / 30;
            var diffAnos = diffMeses / 12;


            let msg = " ";

            if(diffAnos >= 1 ) {
                msg = "O Aniversariante faz: " + Math.floor(diffAnos) + " Anos";
            } else {
                msg = "O Aniversariante faz: " + Math.floor(diffMeses) + " Meses";
            }

            if(diffMeses < 0) msg = "A festa é antes do nascimento!";

            document.querySelector("#agelabel").innerHTML = msg;
            document.querySelector("#agelabel").classList.remove("d-none");
        }
        // Fim da manipulação da idade dinâmica



        document.querySelector("#package").addEventListener("change", function(){
            select = document.querySelector("#package");
            let total = select.options[select.selectedIndex].getAttribute("data-info");
                valor = parseFloat(total)
                        .toLocaleString('pt-BR', {
                            maximumFractionDigits: 2
                        });

            document.querySelector("#total").value = valor;

            signal = total / document.querySelector("#signalPercentage").value;
            document.querySelector("#signal").value = signal;

            division = document.querySelector("#division").value;
            installments = (total - signal)/division;

            document.querySelector("#installments").value = parseFloat(installments)
                                                            .toLocaleString('pt-BR', {
                                                                maximumFractionDigits: 2
                                                            });
        });

        document.querySelector("#division").addEventListener("change", function(){
            select = document.querySelector("#package");
            let total = select.options[select.selectedIndex].getAttribute("data-info");

            signal = total / document.querySelector("#signalPercentage").value;

            division = document.querySelector("#division").value;
            installments = (total - signal)/division;

            document.querySelector("#installments").value = parseFloat(installments)
                                                            .toLocaleString('pt-BR', {
                                                                minimumFractionDigits: 2,
                                                                maximumFractionDigits: 2
                                                            });
        });




    </script>
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

            <form action="{{route('estimates.store')}}" class="form" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Nome:</label>
                        <input type="text" name="name" class="form-control" placeholder="Artur Santos" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Nascimento:</label>
                        <input type="date" name="birthday" class="form-control" id="birthday" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="gender">Gênero:</label>
                        <select class="custom-select rounded-0" id="gender" name="gender" required>
                            <option value=1>Masculino</option>
                            <option value=0>Feminino</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Data da festa:</label>
                        <input type="date" name="date" id="date" class="form-control" placeholder="06/04/2025" required>
                        <label id="agelabel" class="mt-2 d-none"></label>

                    </div>

                    <div class="form-group col-md-3">
                        <label for="package">Pacote da festa:</label>
                        <select class="custom-select rounded-0" id="package" name="package" required>
                            <option value="" disabled selected hidden>Selecione uma opção</option>
                            @foreach ($packages as $package)
                                <option value="{{$package->id}}" data-info="{{$package->price}}">{{$package->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="referral">Como conheceu o espaço:</label>
                        <select class="custom-select rounded-0" id="referral" name="referral" required>
                            @foreach ($referrals as $referral)
                                <option value="{{$referral->id}}">{{$referral->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="partyTime">Hora da festa:</label>
                        <select class="custom-select rounded-0" id="partyTime" name="partyTime_id" required>
                            @foreach ($partyTimes as $partyTime)
                                <option value="{{$partyTime->id}}">{{date('H:i', strtotime($partyTime->start))}} às {{date('H:i', strtotime($partyTime->end))}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="total">Valor total:</label>
                        <input type="text" name="total" class="form-control" id="total">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="signal">Sinal:</label>
                        <input type="text" name="signal" class="form-control" id="signal" required>
                        <input type="hidden" id="signalPercentage" value="{{$signalPercentage}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="division">Número de parcelas:</label>
                        <select class="custom-select rounded-0" id="division" name="division" required>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>

                    </div>
                    <div class="form-group col-md-3">
                        <label for="installments">Valor da parcela:</label>
                        <input type="text" name="installments" class="form-control" id="installments" value="1.000" required>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Nome do responsável 1:</label>
                        <input type="text" name="frespname" class="form-control" placeholder="Tereza Cruz" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email do responsável 1:</label>
                        <input type="email" name="frespemail" class="form-control" placeholder="tere@hotmail.com" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Celular do responsável 1:</label>
                        <input type="text" name="frespcel" class="form-control" placeholder="284453448" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Nome do responsável 2:</label>
                        <input type="text" name="srespname" class="form-control" placeholder="Marcos Cruz" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Celular do responsável 2:</label>
                        <input type="text" name="srespcel" class="form-control" placeholder="21985641245" required>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Observação:</label>
                            <textarea class="form-control" name="comment" rows="5">Comentário padrão</textarea>

                        </div>
                    </div>
                    <div class="col-sm-2"></div>


                    <div class="col-sm-4 mt-4">
                        <div class="form-group">
                            <label for="observations">Observações rápidas:</label>
                            @foreach ($observations as $observation)
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input custom-control-input-danger" type="checkbox" id="{{$observation->id}}" name="observations[]" value="{{$observation->id}}">
                                    <label for="{{$observation->id}}" class="custom-control-label">{{$observation->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>



                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
