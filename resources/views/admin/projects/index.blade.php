@extends('layouts.dashboard')
@section('content')

    @can('create', $project)
        <a href="/projects/create" class="btn btn-teal margin-bottom-30">Create new project</a>
    @endcan
    <div id="panel-2" class="panel panel-default">
        <div class="panel-heading">
            <span class="title elipsis"><strong>HOVER TABLE</strong></span>
            <!-- right options -->
            <ul class="options pull-right list-inline">
                <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse"
                       data-placement="bottom"></a></li>
                <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen"
                       data-placement="bottom"><i class="fa fa-expand"></i></a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover table-vertical-middle nomargin">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>Due Date</th>
                        <th>Created By</th>
                        <th>Category</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{$project->title}}</td>
                            <td>{{$project->status}}</td>
                            <td>{{$project->start_date}}</td>
                            <td>{{$project->end_date}}</td>
                            <td>{{$project->getUser->name}}</td>
                            <td>{{$project->getCategory->name}}</td>
                            @can('update', $project)
                                <td>
                                    <form action="{{ url('projects', [$project->id, 'edit']) }}">
                                        <button class="btn btn-sm btn-yellow">
                                            <i class="fa fa-edit"></i><span>Edit</span>
                                        </button>
                                    </form>
                                </td>
                            @endcan
                            @can('delete', $project)
                                <td>
                                    <form action="{{ url('projects', [$project->id]) }}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-3d btn-sm btn-red">
                                            <i class="fa fa-trash"></i><span>Delete</span>
                                        </button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if ($projects->links()->paginator->hasPages())
                    <div class="d-flex justify-content-center">
                        {!! $projects->links() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
