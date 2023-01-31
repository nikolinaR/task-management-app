@extends('layouts.dashboard')
@section('content')

    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-transparent">
                <strong>ADD NEW TASK</strong>
            </div>
            <div class="panel-body">
                <form class="" action="{{route('tasks.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right">
                    {{csrf_field()}}
                    <fieldset>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="title">Title *</label>
                                    <input type="text" id="title" name="title" required
                                           class="@error('title') is-invalid @enderror form-control" >
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="project_id">Belongs To Project *</label>
                                    <select id="project_id" name="project_id" required
                                            class="form-control  @error('project_id') is-invalid @enderror">
                                        <option value="">Select project</option>
                                        @foreach($project as $project_id)
                                            <option value="{{ $project_id['id'] }}">{{ $project_id['title'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('project_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <div class="">
                                        <label for="user_id">Assign to *</label>
                                        <select id="user_id" name="user_id"
                                                class="form-control selectpicker @error('user_id') is-invalid @enderror">
                                            <option value="">select</option>
                                        @foreach($users as $user)
                                                <option value="{{ $user['id'] }}"> {{ $user['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label>Description *</label>
                                    <div class="fancy-form">
                                        <textarea name="description" rows="5" class="@error('description') is-invalid @enderror form-control word-count" data-maxlength="200" data-info="textarea-words-info" placeholder="Fancy Textarea..." required></textarea>
                                        <i class="fa fa-comments"></i>
                                        <span class="fancy-hint size-11 text-muted">200 words allowed!</span>
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label for="start_date">Start Date *</label>
                                    <input type="date" name="start_date" id="start_date"
                                           class="@error('start_date') is-invalid @enderror form-control datepicker required"
                                           data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" required>
                                    @error('start_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="due_date">Due Date *</label>
                                    <input type="date" name="due_date" id="due_date"
                                           class="@error('due_date') is-invalid @enderror form-control datepicker required"
                                           data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" required>
                                    @error('due_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="status">Task Status *</label>
                                    <select  name="status" id="status" class="form-control  @error('status') is-invalid @enderror" required>
                                        <option>Select</option>
                                        @foreach($taskenum as $status)
                                            <option value="{{ $status }}">{{ $status }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-3d btn-leaf  btn-block margin-top-30">
                                CREATE
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
