<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/hocsinh',function() {
    return view('hocsinh.begin');
});
Route::get('/hocsinh/xem_diem',[StudentController::class,'view_score'])->name('xem_diem');

Route::get('/hocsinh/gui_phan_hoi',[StudentController::class,'sent_feedbacks'])->name('gui_phan_hoi'); 

Route::get('/hocsinh/phuc_khao',[StudentController::class,'send_appeal'])->name('gui_phuc_khao');


Route::get('/giaovien',function() {
    return view('giaovien.begin');
});
Route::get('giaovien/edit',[TeacherController::class,'edit'])->name('edit');

Route::get('giaovien/xem_phuc_khao',[TeacherController::class,'view_appeal'])->name('xem_phuc_khao');

Route::get('giaovien/xem_phan_hoi',[TeacherController::class,'view_feed_back'])->name('xem_phan_hoi');
