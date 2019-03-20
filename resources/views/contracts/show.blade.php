@extends('layouts.master')
@section('content')
    <div class="container">
        <form method="post" action="{{route('clients.print')}}">
            @csrf
            <h2>Договор {{$contract->number}} от {{$contract->date}}</h2>
            <input type="hidden" name="client_id" value="{{$contract->client->id}}">
            <input type="text" class="form-control" value="{{$contract->client->FIO}}({{$contract->client->number}})">
            <input type="submit" class="btn btn-success" value="Распечатать">
        </form>
    </div>
    @endsection