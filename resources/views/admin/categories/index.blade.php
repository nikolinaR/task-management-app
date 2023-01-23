@extends('layouts.dashboard')
@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-transparent">
                <strong>CATEGORIES</strong>
            </div>
            <div class="panel-body">
                @if($categories)
                    @if(count($categories) === 0)
                        <p>You don't have any categories</p>
                    @endif
                @endif
                <a href="/categories/create" class="btn btn-teal margin-bottom-30">Create Category</a>
                <div class="card-category">
                    <ul>
                        @if($categories)
                            @foreach($categories as $category)
                                <li><a href="categories/{{ $category['id'] }}/edit">{{ $category['name'] }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
