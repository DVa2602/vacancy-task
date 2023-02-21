<?php

use App\Http\Controllers\Library;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('welcome', function () {
    return view('welcome');
});

//Route::resource('/', Library::class);
Route::get('/', [Library::class, 'index'])->name('books');
Route::get('/book-create', [Library::class, 'create'])->name('book.create');
Route::post('/book-store', [Library::class, 'store'])->name('book.store');
Route::get('/book/{book}/edit', [Library::class, 'edit'])->name('book.edit');
Route::put('/book/{book}/update', [Library::class, 'update'])->name('book.update');
Route::delete('/book/{book}/destroy', [Library::class, 'destroy'])->name('book.destroy');


