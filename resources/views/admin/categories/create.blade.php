@extends('layouts.dashboard')
@section('content')

    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-transparent">
                <strong>ADD CATEGORY</strong>
            </div>
            <div class="panel-body">
                <form class="" action="{{url("/categories")}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label for="name"> Category name </label>
                                    <input type="text" name="name" value="{{ old('name') }}"
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
                                    <label>Main Category</label>
                                    <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
                                        <option value="">Select</option>
                                        @if($categories)
                                            @foreach($categories as $category)
                                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        @endif
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
                                CREATE
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
