@extends('layouts.master')
@section('content')
    <h2>Добавление пользователя</h2>
    <form class="" method="post" action="{{route('users.create')}}">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <label>ФИО</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Добавить">
        </div>
    </form>
    @endsection