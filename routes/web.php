<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Models\Speciality;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function() {
    return view("welcome");
});

//for the patient (signUp , signUp view)
Route::get('/signUp', [UserController::class, 'signUpView'])->name("signUpPatient")->middleware("guest");
Route::post('/createUser', [UserController::class, "createPacient"])->name("createPacient");

//for the doctor
Route::get("/signUpDoctor", [UserController::class, "signUpDoctorView"])->name("signUpDoctor")->middleware("guest");
Route::post('/createDoctor', [UserController::class, "createDoctor"])->name("createDoctor");

//login for the pacient and the doctor (login, login view)
Route::get('/login', function () {
    return view('login');
})->name('signIn')->middleware("guest");
Route::post('login', [UserController::class, "login"])->name('login');

//logout for all the users
Route::get("/logout", [UserController::class, "logout"])->name("logout");

//single speciality page (for pacient only)
Route::get("/speciality/{id}", [SpecialityController::class, 'index'])->name('SingleSpecialityPage')->middleware('auth');

//Patient chat
Route::get("PatientChat/{SP_id}/{DR_id}", [ConsultationController::class, 'patientChat'])
        ->name('patientChat')->middleware('auth');

//message
Route::post("MessageController/{Con_id}/{DR_id}", [MessageController::class, 'message'])->name('MessageController');

// download file from any consultation messages
Route::get('/{fileName}', [MessageController::class, 'download'])->name('download');

//home page
Route::get("mc/home", [HomeController::class, 'index'])->name("home")->middleware("auth");
