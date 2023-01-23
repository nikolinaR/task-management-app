@extends('layouts.dashboard')
@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-transparent">
                <strong>EDIT USER </strong>
            </div>
            <div class="panel-body">
                <form class="" action="{{ url('/users', [$users->id]) }}"  method="post" data-success="Sent! Thank you!" data-toastr-position="top-right">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <fieldset>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{old('name', $users->name)}}"
                                           class="@error('name') is-invalid @enderror form-control required">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{old('email', $users->email)}}"
                                           class="@error('email') is-invalid @enderror form-control required">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" value="{{old('password', $users->password)}}"
                                           class="@error('password') is-invalid @enderror form-control required">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="role_id">role_id</label>
                                    <select name="role_id" id="role_id" class="form-control  @error('role_id') is-invalid @enderror">
                                        @foreach($roles as $roleuser)
                                            <option value="{{ $roleuser->id }}">{{ $roleuser->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-3d btn-amber  btn-block margin-top-30">
                                CREATE
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
