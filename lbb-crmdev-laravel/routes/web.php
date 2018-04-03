<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('data-entry.listing_register');
});

Route::get('dataentry', 'DataEntryController@index');
Route::post('store_data_entry', 'DataEntryController@store');

Route::get('leadselection', 'LeadSelectionController@index');
Route::get('lead_selection_allocation', ['as' => 'leadselectionallocation', 'uses' =>'LeadSelectionAndAllocationController@index']);

// Route::get('lead_selection_allocation', 'LeadSelectionAndAllocationController@index');

Route::get('leadpage', 'LeadPageController@index');

Route::get('sellers', 'SellersController@index');

Route::get('buyersprofile', 'BuyersProfileController@index');

Route::get('buyer', 'BuyerController@index');

Route::get('advisor', 'AdvisorController@index');

Route::get('callcenter', 'CallCenterController@index');

Route::get('caller_approval_center', 'CallerApprovalCenterController@index');

Route::get('formedit', 'FormEditController@index');

Route::get('getstate/{country_id}', ['as' => 'getstate', 'uses' => 'DataEntryController@findState']);
Route::get('getcity/{state_id}', ['as' => 'getcity', 'uses' => 'DataEntryController@findCity']);
Route::get('getsuburb/{city_id}', ['as' => 'getsuburb', 'uses' => 'DataEntryController@findSuburb']);