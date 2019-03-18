@extends('layouts.master')
@section('content')
    <h2>Все абонементы</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                {{--<th>ID клиента</th>--}}
                <th>Номер договора</th>
                <th>Тип абонемента</th>
                <th>Количество</th>
                <th>Дата выдачи</th>
                <th>Активен</th>
                <th>Дней заморозки</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    {{--<td><a href="{{route('clients.show',['id'=>$client->id])}}">{{$client->id}}</a> </td>--}}

                    <td>{{$ticket->contract->number}}</td>

                    <td>{{$ticket->typeTicket->name}}</td>
                    <td>{{$ticket->amount}}</td>
                    {{--@foreach($ticket->journalTickets as $journal)--}}
                    <td>{{$ticket->date_delivery}}</td>
                    @if($ticket->activity==1)
                    <td>Да</td>
                        @else<td>Нет</td>
                        @endif
                    <td>{{$ticket->count_off}}</td>
                        {{--@endforeach--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection