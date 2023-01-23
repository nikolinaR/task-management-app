@extends('layouts.dashboard')
@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-transparent">
                <strong>ADD NEW USER</strong>
            </div>
            <div class="panel-body">
                <form class="" action="{{url("/users")}}" method="post" data-success="Sent! Thank you!"
                      data-toastr-position="top-right">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="name">Name *</label>
                                    <input type="text" id="name" name="name"
                                           class="@error('name') is-invalid @enderror form-control" required>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="email">Email Address *</label>
                                    <input type="email" id="email" name="email"
                                           class="@error('email') is-invalid @enderror form-control" required>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="password">Password *</label>
                                    <input type="password" id="password" name="password"
                                           class="@error('password') is-invalid @enderror form-control" required>
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="role_id">Select User Role *</label>
                                    <select id="role_id" name="role_id"
                                            class="form-control  @error('role_id') is-invalid @enderror">
                                        <option value="">Select</option>
                                        @foreach($roles as $roleuser)
                                            <option value="{{ $roleuser->id }}">{{ $roleuser->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-3d btn-leaf btn-block margin-top-30">
                                CREATE
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
