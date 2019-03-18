@extends('layouts.master')
@section('content')
    <h2>Добавление пользователя</h2>
    <form class="" method="post" action="{{route('journaltics.create')}}">
        @csrf
        <div class="container">
            <div class="form-group">
                <label>Тип абонемента</label>
                <select class="form-control" name="type_ticket_id">
                    @foreach($type_tickets as $ticket)
                        <option value="{{$ticket->id}}">{{$ticket->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Клиент</label>
                <input type="text" class="form-control" readonly name="client_id" value="{{$client->FIO}}">
            </div>
            <div class="form-group">
                <label>Количество(Кол-во занятий) или (Кол-во месяцов)</label>
                <input type="text" name="amount" class="form-control">
            </div>
            <div class="form-group">
                <label>Стоимость</label>
                <input type="number" name="cost" class="form-control">
            </div>
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