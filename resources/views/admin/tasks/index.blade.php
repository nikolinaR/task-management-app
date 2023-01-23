@extends('layouts.dashboard')
@section('content')
    <a href="/tasks/create" class="btn btn-teal margin-bottom-30">Create new task</a>

    <div id="panel-2" class="panel panel-default">
        <div class="panel-heading">
            <span class="title elipsis"><strong>TASKS TABLE</strong></span>
            <!-- right options -->
            <ul class="options pull-right list-inline">
                <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
                <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover table-vertical-middle nomargin">
                    <thead>
                    <tr>
                        <th> </th>
                        <th>Ttile</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Project</th>
                        <th>Start Date</th>
                        <th>Deadline</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>
                                <form action="{{ url('/tasks', [$task->id, 'edit']) }}">
                                    <button type="submit" rel="tooltip" class="btn btn-3d btn-amber">
                                        <i class="fa fa-edit"></i>Edit
                                    </button>
                                </form>
                            </td>
                            <td>{{$task->title}}</td>
                            <td>{{$task->description}}</td>
                            <td>{{$task->status}}</td>
                            <td>{{$task->getProject->title}}</td>
                            <td>{{$task->start_date}}</td>
                            <td>{{$task->due_date}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Large Modal -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- header modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
