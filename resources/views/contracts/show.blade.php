@extends('layouts.master')
@section('content')
    <div class="container">
        <form method="post" action="">
            @csrf
            <h2>Договор {{$contract->number}} от {{$contract->date}}</h2>
            <div class="form-group">
                <input type="hidden" name="client_id" value="{{$contract->client->id}}">
                <label></label>
                <input type="text" class="form-control" value="{{$contract->client->FIO}}({{$contract->client->number}})">
            </div>
                <br>
            <div class="form-group">
                    <input type="button"  class="btn btn-success"
                           value="Скачать договор"
                           onclick='location.href = "{{route('clients.print',['id'=>$contract->client->id])}}";'></td>
            </div>

        </form>
    </div>
    @endsection