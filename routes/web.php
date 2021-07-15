<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShortLinkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ShortLinkController::class, 'index'])->name('shortlink.index');
Route::get('shortlink/list', [ShortLinkController::class, 'getLinks'])->name('shortlink.list');
Route::post('shortlink/generate', [ShortLinkController::class, 'store'])->name('shortlink.generate');
   
Route::get('{code}', [ShortLinkController::class, 'shortenLink'])->name('shorten.link');