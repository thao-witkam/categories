{!! Form::open(['method'=>'DELETE', 'route'=>['cat.destroy', $cat->id]]) !!}
{{ Form::hidden('id', $cat->id) }}
<li>{{ Form::submit('Delete', ['class'=> 'btn small']) }} {{$cat->name}}</li>
@php ($categories =  \App\Category::all()->where('parentId', '=', $cat->id))
@if (count($categories) > 0)
    <ul>
        @foreach ($categories as $cat)
            @include('category.partials', $cat)
        @endforeach
    </ul>
@endif
{{ Form::close() }}