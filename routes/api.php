<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api.auth')->group(function () {

    Route::get('getCustomerById/{id}', 'App\Http\Controllers\CustomerController@getCustomerById');
    Route::get('getFollowers/{id}', 'App\Http\Controllers\CustomerController@getFollowers');
    Route::get('getSettings/{id}', 'App\Http\Controllers\CustomerController@getSettings');
    Route::get('getWishlists/{id}', 'App\Http\Controllers\CustomerController@getWishlists');
    Route::post('customer/requestOtp', 'App\Http\Controllers\CustomerController@requestOtp');
    Route::post('customer/verifyOtp', 'App\Http\Controllers\CustomerController@verifyOtp');
    Route::post('contactCustomer', 'App\Http\Controllers\CustomerController@contactCustomer');
    Route::post('followCustomer', 'App\Http\Controllers\CustomerController@followCustomer');
    Route::post('referAFriend', 'App\Http\Controllers\CustomerController@referAFriend');
    Route::post('submitRating', 'App\Http\Controllers\CustomerController@submitRating');
    Route::post('updateCustomer', 'App\Http\Controllers\CustomerController@updateCustomer');

    Route::get('getCategories', 'App\Http\Controllers\PetCategoriesController@getCategories');
    Route::get('getCategories/{id}', 'App\Http\Controllers\PetCategoriesController@getCategories');

    Route::get('getAllBreeds', 'App\Http\Controllers\BreedsController@getAllBreeds');
    Route::get('getBreedById', 'App\Http\Controllers\BreedsController@getBreedById');
    Route::get('getBreedsByCategoryId', 'App\Http\Controllers\BreedsController@getBreedsByCategoryId');

    Route::get('getPosts', 'App\Http\Controllers\PostsController@getPosts');
    Route::get('getPostById', 'App\Http\Controllers\PostsController@getPostById');
    Route::get('getNewlyAddedPosts', 'App\Http\Controllers\PostsController@getNewlyAddedPosts');
    Route::get('getRelatedPosts', 'App\Http\Controllers\PostsController@getRelatedPosts');
    Route::post('addNewPost', 'App\Http\Controllers\PostsController@addNewPost');
    Route::post('postsByCustomerId', 'App\Http\Controllers\PostsController@postsByCustomerId');

    Route::get('getCountries', 'App\Http\CountryController@index');
    Route::get('getStates', 'App\Http\Controllers\StateController@index');
    Route::get('getStates/{country}', 'App\Http\Controllers\StateController@index');
    Route::get('getDistricts', 'App\Http\Controllers\DistrictController@index');
    Route::get('getDistricts/{country}/{state}', 'App\Http\Controllers\DistrictController@index');

    Route::post('pages', 'App\Http\Controllers\PagesController@index');

    Route::get('settings', 'App\Http\Controllers\Admin\SettingsController@fetchSettings');
});
