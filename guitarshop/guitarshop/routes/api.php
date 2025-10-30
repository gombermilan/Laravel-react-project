<?php

use App\Http\Controllers\GuitarShopController;
use App\Http\Controllers\MegrendelesController;
use App\Http\Controllers\UgyfelController;
use App\Models\GuitarShop;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuitarShopController::class, 'index']);
Route::post('/Ujszolgaltatas', [GuitarShopController::class, 'store']);
Route::get('/szolgaltatasok/{nev}', [GuitarShopController::class, 'show']);
Route::get('/megrendelesek/{id}', [MegrendelesController::class, 'show']);
Route::get('/ugyfelek/{nev}', [UgyfelController::class, 'show']);
