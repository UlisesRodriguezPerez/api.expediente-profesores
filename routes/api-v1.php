<?php

use App\Http\Controllers\AcademicDegreeController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityTypeController;
use App\Http\Controllers\AppointmentTypeController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\InternationalizationController;
use App\Http\Controllers\PedagogicalTrainingController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\PublicationTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TecCategoryController;
use App\Http\Controllers\TechnicalTrainingController;
use App\Http\Controllers\TrainingTypeController;
use App\Http\Controllers\WorkUnitAndAdditionalCourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::apiResource('training-types', TrainingTypeController::class);
Route::apiResource('positions', PositionController::class);
Route::apiResource('activity-types', ActivityTypeController::class);
// Route::apiResource('users', UserController::class);
Route::apiResource('tec-categories', TecCategoryController::class);
Route::apiResource('campuses', CampusController::class);
Route::apiResource('academic-degrees', AcademicDegreeController::class);
Route::apiResource('appointment-types', AppointmentTypeController::class);
Route::apiResource('collaborators', CollaboratorController::class);
Route::apiResource('periods', PeriodController::class);
Route::apiResource('activities', ActivityController::class);
Route::apiResource('publication-types', PublicationTypeController::class);
Route::apiResource('publications', PublicationController::class);
Route::apiResource('internationalizations', InternationalizationController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('technical-trainings', TechnicalTrainingController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('role-users', RoleUserController::class);
Route::apiResource('pedagogical-trainings', PedagogicalTrainingController::class);
Route::apiResource('work-units-and-additional-courses', WorkUnitAndAdditionalCourseController::class);
