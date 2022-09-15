<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\EventlistController;
use App\Http\Controllers\WaitinglistController;
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





Route::apiResource('fees', FeesController::class);

Route::apiResource('waitinglist', WaitinglistController::class);

Route::post('deleteWaitlist/{id}',[WaitinglistController::class,'deleteWaitlist']);

Route::apiResource('courses', CourseController::class);
// teacher
Route::apiResource('teacher', TeacherController::class);
//Fees Delete
Route::post('fees-delete/{id}',[FeesController::class,'deleteFee']);
Route::post('fees-update/{id}',[FeesController::class,'updateFee']);


Route::post('calendardelete/{id}',[CalendarControllerController::class,'deleteCalendar']);


Route::post('calendarupdate/{id}',[CalendarControllerController::class,'updateCalendar']);


Route::post('sendmail',[ContactusController::class,'sendMail']);

Route::post('like/{id}',[EventlistController::class,'like']);
