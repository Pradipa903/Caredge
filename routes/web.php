<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\PythonController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/autocomplete-skills', [SkillController::class, 'autocompleteSkills'])->name('autocompleteSkills');

Route::get('/autocomplete-majors', [SkillController::class, 'autocompleteMajors']);

Route::get('/findjob', function () {
    return view('findjob');
})->middleware('auth');

Route::post('/recommendations', [SkillController::class, 'saveSelections'])->name('recommendations.save');

Route::get('/python-data', [PythonController::class, 'getDataFromPython'])->name('pythondata');

Route::get('/search', [SearchController::class, 'index'])->name('search');