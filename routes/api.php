<?php

use App\Http\Controllers\FurnitureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/furnitures', FurnitureController::class);
