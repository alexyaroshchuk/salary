@extends('layouts.start')

@section('content') 
        <p>
                <h3>Fullname - {{ $worker_fullname }}</h3>
                <h3>ID user - {{ $worker_id }}</h3>
                <h3>Position - {{$position -> n_position}}</h3>
                <h3>Salary - {{$position -> salary}}</h3>
                @foreach($settlementsheet as $SS)
                        <h3>Pay date- {{ $SS -> pay_date}}  ({{$SS -> id_settlement_sheet}})</h3>
                        <h3>Sick leave - {{$SS -> sick_leave}}</h3>
                        <h3>Annual leave - {{$SS -> annual_leave}}</h3>
                        <h3>Awards- {{ $SS -> awards_fine}} </h3>
                        <h3>Hours- {{ $SS -> hours}} </h3>
                @endforeach
        </p>
        <p><a class="btn btn-success" href="{{route('addSS', ['id_worker'=>$worker->id_worker])}}" role="button">Add Settlement Sheet</a></p>
        <p><a class="btn btn-warning" href="{{route('refreshSS')}}" role="button">Update Settlement Sheet</a></p>
        foreach($settlementsheet as $SS)
                <form action="/deleteSS/{{$SS->id_settlement_sheet}}" method="post">
                {{ csrf_field() }}
                <button>удалить сотрудника</button>
                </form>         
        @endforeach
@endsection 

