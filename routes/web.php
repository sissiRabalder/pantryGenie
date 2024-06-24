<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PantryController;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\PantryController::class, 'showExpiresItems'])->name('home');

Auth::routes();


//Route, Controller, Methode
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\PantryController::class, 'showExpiresItems'])->name('home');


Route::get('/pantry/', [App\Http\Controllers\PantryController::class, 'showItems'])->name('items.show');

Route::get('/pantry/createItem', [App\Http\Controllers\PantryController::class, 'createItem'])->name('item.create');
Route::post('/pantry/add', [App\Http\Controllers\PantryController::class, 'addItem'])->name('item.add');

Route::get('/pantry/{id}/edit', [App\Http\Controllers\PantryController::class, 'editItem'])->name('item.edit');
Route::post('/pantry/{id}/update', [App\Http\Controllers\PantryController::class, 'updateItem'])->name('item.update');
Route::delete('/pantry/{id}/delete', [App\Http\Controllers\PantryController::class, 'deleteItem'])->name('item.delete');

Route::get('/pantry/createItem/scan', [App\Http\Controllers\PantryController::class, 'scanItem'])->name('item.scan');


Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('profile.update');



Route::post('/scan-code', [App\Http\Controllers\PantryController::class, 'scanCode'])->name('scanCode');
Route::get('/show-results', [App\Http\Controllers\PantryController::class, 'showResults'])->name('showResults');

