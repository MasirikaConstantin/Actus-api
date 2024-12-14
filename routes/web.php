<?php

use App\Http\Controllers\GestionAdmin;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionControllerSite;
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
})->middleware('guest');

Route::middleware(['auth', 'verified','rolemanager:utilisateur'])->get('/erreur', function () {
    return view('autres');
})->name('autres');

Route::get('/posts', function () {
    return view('posts', [
        'posts' => Post::with(['categorie', 'type', 'user'])->get(),
        'categories' => Categorie::all(),
        'socials' => Social::all()
    ]);
})->middleware(['auth', 'verified','rolemanager:admin'])->name("posts");

Route::get('/dashboard', function () {
    return view('dashboard',['users'=>User::paginate(10),'categories'=>Categorie::all(),"posts"=>Post::paginate(10)]);
})->middleware(['auth', 'verified','rolemanager:admin'])->name('dashboard');

Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
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

Route::prefix('/new')->controller(GestionAdmin::class)->middleware(['auth', 'verified','rolemanager:admin'])->name('admin.')->group(function (){
    Route::get('/category','newcat')->name('newcat');
    Route::post('/category','savecat');

    Route::get('/category/{categorie}','editcat')->name('editcat');
    Route::post('/category/{categorie}','updatecat');

    Route::delete("/delete/{categorie}",'deletcat')->name('deletecat');
    
});

// Routes pour la gestion des utilisateurs
Route::middleware(['auth','verified','rolemanager:admin'])->group(function () {
    // Route pour changer le rôle d'un utilisateur (admin <-> utilisateur)
    Route::patch('/admin/users/{user}/toggle-role', [GestionAdmin::class, 'toggleRole'])
        ->name('admin.toggleUserRole');

    // Route pour supprimer un utilisateur
    Route::delete('/admin/users/{user}/delete', [GestionAdmin::class, 'deleteUser'])
        ->name('admin.deleteUser');
});

Route::middleware(['auth','verified','rolemanager:admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        // Liste des posts
        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        
        // Formulaire de création
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        
        // Enregistrement du post
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        
        // Édition d'un post
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        
        // Mise à jour d'un post
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        
        // Suppression d'un post
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

        Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    });
});



Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        // Routes pour les sections
        Route::get('/posts/{post}/sections/create', [SectionControllerSite::class, 'create'])->name('sections.create');
        Route::post('/posts/{post}/sections', [SectionControllerSite::class, 'store'])->name('sections.store');
        Route::get('/posts/{post}/sections/{section}/edit', [SectionControllerSite::class, 'edit'])->name('sections.edit');
        Route::put('/posts/{post}/sections/{section}', [SectionControllerSite::class, 'update'])->name('sections.update');
        Route::delete('/posts/{post}/sections/{section}', [SectionControllerSite::class, 'destroy'])->name('sections.destroy');
    });
});