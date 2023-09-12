<?php

use App\Http\Controllers\Api\AcademicDegreeController;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\ActivityTypeController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\AppointmentTypeController;
use App\Http\Controllers\Api\CampusController;
use App\Http\Controllers\Api\CollaboratorController;
use App\Http\Controllers\Api\InternationalizationController;
use App\Http\Controllers\Api\PedagogicalTrainingController;
use App\Http\Controllers\Api\PeriodController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\PublicationController;
use App\Http\Controllers\Api\PublicationTypeController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\RoleUserController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TecCategoryController;
use App\Http\Controllers\Api\TechnicalTrainingController;
use App\Http\Controllers\Api\TrainingTypeController;
use App\Http\Controllers\Api\WorkUnitAndAdditionalCourseController;
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

Route::post('register', [RegisterController::class, 'store'])->name('api.v1.register.store');
