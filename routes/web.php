<?php

use App\Http\Controllers\LeavereportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/', [LeavereportController::class, 'Dashboard'])->name('dashboard');
Route::match(['get', 'post'], '/add_staffs', [LeavereportController::class, 'AddStaffs'])->name('add_staffs');
Route::match(['get', 'post'], '/all_staffs', [LeavereportController::class, 'AllStaffs']);
Route::match(['get', 'post'], '/signup', [LeavereportController::class, 'SignUp'])->name('signup');
Route::match(['get', 'post'], '/login', [LeavereportController::class, 'Login'])->name('login');
Route::match(['get', 'post'], '/logout', [LeavereportController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], '/leave_request', [LeavereportController::class, 'LeaveRequest'])->name('leave_request');
Route::match(['get', 'post'], '/add_leave_type', [LeavereportController::class, 'AddLeaveType'])->name('add_leave_type');
Route::match(['get', 'post'], '/staffs_on_leave', [LeavereportController::class, 'StaffsOnLeave']);
