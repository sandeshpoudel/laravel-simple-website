@extends('layout')
@section('booma-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
@endsection

@section('content')
<div class="wrapper">
<div id="page" class="container">
    <h1 class="heading has-text-weight-bold is-size-4">Create a New Article</h1>

    <form action="/articles" method="POST">
    @csrf
        <div class="field">
            <label class="label" for="title">Title</label>

            <div class="control">
                <input 
                type="text" 
                class="input @error('title') is-danger @enderror" 
                id="title" 
                name="title"
                value="{{old('title')}}"
                >
                
                @error('title')
                <p class="help is-danger">{{$errors->first('title')}}</p>
                @enderror
            </div>
        </div>
    <div class="field">
        <label for="excerpt" class="label">Excerpt</label>
    </div>
    <div class="control">
        <textarea class="textarea @error('excerpt') is-danger @enderror" name="excerpt" id="excerpt" >{{old('excerpt')}}</textarea>
        @error('excerpt')

        <p class="help is-danger" >{{$errors->first('excerpt')}}</p>
        @enderror
    </div>
        
    <div class="field">
        <label for="body" class="label">Body Text</label>
    </div>
    <div class="control">
        <textarea class="textarea @error('body') is-danger @enderror" name="body" id="body" >{{old('body')}}</textarea>
        @error('body')
        <p class="help is-danger">{{$errors->first('body')}}</p>
        @enderror
    </div>

    <div class="field">
        <label for="tags" class="label">Tags</label>
    
    <div class="control">
        <select
        name="tags[]"
        multiple
        >
        @foreach ($tags as $tag)
        <option value="{{$tag->id}}"> {{$tag->name}}</option>
    @endforeach
        </select>

        @error('tags')
        <p class="help is-danger">{{$errors->first('tags')}}</p>
        @enderror
        </div>
    </div>

<div class="field is-grouped">
    <div class="control">
        <button class="button is-link" type="submit">Submit</button>
    </div>
</div>

    </form>


</div>
</div>
@endsection