@extends('layouts.dashboard')
@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-transparent">
                <strong>EDIT PROJECT</strong>
            </div>
            <div class="panel-body">
                {{--                <form class="validate" >--}}
                <form class="validate" action="{{ url('/projects', [$project->id]) }}" method="post"
                      data-success="Sent! Thank you!" data-toastr-position="top-right">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <fieldset>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="title">Title *</label>
                                    <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}"
                                           class="@error('title') is-invalid @enderror form-control" required>
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- description -->
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <div class="fancy-form">
                                        <textarea name="description" rows="4"
                                                  class="@error('description') is-invalid @enderror form-control word-count"
                                                  data-maxlength="200" data-info="textarea-words-info"
                                                  placeholder="Project Description.."> {{ old('description', $project->description) }} </textarea>
                                        <i class="fa fa-comments"></i>
                                        <span class="fancy-hint size-11 text-muted">200 words allowed!</span>
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
                                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $project->start_date) }}"
                                           class="@error('start_date') is-invalid @enderror form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" required>
                                    @error('start_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="end_date">End Date *</label>
                                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $project->end_date) }}"
                                           class="@error('end_date') is-invalid @enderror form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" required>
                                    @error('end_date')
                                                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="user_id">Created by *</label>
                                    <input disabled type="text" name="user_id" id="user_id"
                                           value="{{ old('user_id', $project->getUser->name) }}"
                                           class="@error('user_id') is-invalid @enderror form-control" required>
                                    @error('user_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id']}}"
                                                    @if($category->id == $project->category_id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="status">status</label>
                                    <select name="status" id="status" class="form-control  @error('status') is-invalid @enderror" required>
                                        @foreach($enums as $status)
                                            <option value="{{ $status }}" selected>{{ $status }}</option>
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
                            <button type="submit" class="btn btn-3d btn-amber btn-block margin-top-30">
                                EDIT
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
