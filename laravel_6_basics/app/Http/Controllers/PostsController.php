<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostsController extends Controller
{
    public function show($slug)
    {
    	// Fetch data from the database
    	$post = DB::table('posts')->where('slug', $slug)->first();
    	// $posts = [
    	// 	'my-first-post' => 'Hello, this my first blog post',
    	// 	'my-second-post' => 'Now I am getting the hang of this blogging thing.'
    	// ];

    	// if(!array_key_exists($post, $posts)) {
    	// 	abort(404, 'Sorry, that post was not found.');
    	// }

    	// return view('posts', [
    	// 	'post' => $posts[$post] ?? 'Nothing here yet.'
    	// ]);
    	
    	return view('posts', [
    		'post' => $post
    	]);
    	
    }
}
