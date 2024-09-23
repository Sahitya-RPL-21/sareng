<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\SantriRegistrationController;
use App\Http\Controllers\WaliSantriController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PengumumanSantriController;

/*
|-----------------------------------------------------------------------
| Web Routes
|-----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Session Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin-login');
Route::post('/admin/register', [AdminController::class, 'store'])->name('admin-register');
Route::post('/admin/login/auth', [AdminController::class, 'auth'])->name('admin-auth');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin-logout');

// Modul Admin
Route::get('/admin/santri', [AdminController::class, 'santri'])->name('admin-santri');
Route::get('/admin/wali/santri', [AdminController::class, 'wali_santri'])->name('admin-wali-santri');
Route::post('/admin/ajax_list', [AdminController::class, 'ajax_list'])->name('admin-ajax-list');
Route::get('/admin/adminsantri', [AdminController::class, 'adminsantri'])->name('admin-adminsantri');

// Modul Wali Santri
Route::post('/wali/santri/ajax_list', [WaliSantriController::class, 'ajax_list'])->name('wali-santri-ajax-list');
Route::post('/wali/santri/santri_select', [WaliSantriController::class, 'santri_select'])->name('santri-select');
Route::post('/wali/santri/ajax_add', [WaliSantriController::class, 'ajax_add'])->name('wali-santri-ajax-add');
Route::post('/wali/santri/ajax_update', [WaliSantriController::class, 'ajax_update'])->name('wali-santri-ajax-update');
Route::get('/wali/santri/ajax_edit/{id}', [WaliSantriController::class, 'ajax_edit'])->name('wali-santri-ajax-edit');
Route::get('/wali/ajax_delete/{id}', [WaliSantriController::class, 'ajax_delete'])->name('wali-santri-ajax-delete');

// Modul Santri
Route::post('/santri/ajax_list', [SantriController::class, 'ajax_list'])->name('santri-ajax-list');
Route::post('/santri/ajax_add', [SantriController::class, 'ajax_add'])->name('santri-ajax-add');
Route::post('/santri/ajax_update', [SantriController::class, 'ajax_update'])->name('santri-ajax-update');
Route::get('/santri/ajax_edit/{id}', [SantriController::class, 'ajax_edit'])->name('santri-ajax-edit');
Route::get('/santri/ajax_delete/{id}', [SantriController::class, 'ajax_delete'])->name('santri-ajax-delete');
Route::get('/santri/hitung_santri', [SantriController::class, 'hitung'])->name('santri-hitung');

// Registrasi Santri
Route::get('/santri-registration', [SantriRegistrationController::class, 'index'])->name('santri-registration');
Route::post('/santri-registration/store', [SantriRegistrationController::class, 'store'])->name('santri-registration-store');

// Route for printing PDF
Route::get('/print-pdf/{id}', [SantriRegistrationController::class, 'printPdf'])->name('print-pdf');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Modul Pengumuman Admin
Route::get('/admin/pengumuman', [PengumumanController::class, 'index'])->name('admin-pengumuman.index');
Route::get('/admin/pengumuman/create', [PengumumanController::class, 'create'])->name('admin-pengumuman.create');
Route::post('/admin/pengumuman', [PengumumanController::class, 'store'])->name('admin-pengumuman.store');
Route::get('/admin/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('admin-pengumuman.edit');
Route::post('/admin/pengumuman/{id}', [PengumumanController::class, 'update'])->name('admin-pengumuman.update');
Route::delete('/admin/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('admin-pengumuman.destroy');

// Modul Pengumuman Santri
Route::get('/santri/pengumuman', [PengumumanSantriController::class, 'index'])->name('santri.pengumuman');

