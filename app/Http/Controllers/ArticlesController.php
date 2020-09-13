<?php

namespace App\Http\Controllers;
use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ArticlesController extends Controller
{
    //render list of resource
    public function index(){

        if(request('tag')){
            $articles = Tag::where('name', request('tag'))->firstOrFail()->article;
        }
        else{
            $articles= Article::latest()->get();
        }

        return view ('articles.index',['articles' => $articles]);
    }
    //show a single resource
    public function show(Article $article){
    // $article = Article::findOrFail($id);

    // return $article;
    
    return view ('articles.show',[
        'article'=>$article
    ]);
    }

    public function create(){
    
        return view ('articles.create', [
            'tags'=>Tag::all()
        ]);
    }

    public function store (Article $article){
    //it handle and store new resource created
         $article = new Article($this->validateArticle());
         $article->user_id=1;
         $article->save();

         $article->tags()->attach(request('tags'));

        
    //    $article = new Article();
    //    $article->title = request('title');
    //    $article->excerpt = request('excerpt');
    //    $article->body= request('body');
    //    $article->save();

       return redirect(route('articles.index'));
    }

    public function edit (Article $article){
        
        return view ('articles.edit', compact('article'));

    }
    public function update(Article $article){
        $article->update($this->validateArticle());
        
        return redirect($article->path());
    }
    public function destroy(){
        //it delets the resource from database
    }


    protected function validateArticle(){
        return request()->validate([
        'title'=>['required', 'min:2', 'max:255'],
            'excerpt' => 'required',
            'body' =>'required',
            'tags' => 'exists:tags,id',
    ]);
}
}
