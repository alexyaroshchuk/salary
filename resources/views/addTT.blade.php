<?php
    use App\Role;
    $role = new Role();
?>
@extends('layouts.start')
@section('content') 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel-group">
            <div class="panel panel-info"  style="background:#95c0de">
                <div class="panel-heading">Добавление сотрудника</div>
    </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('createTT') }}">
                        {{ csrf_field() }}


                       <div class="form-group{{ $errors->has('medical_funds') ? ' has-error' : '' }}">
                            <label for="medical_funds" class="col-md-4 control-label">Медицинский фонд</label>

                            <div class="col-md-6">
                                <input id="medical_funds" type="text" class="form-control" name="medical_funds" value="{{old('medical_funds')}}" required autofocus>

                                @if ($errors->has('medical_funds'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('medical_funds') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('military_funds') ? ' has-error' : '' }}">
                            <label for="military_funds" class="col-md-4 control-label">Военный фонд</label>

                            <div class="col-md-6">
                                <input id="military_funds" type="text" class="form-control" name="military_funds" value="{{ old('military_funds') }}" required autofocus>

                                @if ($errors->has('military_funds'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('military_funds') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pension_funds') ? ' has-error' : '' }}">
                            <label for="pension_funds" class="col-md-4 control-label">Пенсионный фонд</label>

                            <div class="col-md-6">
                                <input id="pension_funds" type="text" class="form-control" name="pension_funds" value="{{ old('pension_funds') }}" required autofocus>

                                @if ($errors->has('pension_funds'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pension_funds') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('social_security_funds') ? ' has-error' : '' }}">
                            <label for="social_security_funds" class="col-md-4 control-label">Фонд социального страхования</label>

                            <div class="col-md-6">
                                <input id="social_security_funds" type="social_security_funds" class="form-control" name="social_security_funds" value="{{ old('social_security_funds') }}" required>

                                @if ($errors->has('social_security_funds'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('social_security_funds') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-primary"  type="submit">
                                    Добавить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection 