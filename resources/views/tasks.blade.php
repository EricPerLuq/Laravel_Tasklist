<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current tasks:
            </div>
            
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task to do:</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                        @if ($task->state == 0)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>
                                    <tr>
                                        <!-- Delete Button -->
                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                    
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                              
                                            </form>
                                            <!-- Done Button -->
                                            <form action="{{ url('Update/'.$task->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <button type="submit">
                                                    <i class="fa fa-trash"></i>Done
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                        <thead>
                            <th>Task done:</th>
                            <th>&nbsp;</th>
                        </thead>
                        @foreach ($tasks as $task)
                        @if ($task->state == 1)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>
                                    <tr>
                                        <!-- Delete Button -->
                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                    
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                              
                                            </form>
                                            <!-- Done Button -->
                                            <form action="{{ url('Updatefalse/'.$task->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <button type="submit">
                                                    <i class="fa fa-trash"></i>To Do
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div> 
        </div>
    @endif
@endsection