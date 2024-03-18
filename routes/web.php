<?php

use App\Http\Controllers\Page\PrivacyPolicy;
use Filament\Notifications\Events\DatabaseNotificationsSent;
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

Route::get('/', function(){
    return  redirect(route('home.index'));
});
Route::get('/privacy-policy', [PrivacyPolicy::class, 'index'])->name('privacy-pilicy');
Route::resources([
    'home' => \App\Http\Controllers\Page\Welcome::class,
    'about' => \App\Http\Controllers\Page\AboutUs::class,
    'services' => \App\Http\Controllers\Page\Services::class,
    'article' => \App\Http\Controllers\Page\Article::class,
    'product' => \App\Http\Controllers\Page\Product::class,
]);
