<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\HttpResponse;
//use Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index()
    {
      //$articles = Article::latest('published_at')->where('published_at','<=',Carbon::now())->get();
      $articles = Article::latest('published_at')->published()->get();
      //$articles = Article::latest('published_at')->unpublished()->get();
      return view('articles.index',compact('articles'));
    }

    public function show($id)
    {
      $article = Article::findOrFail($id);
      return view('articles.show',compact('article'));
    }

    public function create()
    {
      return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
      // $input=Request::all();
      // $input['published_at'] = Carbon::now();
      // Article::create($input);
      Article::create($request->all());
      return redirect('articles');
    }

    public function edit($id)
    {
      $article = Article::findOrFail($id);
      return view('articles.edit',compact('article'));
    }

    public function update($id, ArticleRequest $request)
    {
      $article = Article::findOrFail($id);
      $article->update($request->all());
      return redirect('articles');
    }
}
