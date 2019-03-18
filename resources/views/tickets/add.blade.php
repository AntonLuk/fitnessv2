@extends('layouts.master')
@section('content')
    <h2>Добавление абонемента</h2>
    <form class="" method="post" action="{{route('tickets.create')}}">
        @csrf
        <div class="container">
            <div class="form-group">
                <label>Тип абонемента</label>
                <select class="form-control" name="user_id">
                    @foreach($type_tickets as $ticket)
                        <option value="{{$ticket->id}}">{{$ticket->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Клиент</label>
                <select class="form-control" name="user_id">
                    @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->FIO}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Количество(Кол-во занятий) или (Кол-во месяцов)</label>
                <input type="number" name="amount" class="form-control">
            </div>
            <div class="form-group">
                <label>Дата выдачи</label>
                <input type="datetime-local" class="form-control" name="date">
            </div>

            <input type="submit" class="btn btn-success" value="Добавить">
        </div>
    </form>
@endsection