@extends('layouts.start')

@section('content') 
        <p>
                <h3 style="color: black">Fullname - {{ $worker_fullname }}</h3>
                <h3 style="color: black">ID user - {{ $worker_id }}</h3>
                <h3 style="color: black">Position - {{$position -> n_position}}</h3>
                <h3 style="color: black">Salary - {{$position -> salary}}</h3>
                @foreach($settlementsheet as $SS)
                        <h3 style="color: black">Pay date- {{ $SS -> pay_date}}  ({{$SS -> id_settlement_sheet}})</h3>
                        <h3 style="color: black">Sick leave - {{$SS -> sick_leave}}</h3>
                        <h3 style="color: black">Annual leave - {{$SS -> annual_leave}}</h3>
                        <h3 style="color: black">Awards- {{ $SS -> awards_fine}} </h3>
                        <h3 style="color: black">Hours- {{ $SS -> hours}} </h3>
                @endforeach
        </p>
        <p><a class="btn btn-success" href="{{route('addSS', ['id_worker'=>$worker->id_worker])}}" role="button">Add Settlement Sheet</a></p>
        <p><a class="btn btn-warning" href="{{route('refreshSS')}}" role="button">Update Settlement Sheet</a></p>
        <form method="POST" action= "{{route('destroySS', ['id_settlement_sheet'=>$SS->id_settlement_sheet])}}">
                {{ csrf_field() }}
                <button class = "btn btn-danger">Delete Settlement Sheet</button>
                <input type="text" name="id_settlement_sheet">
        </form>         
@endsection 

