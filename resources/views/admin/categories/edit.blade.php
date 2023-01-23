@extends('layouts.dashboard')
@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-transparent">
                <strong>EDIT CATEGORY</strong>
            </div>
            <div class="panel-body">
                <form class="validate" action="{{ url('/categories', [$category->id]) }}" method="post"
                      data-success="Sent! Thank you!" data-toastr-position="top-right">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <fieldset>
                        <input type="hidden" name="action" value="contact_send"/>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="name"> Category name </label>
                                    <input type="text" id="name" name="name" value="{{ $category->name }}"
                                           class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="parent_id">Main Category</label>
                                    <select name="parent_id" id="parent_id"
                                            class="form-control @error('parent_id') is-invalid @enderror">
                                        <option value="null">Select</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat['id'] }}" @if($category->parent_id === $cat['id']) selected @endif>{{ $cat['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('parent_id') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-3d btn-leaf btn-block margin-top-30">
                                UPDATE CATEGORY
                            </button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('/admin/categories', [$category->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-red">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
