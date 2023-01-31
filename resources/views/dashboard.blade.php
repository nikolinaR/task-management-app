@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="box danger">
                <div class="box-title">
                    <h4><a href="#">Total users</a></h4>
                    <small class="block"></small>
                    {{$users->count()}}
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="box warning">
                <div class="box-title">
                    <h4>Categories</h4>
                    <small class="block"> </small>
                    {{$categories->count()}}
                    <i class="fa fa-bar-chart-o"></i>
                </div>
            </div>
        </div>

        <!-- Orders Box -->
        <div class="col-md-3 col-sm-6">
            <div class="box default">
                <div class="box-title">
                    <h4>Total Projects</h4>
                    <small class="block"></small>
                    {{$projects->count()}}
                    <i class="fa fa-folder-open-o"></i>
                </div>
            </div>
        </div>

        <!-- Online Box -->
        <div class="col-md-3 col-sm-6">
            <div class="box success"><!-- default, danger, warning, info, success -->
                <div class="box-title"><!-- add .noborder class if box-body is removed -->
                    <h4>Total Tasks</h4>
                    <small class="block">{{$tasks->count()}}</small>
                    <i class="fa fa-tasks"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div id="panel-2" class="panel panel-default">
                <div class="panel-heading">
                    <span class="title elipsis">
                        <strong>PROJECTS</strong>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content transparent">
                        <div id="ttab1_nobg" class="tab-pane active"><!-- TAB 1 CONTENT -->
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Category</th>
                                        <th>Deadline</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($projects as $project)
                                        <tr>
                                            <td>{{$project->title}}</td>
                                            <td>{{$project->getCategory->name}}</td>
                                            <td>{{$project->end_date}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <a class="size-12" href="{{url('projects')}}">
                                    <i class="fa fa-arrow-right text-muted"></i>
                                    View More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div id="panel-3" class="panel panel-default">
                <div class="panel-heading">
                    <span class="title elipsis">
                        <strong>RECENT ACTIVITIES</strong>
                    </span>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled list-hover slimscroll height-300" data-slimscroll-visible="true">
                        <li>
                            @if($activities->count())
                            @foreach ($activities as $activity)

                                @if($activity->event == 'created')
                                    <p><span class="label label-danger"><i class="fa fa-cogs size-15"></i></span>
                                    {{ $activity->causer->name }} {{$activity->event}} task: {{ $activity->subject->title }}
                                    for: {{$activity->subject->users->name}}

                                @elseif ($activity->subject)
                                    <p><span class="label label-success"><i class="fa fa-user size-15"></i></span>
                                        {{ $activity->causer->name }} {{$activity->event}} {{ $activity->subject->title }} status
                                        to: {{ $activity->subject->status }}  </p>
                                @endif

                            @endforeach
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <a href="{{url('tasks')}}"><i class="fa fa-arrow-right text-muted"></i> View Your Tasks</a>
                </div>
            </div>
        </div>
    </div>
@endsection
