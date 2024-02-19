<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\JabodetabekFormController;
use App\Http\Controllers\JatengDIYFormController;

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
Route::get('/', [FormController::class,'index'])->name('forms.index');

Route::get('jabodetabek/', [JabodetabekFormController::class,'index'])->name('forms.jabodetabek.index');

Route::get('jabodetabek/create-step-one', [JabodetabekFormController::class,'createStepOne'])->name('forms.jabodetabek.create.step.one');

Route::post('jabodetabek/create-step-one', [JabodetabekFormController::class,'postCreateStepOne'])->name('forms.jabodetabek.create.step.one.post');

Route::get('jabodetabek/create-step-two-1', [JabodetabekFormController::class,'createStepTwo1'])->name('forms.jabodetabek.create.step.two.1');

Route::post('jabodetabek/create-step-two-1', [JabodetabekFormController::class,'postCreateStepTwo1'])->name('forms.jabodetabek.create.step.two.post.1');

Route::get('jabodetabek/create-step-two-2', [JabodetabekFormController::class,'createStepTwo2'])->name('forms.jabodetabek.create.step.two.2');

Route::post('jabodetabek/create-step-two-2', [JabodetabekFormController::class,'postCreateStepTwo2'])->name('forms.jabodetabek.create.step.two.post.2');

Route::get('jabodetabek/create-step-three', [JabodetabekFormController::class,'createStepThree'])->name('forms.jabodetabek.create.step.three');

Route::post('jabodetabek/create-step-three', [JabodetabekFormController::class,'postCreateStepThree'])->name('forms.jabodetabek.create.step.three.post');

Route::get('jabodetabek/create-step-four-A', [JabodetabekFormController::class,'createStepFourA'])->name('forms.jabodetabek.create.step.four.a');

Route::post('jabodetabek/create-step-four-A', [JabodetabekFormController::class,'postCreateStepFourA'])->name('forms.jabodetabek.create.step.four.a.post');

Route::get('jabodetabek/create-step-four-B1', [JabodetabekFormController::class,'createStepFourB1'])->name('forms.jabodetabek.create.step.four.b1');

Route::post('jabodetabek/create-step-four-B1', [JabodetabekFormController::class,'postCreateStepFourB1'])->name('forms.jabodetabek.create.step.four.b1.post');

Route::get('jabodetabek/create-step-four-B2', [JabodetabekFormController::class,'createStepFourB2'])->name('forms.jabodetabek.create.step.four.b2');

Route::post('jabodetabek/create-step-four-B2', [JabodetabekFormController::class,'postCreateStepFourB2'])->name('forms.jabodetabek.create.step.four.b2.post');

Route::get('jabodetabek/create-step-four-C', [JabodetabekFormController::class,'createStepFourC'])->name('forms.jabodetabek.create.step.four.c');

Route::post('jabodetabek/create-step-four-C', [JabodetabekFormController::class,'postCreateStepFourC'])->name('forms.jabodetabek.create.step.four.c.post');

Route::get('jabodetabek/forms-success', [JabodetabekFormController::class,'formSuccess'])->name('forms.jabodetabek.success');


Route::get('jateng-diy/', [JatengDIYFormController::class,'index'])->name('forms.jateng-diy.index');

Route::get('jateng-diy/create-step-one', [JatengDIYFormController::class,'createStepOne'])->name('forms.jateng-diy.create.step.one');

Route::post('jateng-diy/create-step-one', [JatengDIYFormController::class,'postCreateStepOne'])->name('forms.jateng-diy.create.step.one.post');

Route::get('jateng-diy/create-step-two-1', [JatengDIYFormController::class,'createStepTwo1'])->name('forms.jateng-diy.create.step.two.1');

Route::post('jateng-diy/create-step-two-1', [JatengDIYFormController::class,'postCreateStepTwo1'])->name('forms.jateng-diy.create.step.two.post.1');

Route::get('jateng-diy/create-step-two-2', [JatengDIYFormController::class,'createStepTwo2'])->name('forms.jateng-diy.create.step.two.2');

Route::post('jateng-diy/create-step-two-2', [JatengDIYFormController::class,'postCreateStepTwo2'])->name('forms.jateng-diy.create.step.two.post.2');

Route::get('jateng-diy/create-step-three', [JatengDIYFormController::class,'createStepThree'])->name('forms.jateng-diy.create.step.three');

Route::post('jateng-diy/create-step-three', [JatengDIYFormController::class,'postCreateStepThree'])->name('forms.jateng-diy.create.step.three.post');

Route::get('jateng-diy/create-step-four-A', [JatengDIYFormController::class,'createStepFourA'])->name('forms.jateng-diy.create.step.four.a');

Route::post('jateng-diy/create-step-four-A', [JatengDIYFormController::class,'postCreateStepFourA'])->name('forms.jateng-diy.create.step.four.a.post');

Route::get('jateng-diy/create-step-four-B1', [JatengDIYFormController::class,'createStepFourB1'])->name('forms.jateng-diy.create.step.four.b1');

Route::post('jateng-diy/create-step-four-B1', [JatengDIYFormController::class,'postCreateStepFourB1'])->name('forms.jateng-diy.create.step.four.b1.post');

Route::get('jateng-diy/create-step-four-B2', [JatengDIYFormController::class,'createStepFourB2'])->name('forms.jateng-diy.create.step.four.b2');

Route::post('jateng-diy/create-step-four-B2', [JatengDIYFormController::class,'postCreateStepFourB2'])->name('forms.jateng-diy.create.step.four.b2.post');

Route::get('jateng-diy/create-step-four-C', [JatengDIYFormController::class,'createStepFourC'])->name('forms.jateng-diy.create.step.four.c');

Route::post('jateng-diy/create-step-four-C', [JatengDIYFormController::class,'postCreateStepFourC'])->name('forms.jateng-diy.create.step.four.c.post');

Route::get('jateng-diy/forms-success', [JatengDIYFormController::class,'formSuccess'])->name('forms.jateng-diy.success');

