<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/', function () {
    return view('welcome', [
        'tasks' => [
            'Go to the market',
            'Walk the dog',
            'Watch a video tutorial',
        ],
    ]);

});

Route::get('/', function () {
    $ideas = session()->get('ideas', []);
    return view('ideas', [
    'ideas'=>$ideas,
    ]);
});

Route::post('/ideas', function () {
    $idea = request('idea'); //grab the idea
    session()->push('ideas', $idea);
    return redirect('/'); //return to home
});

// Temporary
Route::get('/delete-ideas', function () {
    session()->forget('ideas');
    return redirect('/');
});
