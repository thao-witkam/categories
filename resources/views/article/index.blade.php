@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8">
            <div><a href="article/create">ADD NEW +</a></div>
            @if(count($articles) > 0)
                <ul>
                    @foreach($articles as $article)

                        <li>
                            {{Form::open(['method' => 'DELETE', 'route'=>['article.destroy', $article->id]])}}
                            {{Form::hidden('id', $article->id)}}
                            {{Form::submit('Delete', ['class'=>'btn small'])}}
                            <em>{{$article->category->name}}</em> -

                            {{$article->title}}
                            {{Form::close()}}
                        </li>

                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection