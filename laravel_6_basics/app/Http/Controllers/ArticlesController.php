<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

	public function index()
	{
		// Render a list of a resource.
	
		$articles = Article::latest()->get();

		return view('articles.index', ['articles' => $articles]);
	}
    
    public function show($id)
    {
    	// Show a single resource.
    
    	$article = Article::find($id);
    	return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
    	// Shows a view to create a new resource
        return view('articles.create'); 

    } 

    public function store()
    {
    	// Persist the new resource

        // Store the new articles on the database
         
        // Straight and super simple way
        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');

    }

    public function edit($id)
    {
    	// Show a view to edit an existing resource
        $article = Article::find($id);

        // find the article associated with the id 
        return view('articles.edit', compact('article')); 

    }

    public function update($id)
    {
    	// Persist the edited resource
        
        $article = Article::find($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body'); 
        $article->save();

        return redirect('/articles/'.$article->id);

    }

    public function destroy($id) 
    {
    	// Delete the resource

    }

}