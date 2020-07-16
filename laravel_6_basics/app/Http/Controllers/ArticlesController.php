<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

	public function index()
	{
		// Render a list of a resource.
        if(request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
          $articles = Article::latest()->get();  
        }

		return view('articles.index', ['articles' => $articles]);
	}
    
    // public function show($id)
    // {
    // 	// Show a single resource.
    
    // 	$article = Article::findOrFail($id);
    // 	return view('articles.show', ['article' => $article]);
    // }

    // Another approach
    // $article should be match with route wildcards
    public function show(Article $article)
    {
        // Show a single resource.
        return view('articles.show', ['article' => $article]);
    }


    public function create()
    {
    	// Shows a view to create a new resource
        return view('articles.create', [
            'tags' => Tag::all()
        ]); 

    } 

    public function store()
    {
    	// Persist the new resource

        // Store the new articles on the database
        
        // Validation
        // Article::create(request()->validate([
        //     // 'title' => ['required', 'min3', 'max:255'],
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]));
        
        Article::create($this->validateArticle());

       // return $validatedAttributes;
         
        // // Straight and super simple way
        // $article = new Article();

        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');

        // $article->save();
        
        // Article::create([
        //     'title' => request('title'),
        //     'excerpt' => request('excerpt'),
        //     'body' => request('body')
        // ]);

        // return redirect('/articles');
        return redirect(route('articles.index'));

    }

    // public function edit($id)
    // {
    // 	// Show a view to edit an existing resource
    //     $article = Article::find($id);

    //     // find the article associated with the id 
    //     return view('articles.edit', compact('article')); 

    // }

    public function edit(Article $article)
    {

        // find the article associated with the id 
        return view('articles.edit', compact('article')); 

    }

    public function update(Article $article)
    {
    	// Persist the edited resource
        
        // Validation
        // $article->update(request()->validate([
        //     // 'title' => ['required', 'min3', 'max:255'],
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ])); 
        
        $article->update($this->validateArticle());
        
        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body'); 
        // $article->save();

        // return redirect('/articles/'.$article->id);
        return redirect(route('articles.show', $article));

    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }

    public function destroy($id) 
    {
    	// Delete the resource

    }

}
