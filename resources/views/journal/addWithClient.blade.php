@extends('layouts.master')
@section('content')
    <h2>Добавление абонемента</h2>
    <form class="" method="post" action="{{route('journaltics.create')}}">
        @csrf
        <div class="container">

            <div class="form-group">
                <input type="button"  class="btn btn-info"
                       value="Договор"
                       onclick='location.href = "{{route('clients.print',['id'=>$client->id])}}";'>
            </div>
            <div class="form-group">
                <label>Тип абонемента</label>
                <select class="form-control" onchange="prob()" id="type" name="type_ticket_id">
                    @foreach($type_tickets as $ticket)
                        <option value="{{$ticket->id}}">{{$ticket->name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="client_id" value="{{$client->id}}">
            <div class="form-group">
                <label>Клиент</label>
                <input type="text" class="form-control" readonly name="client_FIO" value="{{$client->FIO}}">
            </div>
            <div class="form-group">
                <label>Количество(Кол-во занятий) или (Кол-во месяцов)</label>
                <input type="text" id="amount" onchange="calc()" name="amount" class="form-control">
            </div>
            <div class="form-group">
                <label>Стоимость</label>
                <input type="number" name="cost" id="cost" class="form-control">
            </div>
            <script>
                function calc(){
                    let amount = document.getElementById('amount').value;
                    let cost = document.getElementById('cost');
                    let type=document.getElementById('type').value;
                    let tickets=@json($type_tickets);
                    tickets.forEach(function (ticket) {
                        if(type==ticket.id){
                            cost.value=amount*ticket.price;
                        }
                    });
                }
                function prob() {
                    let type=document.getElementById('type').value;
                    let cost = document.getElementById('cost');
                    let amount=document.getElementById('amount');

                    if(type==3){
                        cost.readOnly=true;
                        cost.value=0;
                        amount.readOnly=true;
                        amount.value=1;
                    }else{
                        cost.readOnly=false;
                        amount.readOnly=false;
                    }
                }
            </script>
            <div class="form-group">
                <label>Дата выдачи</label>
                <input type="date" id="myDate" class="form-control" name="date">
                <script>
                    document.getElementById('myDate').valueAsDate = new Date();
                </script>

            </div>

            <input type="submit" class="btn btn-success" value="Добавить">
        </div>
    </form>
@endsection