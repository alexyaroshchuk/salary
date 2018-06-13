<?php
    use App\Role;
    $role = new Role();
?>
@extends('layouts.start')
@section('content')
@if(Role::isAdmin() || Role::isAccountant()) 
<div class="col-xs-6 col-sm-4">
        <div id="accordion" class="panel behclick-panel">

                @foreach($taxes as $TT)
                <div class="panel panel-default">
                        <div class="panel-heading" >
                                <a data-toggle="collapse">
                                        <h4 style="color: #585858">{{ $TT -> id_taxes}} тип налога:</h4>
                                </a>
                        </div>     
                </div> 
			<ul class="list-group">
				<li class="list-group-item">
                                        <h4 style="color: #585858">Медицинский фонд - {{ $TT -> medical_funds}}</h4>
                                </li>
                                <li class="list-group-item">
                                        <h4 style="color: #585858">Военный фонд - {{$TT -> military_funds}}</h4>
                                </li>
                                <li class="list-group-item">
                                        <h4 style="color: #585858">Пенсионный фонд- {{ $TT -> pension_funds}} </h4>
                                </li>
                                <li class="list-group-item">
                                        <h4 style="color: #585858">Фонд социального страхования- {{ $TT -> social_security_funds}} </h4>
                                </li>
                        </ul>
                @endforeach 
                </form>  
                <p><a class="btn btn-info" style="color: black"  href="{{ route('addTT') }}" role="button">Добавить новый тип налогов</a></p>  
        </div> 
</div> 
@endif 
@endsection