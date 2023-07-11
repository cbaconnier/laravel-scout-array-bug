<?php

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

Route::get('/working', function () {
    return App\Models\User::search('John Doe')->get();
});

Route::get('/not-working', function () {
    return App\Models\User::search('John Doe', function($meilisearch, string $query, array $options) {
        $options['sort'] = ['name:asc'];
        $options['filter'] = 'email IS NOT NULL';

        /** @var Meilisearch\Endpoints\Indexes $meilisearch */
        return $meilisearch->search($query, $options);
    })->get();
});
