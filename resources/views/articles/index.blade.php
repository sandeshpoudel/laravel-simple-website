@extends('layout')
@section ('content')
<div id ="wrapper">
    <div id ="page" class="container">
<ul class="style1">
                @foreach ($articles as $article)
				<li class="first">
					<h3>
                        {{$article->title}}
                    </h3>
<p>
    <img src="images/banner.jpg" alt="" class="image image-full"/>
</p>
					<p>
                        <a href="/articles/{{$article->id}}">{{$article->excerpt}}.</a>
                    </p>
                </li>
                @endforeach
				
            </ul>
</div>
</div>
@endsection