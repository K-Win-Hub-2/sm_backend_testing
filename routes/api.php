<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\securityauth;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DaySlotController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\EventlistController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BookingSlotController;
use App\Http\Controllers\WaitinglistController;
use App\Http\Controllers\securityauthController;
use App\Http\Controllers\TeacherCategoryController;
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
Route::get('event-list',[EventlistController::class, 'getEventList']);
Route::post('deleteEvent/{id}',[EventlistController::class,'deleteEvent']);
Route::post('updateEvent/{id}',[EventlistController::class,'updateEvent']);
// Route::get('test',[EventlistController::class,'test1']);

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
Route::post('teacher-update/{id}',[TeacherController::class,'update']);
Route::delete('teacher-delete/{id}',[TeacherController::class,'destroy']);
Route::post('teacher-sorty-by/{id}',[TeacherController::class]);

Route::post('teacher/update-sorting', [TeacherController::class, 'updateSorting']);

Route::post('isDisplay/{id}',[TeacherController::class,'isDisplay']);

Route::apiResource('teachercategory',TeacherCategoryController::class);
Route::put('teacher-category-update/{id}', [TeacherCategoryController::class, 'update']);
Route::delete('teacher-category-delete/{id}', [TeacherCategoryController::class, 'destroy']);
Route::get('teacher-category-list', [TeacherCategoryController::class, 'teacherCategory']);


Route::apiResource('career', CareerController::class);
Route::post('eachcv/{cvname}',[CareerController::class,'eachcv']);
Route::get('eachcv/{cvname}',[CareerController::class,'getEachcv']);


//Fees Delete
Route::post('fees-delete/{id}',[FeesController::class,'deleteFee']);
Route::post('fees-update/{id}',[FeesController::class,'updateFee']);


// for create only
Route::get('year-create',[YearController::class,'create']);
Route::get('year',[YearController::class,'getYear']);
Route::post('year-update',[YearController::class,'update']);

Route::post('searchcalendar',[CalendarControllerController::class,'search']);

Route::post('searchteacher',[TeacherController::class,'search']);

Route::post('searchevent',[EventlistController::class,'search']);


Route::post('calendardelete/{id}',[CalendarControllerController::class,'deleteCalendar']);


Route::post('calendarupdate/{id}',[CalendarControllerController::class,'updateCalendar']);


Route::post('sendmail',[ContactusController::class,'sendMail']);

Route::post('like/{id}',[EventlistController::class,'like']);

// position

Route::post('storeposition',[PositionController::class,'storeposition']);
Route::post('updateposition/{id}',[PositionController::class,'updateposition']);
Route::post('deleteposition/{id}',[PositionController::class,'DeletePosition']);
Route::post('showposition',[PositionController::class,'showposition']);

//Users
Route::apiResource('user',UserController::class);

//Appointments
Route::apiResource('appointments',AppointmentController::class);
Route::get('appointments-search',[AppointmentController::class,'appointmentSearch']);
Route::post('appointments-confirmed/{id}',[AppointmentController::class,'appointmentConfirmed']);
Route::post('appointments-canceled/{id}',[AppointmentController::class,'appointmentCanceled']);

//TimeSlots
Route::apiResource('booking-slots',BookingSlotController::class);
Route::apiResource('day-slots',DaySlotController::class);
Route::get('day-slots-checker',[DaySlotController::class,'daySlotsChecker']);
