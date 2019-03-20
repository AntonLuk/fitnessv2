@extends('layouts.master')
@section('content')
    <h2>Все абонементы</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                {{--<th>ID клиента</th>--}}
                <th>Номер договора</th>
                <th>Дата заключения</th>
                <th>Клиент</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contracts as $contract)
                <tr>
                    <td>{{$contract->number}}</td>
                    <td>{{$contract->date}}</td>
                    <td>{{$contract->client->FIO}}({{$contract->client->number}})</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection