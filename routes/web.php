<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\JabodetabekFormController;
use App\Http\Controllers\JatengDIYFormController;
use App\Http\Controllers\SoloFormController;

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

Route::get('/navigations', [FormController::class,'navigations'])->name('forms.navigations');

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


Route::get('solo/', [SoloFormController::class,'index'])->name('forms.solo.index');

Route::get('solo/create-step-one', [SoloFormController::class,'createStepOne'])->name('forms.solo.create.step.one');

Route::post('solo/create-step-one', [SoloFormController::class,'postCreateStepOne'])->name('forms.solo.create.step.one.post');

Route::get('solo/create-step-two-1', [SoloFormController::class,'createStepTwo1'])->name('forms.solo.create.step.two.1');

Route::post('solo/create-step-two-1', [SoloFormController::class,'postCreateStepTwo1'])->name('forms.solo.create.step.two.post.1');

Route::get('solo/create-step-two-2', [SoloFormController::class,'createStepTwo2'])->name('forms.solo.create.step.two.2');

Route::post('solo/create-step-two-2', [SoloFormController::class,'postCreateStepTwo2'])->name('forms.solo.create.step.two.post.2');

Route::get('solo/create-step-three', [SoloFormController::class,'createStepThree'])->name('forms.solo.create.step.three');

Route::post('solo/create-step-three', [SoloFormController::class,'postCreateStepThree'])->name('forms.solo.create.step.three.post');

Route::get('solo/create-step-four-A', [SoloFormController::class,'createStepFourA'])->name('forms.solo.create.step.four.a');

Route::post('solo/create-step-four-A', [SoloFormController::class,'postCreateStepFourA'])->name('forms.solo.create.step.four.a.post');

Route::get('solo/create-step-four-B1', [SoloFormController::class,'createStepFourB1'])->name('forms.solo.create.step.four.b1');

Route::post('solo/create-step-four-B1', [SoloFormController::class,'postCreateStepFourB1'])->name('forms.solo.create.step.four.b1.post');

Route::get('solo/create-step-four-B2', [SoloFormController::class,'createStepFourB2'])->name('forms.solo.create.step.four.b2');

Route::post('solo/create-step-four-B2', [SoloFormController::class,'postCreateStepFourB2'])->name('forms.solo.create.step.four.b2.post');

Route::get('solo/create-step-four-C', [SoloFormController::class,'createStepFourC'])->name('forms.solo.create.step.four.c');

Route::post('solo/create-step-four-C', [SoloFormController::class,'postCreateStepFourC'])->name('forms.solo.create.step.four.c.post');

Route::get('solo/forms-success', [SoloFormController::class,'formSuccess'])->name('forms.solo.success');

