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
    public function show($id){
    $article = Article::find($id);
    
    return view ('articles.show',[
        'article'=>$article
    ]);
    }

    public function create(){
        //show a view to create a new resource
    }

    public function store (){
        //it handle and store new resource created

    }

    public function edit (){
        //show a view to edit an existing resource

    }
    public function update(){
        //update recently created resource and store to database
    }
    public function destroy(){
        //it delets the resource from database
    }
}
