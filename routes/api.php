<?php

use App\Http\Controllers\TutorController;
use Illuminate\Support\Facades\Route;

Route::post('/cadastrar', [TutorController::class, 'create']);
