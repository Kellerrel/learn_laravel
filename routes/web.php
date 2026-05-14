<?php

//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Request;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;
use App\Models\Idea;


Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/', function () {
    return view('welcome');

});

Route::get('/ideas', [IdeaController::class, 'index']);
Route::get('/ideas/create', [IdeaController::class,'create']);
Route::post('/ideas', [IdeaController::class,'store']);
Route::get('/ideas/{idea}', [IdeaController::class,'show']);
Route::get('/ideas/{idea}/edit',[IdeaController::class,'edit']);
Route::patch('/ideas/{idea}',[IdeaController::class,'update']);
Route::delete('/ideas/{idea}',[IdeaController::class,'delete']);


