@extends('layouts.start') 
@section('content') 
<form action="{{URL::current()}}">
<div class="container-fluid">
    <div class="row">
	<div class="col-xs-6 col-sm-3">
	<div id="accordion" class="panel behclick-panel">
		<div class="panel-heading">
			<h3 class="panel-title">Фильтр сотрудников по параметрам</h3>
		</div>
		<div class="panel-body" >
			<div class="panel-heading" >
				<h4 class="panel-title">
					<a data-toggle="collapse" href="#collapse0">
						<i class="indicator fa fa-caret-down" aria-hidden="true"></i> Дата
					</a>
				</h4>
			</div>
			<div id="collapse0" class="panel-collapse collapse" >
			<ul class="list-group">
				<li class="list-group-item">
                                        <label style="color: gray" for="from_date">С: </label>
                                        <input type="text" name="from_date" value="{{  Input::get('from_date')  }}">
				</li>
                                <li class="list-group-item">
                                        <label style="color: gray" for="to_date">До: </label>
                                        <input type="text" name="to_date" value="{{  Input::get('to_date')}}">
				</li>
                       	</ul>
		        </div>

		        <div class="panel-heading " >
                       	        <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse1">
                                                <i class="indicator fa fa-caret-down" aria-hidden="true"></i> Пропущенные дни по болезни
                                        </a>
				</h4>
				</div>
		        <div id="collapse1" class="panel-collapse collapse" >
		                <ul class="list-group">
					<li class="list-group-item">
                                                <label style="color: gray" for="MinSL">Минимум </label>
                                                <input type="text" name="MinSL" value="{{  Input::get('MinSL')}}">
					</li>
                                        <li class="list-group-item">
                                                <label style="color: gray" for="MaxSL">Максимум </label>
                                                <input type="text" name="MaxSL" value="{{ Input::get('MaxSL')}}"> 
					</li>
				</ul>
			        </div>
				<div class="panel-heading" >
					<h4 class="panel-title">
						<a data-toggle="collapse" href="#collapse3"><i class="indicator fa fa-caret-right" aria-hidden="true"></i> Отпускные</a>
					</h4>
				</div>
				<div id="collapse3" class="panel-collapse collapse">
					<ul class="list-group">
						<li class="list-group-item">
                                                        <label style="color: gray" for="MinAL">Минимум: </label>
                                                        <input type="text" name="MinAL" value="{{  Input::get('MinAL')}}">
						</li>
                                                <li class="list-group-item">
                                                        <label style="color: gray" for="MaxAL">Максимум: </label>
                                                        <input type="text" name="MaxAL" value="{{ Input::get('MaxAL')}}">
						</li>
					</ul>
				</div>
				<div class="panel-heading" >
					<h4 class="panel-title">
						<a data-toggle="collapse" href="#collapse2"><i class="indicator fa fa-caret-right" aria-hidden="true"></i> Премии и Штрафы</a>
					</h4>
				</div>
				<div id="collapse2" class="panel-collapse collapse">
					<ul class="list-group">
						<li class="list-group-item">
                                                        <label style="color: gray" for="MinAF">Минимум: </label>
                                                        <input type="text" name="MinAF" value="{{  Input::get('MinAF')}}">
						</li>
                                                <li class="list-group-item">
                                                        <label style="color: gray" for="MaxAF">Максимум: </label>
                                                        <input type="text" name="MaxAF" value="{{ Input::get('MaxAF')}}">
						</li>
					</ul>
				</div>
                                <div class="panel-heading" >
					<h4 class="panel-title">
						<a data-toggle="collapse" href="#collapse4"><i class="indicator fa fa-caret-right" aria-hidden="true"></i> Отработанные часы</a>
					</h4>
				</div>
				<div id="collapse4" class="panel-collapse collapse">
					<ul class="list-group">
						<li class="list-group-item">
                                                        <label style="color: gray" for="MinHours">Минимум: </label>
                                                        <input type="text" name="MinHours" value="{{  Input::get('MinHours')}}">
						</li>
                                                <li class="list-group-item">
                                                        <label style="color: gray" for="MaxHours">Максимум: </label>
                                                        <input type="text" name="MaxHours" value="{{ Input::get('MaxHours')}}">
						</li>
					</ul>
				</div>
                                <button class="btn btn-info" style = "margin:20px">Применить</button>
			</div>
		</div>
	</div>
        </form>
        <div class="col-md-6">
		<div id="accordion" class="panel behclick-panel">
			<div class="panel-heading">
				<h3 class="panel-title">Рассчетные листы сотрудников:</h3>
			</div>
			<div class="panel-body" >
		@foreach($workers as $worker)
			<p>     
		<h4><a style="color: gray" href="{{route('workerShow', ['id_worker'=>$worker->id_worker])}}">{{$worker->worker->fullname }} ({{ $worker->pay_date}})</a></h4>
			</p>
			@endforeach
			</div>
		</div>
	</div>
</div>
@endsection