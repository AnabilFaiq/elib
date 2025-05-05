<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('auths.login');
})->name('login');

Route::get('/register', function () {
    return view('auths.register');
})->name('auth.register');

Route::get('/user', function () {
    return view('users.baseUser');
})->name('user');

Route::get('/category', function() {
    return view('categories.baseCategory');
})->name('category');

// Route::get('/book', function() {
//     return view('books.baseBook');
// })->name('book');

Route::get('/role', function() {
    return view('roles.baseRole');
})->name('role');



// Route Auth


Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.masuk');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.daftar');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::middleware(['role:admin'])->group(function () {
    // Route User
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');


    // Route Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::delete('/category/delete/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
    
    // Route Book
    
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::delete('/book/delete/{book}', [BookController::class, 'delete'])->name('book.delete');
    Route::put('/book/update/{book}', [BookController::class, 'update'])->name('book.update');
    
    // Route Role
    Route::get('/role', [RoleController::class, 'index'])->name('role');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
    Route::delete('/role/delete/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
    Route::put('/role/update/{role}', [RoleController::class, 'update'])->name('role.update');

    // Route Peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
});

Route::middleware(['role:user|admin'])->group(function () {
    Route::get('/home', [AuthController::class, 'index'])->name('dashboard')->middleware(['auth']);
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/book', [BookController::class, 'index'])->name('book.index');
    Route::get('book/user', [BookController::class, 'bookUser'])->name('book.user');
    Route::resource('peminjamans', PeminjamanController::class);
});