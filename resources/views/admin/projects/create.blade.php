@extends('layouts.dashboard')
@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-transparent">
                <strong>ADD NEW PROJECT</strong>
            </div>
            <div class="panel-body">
                <form class="" action="{{url("/projects")}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right">
                    {{csrf_field()}}
                    <fieldset>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="title">Title *</label>
                                    <input type="text" id="title" name="title" class="@error('title') is-invalid @enderror form-control" required>
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
                                    <input type="date" id="start_date" name="start_date" class="@error('start_date') is-invalid @enderror form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" required>
                                    @error('start_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="end_date">End Date *</label>
                                    <input type="date" id="end_date" name="end_date" class="@error('end_date') is-invalid @enderror form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" required>
                                    @error('end_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="user_id">Created by</label>
                                    <input disabled type="text"  id="user_id" placeholder="{{ Auth::user()->name }}"
                                           class="@error('user_id') is-invalid @enderror form-control" required>
                                    <input type="hidden" value="{{ Auth::user()->id}}" name="user_id">
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
                                    <select id="category_id"  name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        @if($categories)
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        @endif
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
                                    <select id="status"  name="status" class="form-control  @error('status') is-invalid @enderror">
                                        @foreach($enums as $status)
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
