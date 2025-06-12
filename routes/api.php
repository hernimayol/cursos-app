<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EnrollmentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Ruta para el Login
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);

    //Administrador: Categorías y Cursos:
    Route::middleware('is_admin')->group(function() {
        Route::middleware(['auth:sanctum', 'is_admin'])->post('/register', [AuthController::class, 'register']); //Linea para que solo el administrador pueda registrar los usuarios
        Route::get('/evaluations/user/{id}', [EvaluationController::class, 'evaluationsByUser']); //Esta linea permite a un admin ver las evaluaciones de otro usuario (por ID)


        Route::apiResource('categories', CategoryController::class)->except('show');
        Route::post('/courses', [CourseController::class, 'store']);
        Route::post('/evaluations', [EvaluationController::class, 'store']);
    });

    //Publico en general y estudiantes:
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/category/{id}', [CourseController::class, 'shoByCategory']);

    //Estudiante: Inscripción y evaluación propia:
    Route::post('/courses/{id}/enroll', [EnrollmentController::class, 'enroll']);
    Route::get('/my-courses', [EnrollmentController::class, 'myCourses']);
    Route::get('/my-evaluations', [EvaluationController::class, 'myEvaluations']);
    
});