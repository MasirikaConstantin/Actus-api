<?php

use App\Http\Controllers\Api\V1\CategorieController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\GestionConnexion;
use App\Http\Controllers\Api\V1\SocialController;
use App\Http\Controllers\CommentaireControler;
use App\Http\Controllers\FavoriController;
use App\Http\Controllers\PostController as ControllersPostController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\SectionController;
use App\Http\Requests\CommentaireValidator;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/posts",[PostController::class, "index"]);

Route::post("/new/posts",[PostController::class, "store"])->middleware('auth:sanctum');
Route::post("/new/sections",[SectionController::class, "store"])->middleware('auth:sanctum');


Route::post("/new/comment",[CommentaireControler::class, "store"])->middleware('auth:sanctum');
Route::post("/react",[ReactionController::class, "store"])->middleware('auth:sanctum');

   
Route::get('/reaction/{post}', [PostController::class, 'Reaction'])->middleware('auth:sanctum');
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/slug/{slug}', [PostController::class, 'shows']);


Route::post('/login', [GestionConnexion::class, 'login']);
Route::post('/logout', [GestionConnexion::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [GestionConnexion::class, 'register']);
Route::put('/user', [GestionConnexion::class, 'update'])->middleware('auth:sanctum');
Route::delete('/user', [GestionConnexion::class, 'delete'])->middleware('auth:sanctum');
Route::get('/reaction/{post}', [PostController::class, 'Reaction'])->middleware('auth:sanctum');


/*Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('categories', CategorieController::class);
});*/

Route::get('/categories', [CategorieController::class, 'index']);
Route::post('/categories', [CategorieController::class, 'store'])->middleware('auth:sanctum');
Route::get('/categories/{id}', [CategorieController::class, 'show']);
Route::put('/categories/{id}', [CategorieController::class, 'update'])->middleware('auth:sanctum');
Route::patch('/categories/{id}', [CategorieController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->middleware('auth:sanctum');

/*Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('socials', SocialController::class);
});*/

Route::get('/socials', [SocialController::class, 'index']);
Route::post('/socials', [SocialController::class, 'store'])->middleware('auth:sanctum');
Route::get('/socials/{id}', [SocialController::class, 'show']);
Route::put('/socials/{id}', [SocialController::class, 'update'])->middleware('auth:sanctum');
Route::patch('/socials/{id}', [SocialController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/socials/{id}', [SocialController::class, 'destroy'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('favoris', FavoriController::class);
});
Route::get('/category/{category}',[PostController::class, 'lescategory']);
Route::get('/caroussel',[PostController::class, 'caroussel']);
Route::get('/populaire',[PostController::class, 'populaire']);
Route::get('/sponsorise',[PostController::class, 'sponsorise']);
Route::get('/plusvue',[PostController::class, 'plusvue']);
Route::get('/search', [PostController::class, 'search']);
Route::get('/mesfavoris/{user}', [PostController::class, 'mesfavoris']);
Route::middleware('auth:sanctum')->get('/posts/{post}/has-reacted', [PostController::class, 'hasReacted']);