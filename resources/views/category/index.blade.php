@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div><a href="cat/create">Add + </a></div>
                @if(count($categories) > 0)
                <ul>
                    @foreach ($categories as $cat)
                        @include('category.partials', $cat)
                    @endforeach
                </ul>
                @else

                @endif
            </div>
        </div>
    </div>
@endsection