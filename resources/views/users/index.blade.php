@extends('layouts.master')
@section('content')
    <h2>Все пользователи</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <th>ID</th>
            <th>ФИО</th>
            <th>Email</th>
            <th></th>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                <td><input type="button"  class="" style="width:100px;height:35px; "
                           value="Показать"
                           onclick='location.href = "{{route('users.show',['id'=>$user->id])}}";'></td>

                <td> @if(Auth::user()->id!=$user->id)<input type="button" style="width:80px;height:35px;"
                               value="Удалить"
                               onclick='if(confirm("Вы действительно хотите удалить пользователя?")) {
                                       location.href = "{{route('users.destroy',['id'=>$user->id])}}";}'>@endif</td>

            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection