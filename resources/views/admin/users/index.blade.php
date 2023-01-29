@extends('layouts.dashboard')
@section('content')
    <a href="/users/create" class="btn btn-teal margin-bottom-30">Create new user</a>

    <div id="panel-2" class="panel panel-default">
        <div class="panel-heading">
            <span class="title elipsis"><strong>USERS TABLE</strong></span>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <form action="{{ url('users', [$user->id, 'edit']) }}">
                                    <button class="btn btn-sm btn-yellow">
                                        <i class="fa fa-edit"></i><span>Edit</span>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ url('users', [$user->id]) }}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-3d btn-sm btn-red">
                                        <i class="fa fa-trash"></i><span>Delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
