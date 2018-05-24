  <!-- resources/views/tasks.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrap Boilerplate... -->
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <div class="row">
            <div class="col-lg-12">
                @if ( Session::get('msg') )
                    <p class=" alert alert-success">{{ Session::get('msg') }}</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if ( Session::get('msgs') )
                    <p class=" alert alert-danger">{{ Session::get('msgs') }}</p>
                @endif
            </div>
        </div>
        <!-- New Task Form -->
        {!! Form::open(array('action' => 'Task\TaskController@store', 'class' => 'form-horizontal')) !!}
            <!-- Task Name -->
            <div class="form-group">
                {!! Form::label('name', trans('messages.task'), array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', '', array('class' => 'form-control')) !!}
                    @if ( $errors->has('name') )
                        {{ array_first($errors->get('name')) }}
                    @endif
                </div>
            </div>
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> {{ trans('messages.add_task') }}
                    </button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <!-- TODO: Current Tasks -->
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('messages.current_task')}}
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <!-- Table Headings -->
                        <thead>
                            <th>{{ trans('messages.stt') }}</th>
                            <th>{{ trans('messages.task')}}</th>
                            <th>{{ trans('messages.user') }}</th>
                            <th>&nbsp;</th>
                        </thead>
                        <!-- Table Body -->
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td>{{ $task->user['username'] }}</td>
                                <td>
                                    <!-- TODO: Delete Button -->
                                    <a href="{{ action('Task\TaskController@show', ['id'=>$task->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{trans('messages.remove')}} </a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
               {{ $tasks->links() }}
            </div>
        </div>
    </div>

@endsection
