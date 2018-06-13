@extends('layouts.start')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>Здравствуйте, {{Auth::user()->name}}, вы успешно авторизировались!</h2>
                </div>
               <h4><a style="color: gray" href="{{route('workerShow', ['id_worker'=>Auth::user()->id])}}">Личный кабинет </a></h4>
            </div>
        </div>
    </div>
</div>
@endsection
