<?php

use App\Http\Controllers\ProfileController;
use App\Models\Categorie;
use App\Models\Post;
use App\Models\Social;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('accueil');
});

Route::get('/posts', function () {
    return view('posts', [
        'posts' => Post::with(['categorie', 'type', 'user'])->get(),
        'categories' => Categorie::all(),
        'socials' => Social::all()
    ]);
})->middleware('auth')->name("posts");

Route::get('/dashboard', function () {
    return view('dashboard',['users'=>User::paginate(3)]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/change-language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'fr'])) {
        Session::put('locale', $lang);
        App::setLocale($lang);
    }
    return Redirect::back();
})->name('change.language');
