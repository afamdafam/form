<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormController;

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

Route::get('forms', [FormController::class,'index'])->name('forms.index');

Route::get('forms/create-step-one', [FormController::class,'createStepOne'])->name('forms.create.step.one');

Route::post('forms/create-step-one', [FormController::class,'postCreateStepOne'])->name('forms.create.step.one.post');

Route::get('forms/create-step-two-1', [FormController::class,'createStepTwo1'])->name('forms.create.step.two.1');

Route::post('forms/create-step-two-1', [FormController::class,'postCreateStepTwo1'])->name('forms.create.step.two.post.1');

Route::get('/create-step-two-2', [FormController::class,'createStepTwo2'])->name('forms.create.step.two.2');

Route::post('/create-step-two-2', [FormController::class,'postCreateStepTwo2'])->name('forms.create.step.two.post.2');

Route::get('/create-step-three', [FormController::class,'createStepThree'])->name('forms.create.step.three');

Route::post('/create-step-three', [FormController::class,'postCreateStepThree'])->name('forms.create.step.three.post');

Route::get('/create-step-four-A', [FormController::class,'createStepFourA'])->name('forms.create.step.four.a');

Route::post('/create-step-four-A', [FormController::class,'postCreateStepFourA'])->name('forms.create.step.four.a.post');

Route::get('/create-step-four-B1', [FormController::class,'createStepFourB1'])->name('forms.create.step.four.b1');

Route::post('/create-step-four-B1', [FormController::class,'postCreateStepFourB1'])->name('forms.create.step.four.b1.post');

Route::get('/create-step-four-B2', [FormController::class,'createStepFourB2'])->name('forms.create.step.four.b2');

Route::post('/create-step-four-B2', [FormController::class,'postCreateStepFourB2'])->name('forms.create.step.four.b2.post');

Route::get('/create-step-four-C', [FormController::class,'createStepFourC'])->name('forms.create.step.four.c');

Route::post('/create-step-four-C', [FormController::class,'postCreateStepFourC'])->name('forms.create.step.four.c.post');

Route::get('/forms-success', [FormController::class,'formSuccess'])->name('forms.success');

