@extends('layouts.dashboard')
@section('content')
    @can('create', $task)
        <a href="/tasks/create" class="btn btn-teal margin-bottom-30">Create new task</a>
    @endcan
    <div id="panel-2" class="panel panel-default">
        <div class="panel-heading">
            <span class="title elipsis"><strong>TASKS TABLE</strong></span>
            <!-- right options -->
            <ul class="options pull-right list-inline">
                <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse"
                       data-placement="bottom"></a></li>
                <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen"
                       data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                <li><a href="#" class="opt panel_close" data-confirm-title="Confirm"
                       data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip"
                       title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover table-vertical-middle nomargin">
                    <thead>
                    <tr>
                        <th> users</th>
                        <th>Title</th>
                        <th>id</th>
                        <th>Status</th>
                        <th>Project</th>
                        <th>Start Date</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->getTask as $task)
                        <tr>
                            <td>
                                {{--                                @foreach($task->users as $user)--}}
                                {{--                                    {{$user->name}}--}}
                                {{--                                @endforeach--}}
                            </td>
                            <td>{{$task->title}}</td>
                            <td>{{$task->id}}</td>
                            <td>
								<span class="label label-sm label-success
                                     @if($task->status == 'started')
                                        label-info
                                    @elseif($task->status == 'inProgress')
                                        label-danger
                                    @else label-success  @endif  ">
                                    {{$task->status}}
                                </span>
                            </td>
                            <td>{{$task->getProject->title}}</td>
                            <td>{{$task->start_date}}</td>
                            <td>{{$task->due_date}}</td>
                            @can('update', $task)
                                <td>
                                    <form action="{{ url('/tasks', [$task->id, 'edit']) }}">
                                        <button type="submit" rel="tooltip" class="btn btn-sm btn-amber">
                                            <i class="fa fa-edit"></i><span>Edit</span>
                                        </button>
                                    </form>
                                </td>
                            @endcan
                            @can('update', $task)
                                <td>
                                    <form action="{{ url('/tasks', [$task->id]) }}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-sm btn-red">
                                            <i class="fa fa-trash"></i><span>Delete</span>
                                        </button>
                                    </form>
                                </td>
                            @endcan

                            <td>
                                <button class="btn btn-sm btn-purple" data-toggle="modal"
                                        data-target="#example{{$task->id}}">
                                    <i class="fa fa-refresh"></i><span>Update</span>
                                </button>
                            </td>

                        </tr>

                        <div class="modal fade bs-example-modal-sm" id="example{{$task->id}}" tabindex="-1"
                             role="dialog" aria-labelledby="mySmallModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <!-- header modal -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="mySmallModalLabel">Update Status</h4>
                                    </div>
                                    <!-- body modal -->
                                    <div class="modal-body">
                                        <form action="{{ route('tasks.updateStatus', $task->id) }}" method="post"
                                              data-success="Sent! Thank you!" data-toastr-position="top-right">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                                            @foreach($taskenum as $status)
                                                <label class="radio">
                                                    <input type="radio" name="status" value="{{$status}}">
                                                    <i></i> {{$status}}
                                                </label>
                                            @endforeach
                                            <button type="submit" class="btn  btn-amber  btn-block margin-top-30">
                                                EDIT
                                            </button>
                                        </form>
                                    </div>
                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
