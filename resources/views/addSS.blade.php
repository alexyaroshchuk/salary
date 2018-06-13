<?php
    use App\Role;
    $role = new Role();
?>
@extends('layouts.start')

@section('content') 
    <div class="form">
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="{{route('storeSS')}}">
              <div class="form-group">
                <label for="title">id сотрудника</label>
                <input type="text" class="form-control" id="title" name="id_worker" placeholder="id_worker">
              </div>
              <div class="form-group">
                <label for="title">Пропуски</label>
                <input type="text" class="form-control" id="title" name="annual_leave" placeholder="annual_leave">
              </div>
              <div class="form-group">
                <label for="alias">Больничные</label>
                <input type="text" class="form-control" id="alias" name="sick_leave" placeholder="sick_leave">
              </div>
              <div class="form-group">
                <label for="alias">Премии и штрафы</label>
                <input type="text" class="form-control" id="alias" name="awards_fine" placeholder="awards_fine">
              </div>
              <div class="form-group">
                <label for="alias">Отработанные часы</label>
                <input type="text" class="form-control" id="alias" name="hours" placeholder="hours">
              </div>
              <div class="form-group">
                <label for="alias">Дата выдачи З\П</label>
                <input type="text" class="form-control" id="alias" name="pay_date" placeholder="pay_date">
              </div>
              <div class="form-group">
                <label for="alias">id налога</label>
                <input type="text" class="form-control" id="alias" name="id_taxes" placeholder="id_taxes">
              </div>
                  <button type="submit" class="btn btn-success">Добавить</button>               
              {{ csrf_field() }} 
            </form>
            </div>
            </div>
            </div>
        </div>
@endsection 