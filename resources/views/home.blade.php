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
                    <h2>{{Auth::user()->name}}</h2>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
