@extends('layout')
@section('booma-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
@endsection

@section('content')
<div class="wrapper">
<div id="page" class="container">
    <h1 class="heading has-text-weight-bold is-size-4">Update Article</h1>

    <form action="/articles/{{$article->id}}" method="POST">
    @csrf
    @method('PUT')
        <div class="field">
            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" class="input" id="title" name="title" value="{{$article->title}}">
            </div>
        </div>
    <div class="field">
        <label for="excerpt" class="label">Excerpt</label>
    </div>
    <div class="control">
        <textarea class="textarea" name="excerpt" id="excerpt">{{$article->excerpt}}</textarea>
    </div>
        
    <div class="field">
        <label for="body" class="label">Body Text</label>
    </div>
    <div class="control">
        <textarea class="textarea" name="body" id="body" >{{$article->body}}</textarea>
    </div>

<div class="field is-grouped">
    <div class="control">
        <button class="button is-link" type="submit">Update</button>
    </div>
</div>

    </form>


</div>
</div>
@endsection