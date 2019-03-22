@extends('layouts.master')
@section('content')
    <h2>Редактирование клиента</h2>
    <form method="post" action="{{route('clients.update')}}">
        @csrf
        <div class="form-group">
            <div class="container">

                <div class="form-group">
                    <label for="fio">ФИО</label>
                    <input type="text" name="fio" class="form-control" value="{{$client->FIO}}">
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="number">Номер телефона</label>
                            <input type="number" name="number" class="form-control" value="{{$client->number}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Пол</label>
                            <select name="gender_id" class="form-control">
                                @foreach($genders as$gender)
                                    <option value="{{$gender->id}}" @if($client->gender->id==$gender->id)
                                    selected
                                            @endif>
                                        {{$gender->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="number">Дата рождения</label>
                            <input type="date" name="date_of_birth" class="form-control" value="{{$client->date_of_birth}}">
                        </div>
                    </div>
                </div>

            </div>

            <label>Данные паспорта</label>
            <div class="form-group border border-primary rounded">
                <div class="row">
                    <div class="col">
                        <label>Серия</label>
                        <input type="text" name="passport_series" class="form-control" placeholder="Серия паспорта" value="{{$client->passport_series}}">
                    </div>
                    <div class="col">
                        <label>Номер</label>
                        <input type="text" name="passport_number" class="form-control" placeholder="Номер пасспорта" value="{{$client->passport_number}}">
                    </div>
                    <div class="col">
                        <label>Дата выдачи</label>
                        <input type="date" name="passport_date" class="form-control" value="{{$client->passport_date}}">
                    </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="passport_who" placeholder="Кем выдан">{{$client->passport_who}}</textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="passport_address" class="form-control" placeholder="Адрес регистрации" value="{{$client->passport_address}}">
                </div>

            </div>
            <button type="submit" class="btn btn-success">Создать пользователя</button>
        </div>
    </form>
    @endsection