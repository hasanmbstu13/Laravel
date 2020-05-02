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