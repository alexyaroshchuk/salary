@extends('layouts.start') 
@section('content') 
        <form action="{{URL::current()}}">
        <div class="row">
                <div class="col-md-12 col-md-offset-2">
                        <label style="color: black" for="from_date">From: </label>
                        <input type="text" name="from_date" value="{{  Input::get('from_date')  }}">
                        <label style="color: black" for="to_date">To: </label>
                        <input type="text" name="to_date" value="{{  Input::get('to_date')}}">
                </div>
                <div class = "col-md-3">
                        <label style="color: black" for="MinSL">min Sick leave: </label>
                        <input type="text" name="MinSL" value="{{  Input::get('MinSL')}}">
                        <label style="color: black" for="MaxSL">max Sick leave: </label>
                        <input type="text" name="MaxSL" value="{{ Input::get('MaxSL')}}"> 
                </div>
                <div class = "col-md-3">
                        <label style="color: black" for="MinAL">min Annual leave: </label>
                        <input type="text" name="MinAL" value="{{  Input::get('MinAL')}}">
                        <label style="color: black" for="MaxAL">max Annual leave: </label>
                        <input type="text" name="MaxAL" value="{{ Input::get('MaxAL')}}">
                </div>
                <div class = "col-md-3">
                        <label style="color: black" for="MinAF">min Award/fine: </label>
                        <input type="text" name="MinAF" value="{{  Input::get('MinAF')}}">
                        <label style="color: black" for="MaxAF">max Award/fine: </label>
                        <input type="text" name="MaxAF" value="{{ Input::get('MaxAF')}}">
                </div>
                <div class = "col-md-3">
                        <label style="color: black" for="MinHours">min Hours: </label>
                        <input type="text" name="MinHours" value="{{  Input::get('MinHours')}}"><br>
                        <label style="color: black" for="MaxHours">max Hours: </label>
                        <input type="text" name="MaxHours" value="{{ Input::get('MaxHours')}}">
                </div>
                <button class="btn btn-info" style = "margin:20px">Apply</button> 
                <br>
        </div>
        </form>
        @foreach($workers as $worker)
                <p>       
                        <h4><a style="color: black" href="{{route('workerShow', ['id_worker'=>$worker->id_worker])}}">{{$worker->worker->fullname}}</a></h4>
                </p>
        @endforeach
@endsection