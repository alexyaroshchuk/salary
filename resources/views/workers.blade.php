@extends('layouts.start')
    <br>
	    min: <input type="text" name="min_P" value="{{ Input::get('max_position') }}">
	<br>
	    max: <input type="text" name="max_position" value="{{ Input::get('max_position') }}">
	<button>Go</button>
    <hr>    

@foreach($workers as $worker)
    <p>       
        {{$worker -> fullname}}
        <p align="center"><a class="btn" href="{{route('workerShow', ['id_worker'=>$worker->id_worker])}}" role="button">Подробнее</a></p>
    </p>
@endforeach
