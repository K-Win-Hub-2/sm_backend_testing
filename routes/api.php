<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\securityauth;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\EventlistController;
use App\Http\Controllers\WaitinglistController;
use App\Http\Controllers\securityauthController;
use App\Http\Controllers\CalendarControllerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('contact_us', ContactusController::class);
Route::post('deleteContactus/{id}',[ContactusController::class,'deleteContactus']);
Route::apiResource('calendar1', CalendarControllerController::class);

Route::apiResource('comment', CommentController::class);

Route::apiResource('eventinput', EventlistController::class);
Route::post('deleteEvent/{id}',[EventlistController::class,'deleteEvent']);
Route::post('updateEvent/{id}',[EventlistController::class,'updateEvent']);

Route::post('login/',[securityauthController::class,'login']);

Route::post('alreadyLogin/',[securityauthController::class,'alreadyLogin']);
Route::post('logoutanother/',[securityauthController::class,'logoutanother']);
Route::post('logout/',[securityauthController::class,'logout']);




Route::get('login', [securityauthController::class,'login']);

Route::apiResource('fees', FeesController::class);

Route::apiResource('waitinglist', WaitinglistController::class);

Route::post('deleteWaitlist/{id}',[WaitinglistController::class,'deleteWaitlist']);

Route::apiResource('courses', CourseController::class);
// teacher
Route::apiResource('teacher', TeacherController::class);
Route::post('isDisplay/{id}',[TeacherController::class,'isDisplay']);


Route::apiResource('career', CareerController::class);
Route::post('eachcv/{cvname}',[CareerController::class,'eachcv']);


//Fees Delete
Route::post('fees-delete/{id}',[FeesController::class,'deleteFee']);
Route::post('fees-update/{id}',[FeesController::class,'updateFee']);

Route::post('search',[CalendarControllerController::class,'search']);

Route::post('search',[TeacherController::class,'search']);

Route::post('search',[EventlistController::class,'search']);


Route::post('calendardelete/{id}',[CalendarControllerController::class,'deleteCalendar']);


Route::post('calendarupdate/{id}',[CalendarControllerController::class,'updateCalendar']);


Route::post('sendmail',[ContactusController::class,'sendMail']);

Route::post('like/{id}',[EventlistController::class,'like']);
