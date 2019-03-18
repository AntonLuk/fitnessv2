@extends('layouts.master')
@section('content')
    <h2>Добавление клиента</h2>
    <form method="post" action="{{route('clients.create')}}">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <label for="fio">ФИО</label>
                <input type="text" name="fio" class="form-control">
            </div>
            <div class="form-group">
                <label for="number">Номер телефона</label>
                <input type="number" name="number" class="form-control">
            </div>
            <div class="form-group">
                <label for="number">Дата рождения</label>
                <input type="date" name="date_of_birth" class="form-control">
            </div>
            <label>Данные паспорта</label>
            <div class="form-group border border-primary rounded">
                <div class="row">
                    <div class="col">
                        <label>Серия</label>
                        <input type="text" name="passport_series" class="form-control" placeholder="Серия паспорта">
                    </div>
                    <div class="col">
                        <label>Номер</label>
                        <input type="text" name="passport_number" class="form-control" placeholder="Номер пасспорта">
                    </div>
                    <div class="col">
                        <label>Дата выдачи</label>
                        <input type="date" name="passport_date" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="passport_who" placeholder="Кем выдан"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="passport_address" class="form-control" placeholder="Адрес регистрации">
                </div>

            </div>
            <button type="submit" class="btn btn-success">Создать пользователя</button>
        </div>
    </form>
    @endsection