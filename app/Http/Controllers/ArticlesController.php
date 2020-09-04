<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //render list of resource
    public function index(){
        $articles= Article::latest()->get();
        return view ('articles.index',[
        'articles' => $articles
    ]
    );
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
        return view ('articles.create');
    }

    public function store (Article $article){
        //it handle and store new resource created
        request()->validate([
            'title'=>['required', 'min:2', 'max:255'],
            'excerpt' => 'required',
            'body' =>'required'
        ]);

       $article = new Article();
       $article->title = request('title');
       $article->excerpt = request('excerpt');
       $article->body= request('body');
       $article->save();

       return redirect('/articles');
    }

    public function edit (Article $article){
        
        return view ('articles.edit', compact('article'));

    }
    public function update(Article $article){
        request()->validate([
            'title'=>['required', 'min:2', 'max:255'],
            'excerpt' => 'required',
            'body' =>'required'
        ]);
        
        
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();
        return redirect('/articles/'.$article->id);
    }
    public function destroy(){
        //it delets the resource from database
    }
}
