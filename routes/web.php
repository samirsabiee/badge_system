<?php

use App\Http\Controllers\BadgeController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::view('/', 'welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('topics', [TopicController::class, 'index'])->name('topics');
Route::get('topic/new', [TopicController::class, 'new'])->name('topic.new');
Route::post('topic', [TopicController::class, 'store'])->name('topic.store');
Route::get('topic/{topic}', [TopicController::class, 'show'])->name('topic.show');
Route::post('topic/{topic}/reply', [ReplyController::class, 'store'])->name('reply.store');
Route::get('badge/new', [BadgeController::class, 'new'])->name('badge.new');
Route::post('badge', [BadgeController::class, 'store'])->name('badge.store');
