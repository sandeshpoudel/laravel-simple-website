@extends('layout')
@section ('content')
<div id ="wrapper">
    <div id ="page" class="container">
<ul class="style1">
                @forelse ($articles as $article)
				<li class="first">
					<h3>
                        {{$article->title}}
                    </h3>
<p>
    <img src="images/banner.jpg" alt="" class="image image-full"/>
</p>
					<p>
                        <a href="{{$article->path()}}">{{$article->excerpt}}.</a>
                    </p>
                </li>
                
				
            </ul>
            @empty
                <p>No relevant artiles to display.</p>
                @endforelse
</div>
</div>
@endsection