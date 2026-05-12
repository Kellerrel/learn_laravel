<?php

//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Idea;


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
    // $ideas = session()->get('ideas', []);

    // $ideas = DB::table('ideas')->get();

   // $ideas = Idea::where('state','pending')->get(); //if spesific, can't use all
    $ideas = Idea::query()
    ->when(request('state'), function ($query, $state) {
        $query->where('state', $state);
    })
    ->get();

    return view('ideas', [
    'ideas'=>$ideas,
    ]);
});

Route::post('/ideas', function () {
    $idea = request('idea'); //grab the idea

    Idea::create([
    'description'=>request('idea'),
    'state'=>'pending',
    ]);
    return redirect('/'); //return to home
});

// Temporary
Route::get('/delete-ideas', function () {
    session()->forget('ideas');
    return redirect('/');
});
