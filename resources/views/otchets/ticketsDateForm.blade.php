@extends('layouts.master')
@section('content')
    <form method="post" action="{{route('otchets.ticketDate')}}">
        @csrf
        <div class="form-group">
            <label>Абонементы выданные за период</label>
            <div class="row">
                <div class="col">
                     <div class="form-group">
                         <label>Начало</label>
                         <input type="date" name="start" class="form-control">
                     </div>
                </div>
                <div class="col">
                    <label>Конец</label>
                    <input type="date" name="end" class="form-control">

                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Печать">
                    </div>

                </div>
            </div>
        </div>
    </form>
    @endsection