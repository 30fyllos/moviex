<?php
use Illuminate\Support\Facades\Route;
use Go4tech\Moviex\Http\Controllers\MoviesController;

Route::get('/movies', [MoviesController::class, 'index']);
Route::get('/movie/{id}', [MoviesController::class, 'show']);
