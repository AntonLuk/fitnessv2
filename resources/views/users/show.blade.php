@extends('layouts.master')
@section('content')
    <h2>Добавление пользователя</h2>
    <form class="" method="post" action="{{route('users.update')}}">
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}">
        <div class="form-group">
            <div class="form-group">
                <label>ФИО</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" class="form-control" name="password" value="" placeholder="Пароль">
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Редактировать">
        </div>
    </form>
@endsection