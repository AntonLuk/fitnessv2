@extends('layouts.master')
@section('content')
    <h2>Все клиенты</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                {{--<th>ID клиента</th>--}}
                <th>ФИО</th>
                <th>Номер телефона</th>
                <th>Создан</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    {{--<td><a href="{{route('clients.show',['id'=>$client->id])}}">{{$client->id}}</a> </td>--}}
                    <td>{{$client->FIO}}</td>
                    <td>{{$client->number}}</td>
                    <td>{{$client->created_at}}</td>
                    <td><input type="button"  class="" style="width:100px;height:35px; "
                               value="Посещения"
                               onclick='location.href = "{{route('clients.visits',['id'=>$client->id])}}";'></td>
                    <td><input type="button"  class="" style="width:80px;height:35px; "
                               value="Показать"
                               onclick='location.href = "{{route('clients.show',['id'=>$client->id])}}";'></td>
                    <td>	<input type="button" style="width:80px;height:35px;"
                                        value="Удалить"
                                        onclick='if(confirm("Вы действительно хотите удалить клиента?")) {
                                                location.href = "{{route('clients.destroy',['id'=>$client->id])}}";}'>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    @endsection