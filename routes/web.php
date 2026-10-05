<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return redirect()->route('employees.index');
});

Route::get('/employees', [EmployeeController::class, 'index'])
    ->name('employees.index');

Route::get('/employees/create', [EmployeeController::class, 'create'])
    ->name('employees.create');

Route::post('/employees', [EmployeeController::class, 'store'])
    ->name('employees.store');

Route::get('/employees/{employee_id}', [EmployeeController::class, 'show'])
    ->name('employees.show');

Route::get('/employees/{employee_id}/edit', [EmployeeController::class, 'edit'])
    ->name('employees.edit');

Route::put('/employees/{employee_id}', [EmployeeController::class, 'update'])
    ->name('employees.update');

Route::delete('/employees/{employee_id}', [EmployeeController::class, 'destroy'])
    ->name('employees.destroy');