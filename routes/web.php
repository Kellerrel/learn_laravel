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


// index
Route::get('/ideas', function () {
    // $ideas = session()->get('ideas', []);
    // $ideas = DB::table('ideas')->get();
    // $ideas = Idea::where('state','pending')->get(); //if spesific, can't use all
    $ideas = Idea::all();

    return view('ideas.index', [
    'ideas'=>$ideas,
    ]);
});

//show action
Route::get('/ideas/{idea}', function (Idea $idea) {


    //$idea = Idea::findOrFail($id); //find or if not found 404 error

    //if(is_null($idea)) {
    //    abort(404);
    //}

    return view('ideas.show', [
    'idea'=>$idea,
    ]);
});

//edit action
Route::get('/ideas/{idea}/edit', function (Idea $idea) {

    return view('ideas.edit', [
    'idea'=>$idea,
    ]);
});

//update action
Route::patch('/ideas/{idea}', function (Idea $idea) {
    $idea->update([
        'description'=> request('description'),
    ]);
    return redirect("/ideas/{$idea->id}");
});

//store action
Route::post('/ideas', function () {
    //$idea = request('idea'); //grab the idea

    Idea::create([
    'description'=>request('idea'),
    'state'=>'pending',
    ]);
    return redirect('/ideas'); //return to home
});

//destroy action
Route::delete('/ideas/{idea}', function (Idea $idea) {
    $idea->delete();

    return redirect('/ideas'); //return to home
});

//// Temporary
//Route::get('/delete-ideas', function () {
//    Idea::truncate();
//    return redirect('/');
//});
