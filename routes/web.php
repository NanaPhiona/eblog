<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('about_us', [MainController::class, 'about_us'])->name('about');
Route::get('contact_us', [MainController::class, 'contact_us'])->name('contact');
Route::get('model_saving', [MainController::class, 'model_saving'])->name('model-saving');
Route::get('model_querying', [MainController::class, 'model_querying'])->name('model-querying');


/*Route::get('about-us', function () {
    return "I am learning Laravel" . route('contact');
});

Route::get('contact-us', function () {
    return "I am learning Laravel";
})->name('contact');

Route::get('news_room/{id}', function($id){
    return "This our news today =>" .$id;
})->name("news");*/

