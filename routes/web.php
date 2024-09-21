<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListItemController;
use App\Models\ListItem;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profiles.edit');


    Route::get('/list-items', [ListItemController::class, 'index'])->name('list-items.index'); // 一覧表示
    Route::get('/list-items/create', [ListItemController::class, 'create'])->name('list-items.create'); // 登録画面表示
    Route::post('/list-items', [ListItemController::class, 'store'])->name('list-items.store'); // 登録処理
    Route::get('/list-items/{id}/edit', [ListItemController::class, 'edit'])->name('list-items.edit'); // 編集画面表示
    Route::put('/list-items/{id}', [ListItemController::class, 'update'])->name('list-items.update'); // 編集処理
    Route::delete('/list-items/{id}', [ListItemController::class, 'destroy'])->name('list-items.destroy'); // 削除

    //自分以外のリストを見る
    Route::get('/users/{user}/list-items', [ListItemController::class, 'showUserItems'])->name('users.list-items');
    

    // ゴミ箱表示
    Route::get('/trash', [ListItemController::class, 'trash'])->name('trash.index');

    // アイテム復元
    Route::post('/list-items/{id}/restore', [ListItemController::class, 'restore'])->name('list-items.restore');
});



require __DIR__ . '/auth.php';
