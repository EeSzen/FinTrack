<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\assignRolesToUsersController;
use App\Http\Controllers\UserEditController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SuperAdminController;

// New page
Route::get('/', [
    HomeController::class,
    'loadHomePage'
]);

// Signup page
Route::get('/signup',[
    SignUpController::class,
    'loadSignUpPage'
]);

// Signup logic
Route::post('/signup',[
    SignUpController::class,
    'doSignUp'
]);

// login
Route::get('/login',[
    LoginController::class,
    'loadLoginPage'
]);

// Login logic
Route::post('/login',[
    LoginController::class,
    'doLogin'
]);

// logout
Route::get('/logout',[
    LogoutController::class,
    'logout'
]);

// Budget routes
/*
- GET `/budgets` (index)
- GET `/budgets/create` (create)
- POST `/budgets` (store)
- GET `/budgets/{post}` (show)
- GET `/budgets/{post}/edit` (edit)
- PUT/PATCH `/budgets/{post}` (update)
- DELETE `/budgets/{post}` (destroy)
*/

// Budget routes
Route::resource("budgets", BudgetController::class);

// Expenses routes
Route::resource("expenses", ExpensesController::class);


// update roles to users


Route::post('/update/{id}',[
    assignRolesToUsersController::class,
    'assignRolesToUsersController'])->name('update');

// edit users
Route::get('/edit_users/{id}', [UserEditController::class, 'edit'])->name('edit_users');
Route::put('/user/update/{id}', [UserEditController::class, 'update'])->name('user.update');
Route::delete('/users/{id}', [UserEditController::class, 'destroy'])->name('user.destroy');

// expenses report
Route::get('/reports/summary', [ReportController::class, 'summary'])->name('summary');
// budget report
Route::get('/reports/budget-summary', [ReportController::class, 'budgetSummary'])->name('budget_summary');

// routing back to edit
Route::get('/super_admin', [SuperAdminController::class, 'index'])->name('super_admin');