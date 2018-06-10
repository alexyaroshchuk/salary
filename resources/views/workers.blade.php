@extends('layouts.start')
   
        <br>
            min Position: <input type="text" name="min_P" value="{{ old('min_position') }}">
        <br>
            maxPosition: <input type="text" name="max_position" value="{{ Input::get('max_position') }}">
        <button>Go</button>
        <hr>   
   
@foreach($workers as $worker)
    <p>       
        <p>{{$worker -> fullname}}</p>
        <p align="center"><a class="btn" href="{{route('workerShow', ['id_worker'=>$worker->id_worker])}}" role="button">Подробнее</a></p>
    </p>
@endforeach
