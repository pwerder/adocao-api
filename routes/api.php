<?php

use App\Http\Controllers\TutorController;
use Illuminate\Support\Facades\Route;


Route::resources([
    'tutores' => TutorController::class,
]);
