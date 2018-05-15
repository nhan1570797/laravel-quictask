@extends('templates.auth.master')
@section('main')
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        @include('common.errors')
        <div class="row">
            <div class="col-lg-12">
                @if( Session::get('msg') )
                    <p class=" alert alert-success">{{ Session::get('msg') }}</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if( Session::get('msgs') )
                    <p class=" alert alert-danger">{{ Session::get('msgs') }}</p>
                @endif
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ trans('user.register' ) }}
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    {!! Form::open(['action' => 'Task\UserController@store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            {!! Form::label('username', trans('user.username'), ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('username', '', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', trans('user.password'), ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', trans('user.email'), ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('email', '', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('fullname', trans('user.fullname'), ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('fullname', '', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 control-label">
                                <label for="">{{ trans('user.role') }} :</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="role" value="2">{{ trans('user.member') }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> {{ trans('user.register') }}
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
