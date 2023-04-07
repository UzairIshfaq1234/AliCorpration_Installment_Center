<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\Customer;
use App\Http\Controllers\Download;
use App\Http\Controllers\Installment;
use App\Http\Controllers\PrintInstallment;
use App\Http\Controllers\ajax;

use App\Http\Controllers\blading;


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

Route::get('/', [Authentication::class, 'loginView'])->name('view.loginView');
Route::post('/', [Authentication::class, 'login'])->name('view.login');

Route::get('/logout', [Authentication::class, 'logout'])->name('logout');

// --------------------Admin----------------
Route::get('/Admin', [Admin::class, 'AdminView'])->name('view.admin');
Route::post('/Admin', [Admin::class, 'AdminAdd'])->name('add.admin');
Route::get('/AllAdmin', [Admin::class, 'AllAdminView'])->name('view.alladmin');
Route::get('/AllAdmin/{id}', [Admin::class, 'DeleteAdmin'])->name('view.delete');
Route::get('/UpdateAdmin/{id}', [Admin::class, 'UpdateAdmin'])->name('view.updateadmin');
Route::get('/UpdateAdmin', [Admin::class, 'AllAdminView'])->name('view.updateA');
Route::post('/UpdateAdmin', [Admin::class, 'UpdateAdminForm'])->name('view.updateadminform');

// --------------------Customer----------------
Route::get('/Customer', [Customer::class, 'CustomerView'])->name('view.customer');
Route::post('/Customer', [Customer::class, 'CustomerAdd'])->name('add.customer');
Route::get('/AllCustomer', [Customer::class, 'AllCustomerView'])->name('view.allcustomer');
Route::get('/AllCustomer/{id}', [Customer::class, 'DeleteCustomer'])->name('view.deleteC');

Route::get('/UpdateCustomer/{id}', [Customer::class, 'UpdateCustomer'])->name('view.updatecustomer');

Route::get('/UpdateCustomer', [Customer::class, 'AllCustomerView'])->name('view.updateC');
Route::post('/UpdateCustomer', [Customer::class, 'UpdateCustomerForm'])->name('view.updatecustomerform');


//----------------- Installment -------------------
Route::get('/Installment/{id}/{statuserror?}', [Installment::class, 'AllInstallmentView'])->name('view.installment');
Route::get('/InstallmentStatus/{id}/{status}/{customer}', [Installment::class, 'InstallmentStatus'])->name('view.installmentstatus');


Route::get('/TodayInstallment', [Installment::class, 'TodayInstallmentView'])->name('view.todayinstallment');
Route::get('/PendingInstallment', [Installment::class, 'PendingInstallmentView'])->name('view.pendinginstallment');

//----------------- Download -------------------
Route::get('/DownloadinstallDetails/{id}', [PrintInstallment::class, 'installmentprint']);


Route::get('/DownloadCustomerDetails/{id}', [Download::class, 'CustomerDownload'])->name('view.customerdownload');



//--------------- ajax

Route::get('/ajaxview', [ajax::class, 'ajaxview'])->name('view.ajaxview');


Route::get('/master', [blading::class, 'index'])->name('view.blade.index');
Route::get('/master2', [blading::class, 'index2'])->name('view.blade2.index');
