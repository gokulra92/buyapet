<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('pet-category', 'PetCategoryCrudController');
    Route::crud('breed', 'BreedCrudController');
    Route::crud('customer', 'CustomerCrudController');
    Route::crud('country', 'CountryCrudController');
    Route::crud('state', 'StateCrudController');
    Route::crud('district', 'DistrictCrudController');
    Route::crud('pet-shop', 'PetShopCrudController');
    Route::crud('post', 'PostCrudController');
    Route::crud('referred-profile', 'ReferredProfileCrudController');
    Route::crud('customer-rating', 'CustomerRatingCrudController');
    Route::crud('feedback', 'FeedbackCrudController');
    Route::crud('page', 'PageCrudController');
    Route::crud('user', 'UserCrudController');
    Route::get('setting', [SettingController::class, 'index'])->name('admin.setting.index');
    Route::post('setting', [SettingController::class, 'update'])->name('admin.setting.update');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
