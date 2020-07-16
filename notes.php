<?php

// Laravel 6 basics notes

// To get the help list from artisan write
# php artisan 

// All configuration setting goes to .env file

// Mac Mysql admin tools
# --TablePlus --Sequel Pro --Querious

// Model 
// Useful for 
		# Fetching data using sql queries
		# Business logic

// Migrations
	# php artisan make:migration create_posts_table

// Add new column to the table
// We can do that in two ways
   #-- Create new migration
   		# Following is the recommended way when we are in development mode
		# -- php artisan make:migration add_title_to_posts_table 
		# Delete all previous database table - it will loss all previous data
		# -- php artisan migrate:rollback
		# Then migrate all the migration again
		# -- php artisan migrate
		# Dropped all tables and create new tables
		# -- php artisan migrate:fresh
	#-- create migration and controller when creating a model
	#	php artisan make:model Project -mc

// Tinker to interact with the database
	# php artisan tinker

// NPM Commands
	# -- Installing npm
	# npm install
	# npm run dev -- for development
	# npm run watch -- to look over any new chnages and compile it

// Installing laravel ui
	# composer require laravel/ui --dev

// To get help use following command
	# php artisan help ui

// ui command
	//-- To scaffold authentication with vue
	# php artisan ui vue --auth

// Password reset steps
	# 1. Click "Forgot Password"
	# 2. Fill out a form with their email address.
	# 3. Prepare a unique token and associate it with user's account
	# 4. Send an email with a unique link back to our site that confirms email ownership
	# 5. Link back to website, confirm the token, and set a new password.
	
// Collections
// All articles
// 	 App\Article::all();
// First article
// 	App\Article::first();
// Tags relationship
//  $tags = App\Article::first()->tags;
// First Tag
// 	$tags->first()
// Last Tag
// 	$tags->last()
// Where condition
// 	$tags->where('name', 'laravel');
// Same thing as like
// 	App\Tag::where('name', 'Laravel')->first()
// Return tag which length is greater than 5
// 	 $tags->first(function ($tag) { return strlen($tag->name) > 5; });
// Return tag which length is less than 5
// 	 $tags->first(function ($tag) { return strlen($tag->name) < 5; });
// Create collection from scratch
// 	collect(['one', 'two', 'three'])
// Get first collection item
// 	collect(['one', 'two', 'three'])->first()
// Flatten - flattens a multi-dimensional collection into a single dimension
// 	collect(['one', 'two', 'three', ['four', 'five'], 'six'])->flatten()
// Filter on collection
// 	$items->filter(function ($item) { return $item >= 5; })
// Return even elements
// 	 $items->filter(function ($item) { return $item % 2 === 0; })
// Array map on collection filter function 
// 	$items->filter(function ($item) { return $item % 2 === 0; })->map(function ($item) { return $item * 3; })
// Last item from the collection
// 	$items->filter(function ($item) { return $item % 2 === 0; })->map(function ($item) { return $item * 3; })->last()


// Eager loading
// 	$articles = App\Article::with('tags')->get()
