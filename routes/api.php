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
Route::group(['prefix' => '/api'], function(){
  if(config('openai.use_sanctum') == true){
    Route::middleware(['web','auth:sanctum'])->post(config('openai.api_url'),'Mastashake\LaravelOpenaiApi\Http\Controllers\PromptController@generateResult');
  } else {
    Route::post(config('openai.api_url'),'Mastashake\LaravelOpenaiApi\Http\Controllers\PromptController@generateResult');
  }
});
