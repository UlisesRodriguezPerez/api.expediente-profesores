<?php

use App\Http\Controllers\Api\AcademicDegreeController;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\ActivityTypeController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\AppointmentTypeController;
use App\Http\Controllers\Api\Auth\LoginController;
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

Route::post('login', [LoginController::class, 'store']);
Route::post('register', [RegisterController::class, 'store'])->name('api.v1.register.store');


Route::apiResource('training-types', TrainingTypeController::class)->names('api.v1.training-types');
Route::apiResource('positions', PositionController::class)->names('api.v1.positions');
Route::apiResource('activity-types', ActivityTypeController::class)->names('api.v1.activity-types');
Route::apiResource('tec-categories', TecCategoryController::class)->names('api.v1.tec-categories');
Route::apiResource('campuses', CampusController::class)->names('api.v1.campuses');
Route::apiResource('academic-degrees', AcademicDegreeController::class)->names('api.v1.academic-degrees');
Route::apiResource('appointment-types', AppointmentTypeController::class)->names('api.v1.appointment-types');
Route::apiResource('collaborators', CollaboratorController::class)->names('api.v1.collaborators');
Route::apiResource('periods', PeriodController::class)->names('api.v1.periods');
Route::apiResource('activities', ActivityController::class)->names('api.v1.activities');
Route::apiResource('publication-types', PublicationTypeController::class)->names('api.v1.publication-types');
Route::apiResource('publications', PublicationController::class)->names('api.v1.publications');
Route::apiResource('internationalizations', InternationalizationController::class)->names('api.v1.internationalizations');
Route::apiResource('students', StudentController::class)->names('api.v1.students');
Route::apiResource('technical-trainings', TechnicalTrainingController::class)->names('api.v1.technical-trainings');
Route::apiResource('roles', RoleController::class)->names('api.v1.roles');
Route::apiResource('role-users', RoleUserController::class)->names('api.v1.role-users');
Route::apiResource('pedagogical-trainings', PedagogicalTrainingController::class)->names('api.v1.pedagogical-trainings');
Route::apiResource('work-units-and-additional-courses', WorkUnitAndAdditionalCourseController::class)->names('api.v1.work-units-and-additional-courses');


