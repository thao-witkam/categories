@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header">Article</h3>
                <div class="form-control">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Please fix the following errors
                        </div>
                    @endif

                    {!! Form::open(['url'=>'article', 'method' => 'post']) !!}
                        @php($categories = \App\Category::all()->sortBy('parentId')->pluck('name', 'id'))
                        <div class="form-group">
                            {!! Form::label('Category') !!}<br/>
                            {!! Form::select('categoryId', $categories) !!}
                            @if($errors->has('categoryId'))
                                <span class="alert-danger">{{$errors->first('categoryId')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Tittle') !!}<br/>
                            {!! Form::text('title') !!}
                            @if($errors->has('title'))
                                <span class="alert-danger">{{$errors->first('title')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('content') !!}<br/>
                            {!! Form::textarea('content') !!}
                            @if($errors->has('content'))
                                <span class="alert-danger">{{$errors->first('content')}}</span>
                            @endif
                        </div>

                        <div class="form-group">{{ Form::submit('Save') }}</div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection