<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('about_us', [MainController::class, 'about_us'])->name('about');
Route::post('register', [MainController::class, 'register'])->name('register');
Route::get('dashboard', function(){die('Dashboard');})->name('dashboard');

Route::get('login', function(){
    if(Auth::check()){
        return redirect()->intended('dashboard');
    }
    return view('login');
})->name('login');


Route::post('login', [MainController::class, 'login'])->name('login');

Route::get('logout', function(){
    AUth::logout();
    return redirect()->intended('/');
    die('Logout');
})->name('logout');


Route::get('contact_us', [MainController::class, 'contact_us'])->name('contact');
Route::get('model_saving', [MainController::class, 'model_saving'])->name('model-saving');
Route::get('model_querying', [MainController::class, 'model_querying'])->name('model-querying');
Route::get('model_relationship', [MainController::class, 'model_relationship'])->name('model-relation');

/*Route::get('about-us', function () {
    return "I am learning Laravel" . route('contact');
});

Route::get('contact-us', function () {
    return "I am learning Laravel";
})->name('contact');

Route::get('news_room/{id}', function($id){
    return "This our news today =>" .$id;
})->name("news");*/

