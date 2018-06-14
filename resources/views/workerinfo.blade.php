<?php
    use App\Role;
    $role = new Role();
?>
@extends('layouts.start')
@section('content') 
<div class="col-xs-6 col-sm-4">
        <div id="accordion" class="panel behclick-panel">
        <p>
                <h4 style="color: #585858">Фамилия, Имя - {{ $worker_fullname }}</h4>
                <h4 style="color: #585858">ID пользователя - {{ $worker_id }}</h4>
                <h4 style="color: #585858">Должность - {{$position -> n_position}}</h4>
                <h4 style="color: #585858">Ставка - {{$position -> salary}}</h4>
                @foreach($settlementsheet as $SS)
                <div class="panel panel-default">
                        <div class="panel-heading" >
                                <a data-toggle="collapse">
                                        <h4 style="color: #585858">Дата выдачи З\П- {{ $SS -> pay_date}}  ({{$SS -> id_settlement_sheet}})</h4>
                                </a>
                        </div>     
                </div> 
			<ul class="list-group">
				<li class="list-group-item">
                                        <h4 style="color: #585858">Больничные дни - {{$SS -> sick_leave}}</h4>
                                </li>
                                <li class="list-group-item">
                                        <h4 style="color: #585858">Отпускные дни - {{$SS -> annual_leave}}</h4>
                                </li>
                                <li class="list-group-item">
                                        <h4 style="color: #585858">Премии - {{ $SS -> awards_fine}} </h4>
                                </li>
                                <li class="list-group-item">
                                        <h4 style="color: #585858">Отработанные часы- {{ $SS -> hours}} </h4>
                                </li>
                                <li class="list-group-item">
                                        <h4 style="color: #585858">Тип налога- {{ $SS -> taxe -> id_taxes}} </h4>
                                </li>
                                <li class="list-group-item">
                                        <h4 style="color: #585858">Суммарная З\П без вычета налогов- {{1000*$position -> salary +  $SS -> awards_fine}}</h4>
                                </li>
                                <li class="list-group-item">
                                        <h4 style="color: #585858">Суммарные налоговые отчисления- 
                                                {{
                                                   (1000*$position -> salary +  $SS -> awards_fine)*$SS->taxe->medical_funds +
                                                   (1000*$position -> salary +  $SS -> awards_fine)*$SS->taxe->military_funds +
                                                   (1000*$position -> salary +  $SS -> awards_fine)*$SS->taxe->pension_funds +
                                                   (1000*$position -> salary +  $SS -> awards_fine)*$SS->taxe->social_security_funds 

                                                }}</h4>
                                </li>
                                <li class="list-group-item">
                                        <h4 style="color: #585858">Итоговая З\П- 
                                                {{ 1000*$position -> salary +  $SS -> awards_fine -(
                                                   (1000*$position -> salary +  $SS -> awards_fine)*$SS->taxe->medical_funds +
                                                   (1000*$position -> salary +  $SS -> awards_fine)*$SS->taxe->military_funds +
                                                   (1000*$position -> salary +  $SS -> awards_fine)*$SS->taxe->pension_funds +
                                                   (1000*$position -> salary +  $SS -> awards_fine)*$SS->taxe->social_security_funds) 

                                                }}</h4>
                                </li>
                        </ul>
                @endforeach
                
        </p>
        @if(Role::isAdmin() || Role::isAccountant())
                <p><a class="btn btn-info" style="color: black"  href="{{route('addSS', ['id_worker'=>$worker->id_worker])}}" role="button">Добавить расчетный лист</a></p>
                <p><a class="btn btn-info" style="color: black" href="{{route('refreshSS')}}" role="button">Изменить расчетный лист</a></p>
                <form method="POST" action= "/deleteSS/{{$SS->id_settlement_sheet}}">
                        {{ csrf_field() }}
                        <button class = "btn btn-info" style="color: black">Удалить расчетный лист</button>
                        <input type="text" name="id_settlement_sheet">
                </form>    
        @endif   
        </div> 
</div> 
@endsection 

