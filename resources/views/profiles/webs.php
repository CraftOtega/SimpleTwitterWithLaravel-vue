<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\profilesController;

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

Route::get('/', function () {
    return view('welcome');
});


/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 */




require __DIR__.'/auth.php';

Route::post('/p', [postsController::class, 'store']);
Route::get('/p/{post}', [postsController::class, 'show']);
Route::get('/p/create', [postsController::class, 'create'])->name('dashboard');


Route::get('/profile/{user}', [profilesController::class, 'index']);
Route::get('/profile/{user}/edit', [profilesController::class, 'edit']);





/*
Route::post('/p', [postsController::class, 'store']);
Route::get('/p/{post}', [postsController::class, 'show']);
Route::get('/p/create', [postsController::class, 'create'])->name('dashboard');

Route::get('/profile/{user}/edit', [profilesController::class, 'edit'])->name('profiles.edit');
Route::patch('/profile/{user}/', [profilesController::class, 'update'])->name('profiles.update');
Route::get('/profile/{user}', [profilesController::class, 'index'])->name('profile.show');

*/
