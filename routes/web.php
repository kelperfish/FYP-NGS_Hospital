<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EmployeeCustomController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\TasksController;

Route::get('/', function () {
    return view('welcome');
});

//view pages
Route::view("app", 'welcome');
Route::view("add-medicine", 'user/addMedicine');
Route::view("add-disease", 'user/addDisease');

//user general auth
Route::get('/logout', [CustomController::class,'logout']);
Route::get('/logoutEmployee', [EmployeeCustomController::class,'logout']);
Route::get('/dashboard', [CustomController::class,'dashboard']);
Route::get('/employeeDashboard', [EmployeeCustomController::class,'dashboard']);

//doctor auth
Route::get('/login', [CustomController::class,'login']);
Route::get('/register', [CustomController::class,'register']);
Route::post('/login-doctor', [CustomController::class,'loginDoctor'])->name('login-doctor');
Route::post('/register-doctor', [CustomController::class,'registerDoctor'])->name('register-doctor');

//employee auth
Route::get('/loginEmployee', [EmployeeCustomController::class,'login']);
Route::get('/registerEmployee', [EmployeeCustomController::class,'register']);
Route::post('/register-employee', [EmployeeCustomController::class,'registerEmployee'])->name('register-employee');
Route::post('/login-employee', [EmployeeCustomController::class,'loginEmployee'])->name('login-employee');

//doctor management
Route::get('doctor-dashboard', [DoctorsController::class,'index']);
Route::get('edit-doctor/{id}', [DoctorsController::class,'edit']);
Route::put('update-doctor/{id}', [DoctorsController::class, 'update']);

//employee management
Route::get('/employees', [EmployeesController::class,'show']);
Route::get('employee-dashboard', [EmployeesController::class,'index']);
Route::get('edit-employee/{id}', [EmployeesController::class,'edit']);
Route::put('update-employee/{id}', [EmployeesController::class,'update']);
Route::get('edit-employee-password/{id}', [EmployeesController::class,'editPw']);
Route::post('verify-employee-password', [EmployeesController::class,'verifyPw']);
Route::put('update-employee-password', [EmployeesController::class,'updatePw']);
Route::get('delete-employee/{id}', [EmployeesController::class,'destroy']);

//medicine management
Route::get('/medicine', [MedicineController::class,'index']);
Route::get('/medicineReport', [MedicineController::class,'report']);
Route::post('/add-medicine', [MedicineController::class,'store'])->name('add-medicine');
Route::get('edit-medicine/{id}', [MedicineController::class,'edit']);
Route::put('update-medicine/{id}', [MedicineController::class,'update']);
Route::get('delete-medicine/{id}', [MedicineController::class,'remove']);

//diseases management
Route::get('/diseases', [DiseaseController::class,'index']);
Route::post('/add-disease', [DiseaseController::class,'store'])->name('add-disease');
Route::get('edit-disease/{id}', [DiseaseController::class,'edit']);
Route::put('update-disease/{id}', [DiseaseController::class,'update']);
Route::get('delete-disease/{id}', [DiseaseController::class,'remove']);

//tasks management
Route::get('/allTasks', [TasksController::class,'index']);
Route::get('employee-tasks/{employeeID}', [TasksController::class,'show']);
Route::get('add-task/{employeeID}', [TasksController::class,'passID']);
Route::get('add-new-task/{passEmpID}', [TasksController::class,'passNewID']);
Route::post('insert-task', [TasksController::class,'store'])->name('insert-task');
Route::put('update-task/{id}', [TasksController::class,'updateStatus']);
Route::get('delete-task/{id}', [TasksController::class,'destroy']);