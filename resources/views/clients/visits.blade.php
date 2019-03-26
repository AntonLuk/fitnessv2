@extends('layouts.master')
@section('content')
    <h2>Посещения пользователя</h2>
    <div class="container">
        <div class="form-group">
            <label>Фио</label>
            <input type="text" readonly class="form-control" value="{{$contract->client->FIO}}">
        </div>
        <div class="form-group">
            <label>Номер телефона</label>
            <input type="number" readonly class="form-control" value="{{$contract->client->number}}">
        </div>
        <div class="form-group">
            <b class="spoiler-title btn btn-secondary">Добавить посещение</b>
                <div class="spoiler-body border border-primary rounded">
                    <form method="post" action="{{route('clients.addVisit')}}">
                        @csrf
                            <input type="hidden" name="ticket_id" value="{{$tickets->id}}">
                        <input type="hidden" name="client_id" value="{{$contract->client->id}}">
                        <div class="form-group">
                            <label for="comments">Дата начала</label>
                            <input type="datetime-local" id="myDate" class="form-control" name="date_start">
                        </div>


                        <div class="form-group">
                            <label>Дата окончания</label>
                            <input type="datetime-local" id="myDate1" class="form-control" name="date_end">
                        </div>
                        <script>
                            var d = new Date();

                            document.getElementById("myDate").value = d.toISOString().slice(0,16);
                            document.getElementById("myDate1").value = d.toISOString().slice(0,16);
                        </script>
                        <button type="submit" class="form-control btn btn-success">Добавить</button>
                    </form>
                </div>

        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.spoiler-body').hide();
                $('.spoiler-title').click(function(){
                    $(this).next().toggle()});
            });
        </script>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                {{--<th>ID клиента</th>--}}
                <th>id</th>
                <th>Дата Начала</th>
                <th>Дата окончания</th>

            </tr>
            </thead>
            <tbody>
            @foreach($tickets->visits as $visit)
            <tr>
                <td>{{$visit->id}}</td>
                <td>{{$visit->created_at}}</td>
                <td>{{$visit->updated_at}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection
