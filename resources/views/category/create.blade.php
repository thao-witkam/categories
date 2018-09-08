@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">Category</h3>
                    <div class="form-control">
                        <div class="text-right">Welcome <?=$name?></div>

                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                Please fix the following errors
                            </div>
                        @endif

                        {!! Form::open(['url' => 'cat', 'method'=>'post'])  !!}
                        @php ($catParents = \App\Category::select(['id', 'name'])->pluck('name', 'id'))
                        <div class="form-group">
                            {!! Form::label('Parent: ') !!} <br/>
                            {{ Form::select('parentId', $catParents, null, ['placeholder'=>'None'])}}
                            @if($errors->has('parentId'))
                                <span class="alert-danger">{{ $errors->first('parentId') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Category name: ') !!} <br/>
                            {{ Form::text('name', null, ['required' => 'required'] )}}
                            @if($errors->has('name'))
                                <span class="alert-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {{ Form::label('description: ') }}<br/>
                            {{ Form::textarea('description') }}
                            @if($errors->has('description'))
                                <span class="alert-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="form-group">{{ Form::submit('Save') }}</div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection