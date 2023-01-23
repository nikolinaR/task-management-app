@extends('layouts.dashboard')
@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-transparent">
                <strong>EDIT TASK </strong>
            </div>
            <div class="panel-body">
                <form class="" action="{{ url('/tasks', [$tasks->id]) }}"  method="post" data-success="Sent! Thank you!" data-toastr-position="top-right">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <fieldset>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="title">Title *</label>
                                    <input type="text" id="title" name="title" value="{{old('title', $tasks->title)}}"
                                           class="@error('title') is-invalid @enderror form-control required">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label id="project_id">Belongs To Project *</label>
                                    <select name="project_id" id="project_id" class="form-control  @error('project_id') is-invalid @enderror" required>
                                        <option value="">Select project</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id}}" {{$project->id == $tasks->project_id ? 'selected' : ''}} >{{ $project['title'] }}</option>
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
                                        <label for="task_id">Assign to *</label>
                                        <select id="task_id" name="task_id[]" multiple class="form-control selectpicker @error('task_id') is-invalid @enderror">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" @if($user->id == $tasks->task_id)  selected @endif>
                                                    {{ $tasks->task_id }}</option>
                                            @endforeach
                                        </select>
                                        @error('task_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="description">Description *</label>
                                    <div class="fancy-form">
                                        <textarea name="description" id="description" rows="5"
                                                  class="@error('description') is-invalid @enderror form-control word-count"
                                                  data-maxlength="200" data-info="textarea-words-info"
                                                  placeholder="Fancy Textarea...">{{ old('description', $tasks->description) }}</textarea>
                                        <i class="fa fa-comments"></i>
                                        <span class="fancy-hint size-11 text-muted"> 200 words allowed! </span>
                                        @error('description')
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
                                           value="{{ old('start_date', $tasks->start_date) }}"
                                           class="@error('start_date') is-invalid @enderror form-control datepicker"
                                           data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" required>
                                    @error('start_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="due_date">Due Date *</label>
                                    <input type="date" name="due_date" id="due_date"
                                           value="{{ old('due_date', $tasks->due_date) }}"
                                           class="@error('due_date') is-invalid @enderror form-control datepicker"
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
                                    <label for="status">Update Task Status</label>
                                    <select name="status" id="status" class="form-control  @error('status') is-invalid @enderror">
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
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="user_id">Created by</label>
                                    <input  disabled type="text" id="user_id" placeholder="{{ Auth::user()->name }}"
                                            class="@error('user_id') is-invalid @enderror form-control ">
                                    <input type="hidden" value="{{ Auth::user()->id}}" name="user_id">
                                    @error('user_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-3d btn-amber  btn-block margin-top-30">
                                EDIT
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
























@endsection
