<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Documentation routes
Route::prefix('docs')->group(function () {
    Route::get('/', fn() => view('docs.index'))->name('docs');
    Route::get('/installation', fn() => view('docs.installation'))->name('docs.installation');
    Route::get('/configuration', fn() => view('docs.configuration'))->name('docs.configuration');
    Route::get('/features', fn() => view('docs.features'))->name('docs.features');
    Route::get('/admin', fn() => view('docs.admin'))->name('docs.admin');
    Route::get('/api', fn() => view('docs.api'))->name('docs.api');
    Route::get('/deployment', fn() => view('docs.deployment'))->name('docs.deployment');
    Route::get('/theming', fn() => view('docs.theming'))->name('docs.theming');
    Route::get('/contributing', fn() => view('docs.contributing'))->name('docs.contributing');
});
