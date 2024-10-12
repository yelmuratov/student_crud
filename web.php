<?php
    use App\Routes\Route;
    use App\Controllers\CategoryController;
    use App\Controllers\AuthController;

    Route::get('/',[CategoryController::class,'index']);

    //authors
    Route::get('/authors',[CategoryController::class,'authors']);
    Route::get('/author_add',[CategoryController::class,'author_create']);
    Route::post('/save_author',[CategoryController::class,'save_author']);
    Route::get('/author_edit',[CategoryController::class,'author_edit']);
    Route::post('/update_author',[CategoryController::class,'update_author']);
    Route::get('/delete_author',[CategoryController::class,'delete_author']);

    //books
    Route::get('/books',[CategoryController::class,'books']);
    Route::get('/book_create',[CategoryController::class,'book_create']);
    Route::post('/save_book',[CategoryController::class,'save_book']);
    Route::get('/book_edit',[CategoryController::class,'book_edit']);
    Route::post('/update_book',[CategoryController::class,'update_book']);
    Route::get('/book_delete',[CategoryController::class,'delete_book']);

    //genres
    Route::get('/genres',[CategoryController::class,'genres']);
    Route::get('/genre_create',[CategoryController::class,'genre_create']);
    Route::post('/save_genre',[CategoryController::class,'save_genre']);
    Route::get('/genre_edit',[CategoryController::class,'genre_edit']);
    Route::post('/update_genre',[CategoryController::class,'update_genre']);
    Route::get('/genre_delete',[CategoryController::class,'delete_genre']);

    //Auth
    Route::get('/login',[AuthController::class,'login']);
    Route::post('/login_user',[AuthController::class,'login_user']);
    Route::get('/register',[AuthController::class,'register']);
    Route::post('/register_user',[AuthController::class,'register_user']);
    Route::get('/logout',[AuthController::class,'logout']);

?>