<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogCategory;
use App\BlogHasCategory;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $cats = $request->input('cats') ? $request->input('cats') : [];               
        $categories = BlogCategory::all();
        // if category filter selected or not
        if(count($cats)){
            $blogs = Blog::orderBy('published_at', 'desc')
            ->with('categories')
            ->whereHas("categories", function($q) use($cats){
                $q->whereIn('blog_category_id', $cats);         
            })       
            ->paginate(6);
        }else{
            $blogs = Blog::orderBy('published_at', 'desc')
            ->with('categories')                   
            ->paginate(6);
        }  
        $response = [
            'blogs' => $blogs,
            'categories' => $categories,
        ]; 
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the blog one 
     * @return description
     */
    public function blog_one(){
        return view('blogs.blog_one');
    }

    /**
     * Display the blog two 
     * @return description
     */
    public function blog_two(){
        return view('blogs.blog_two');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
