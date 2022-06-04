<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\SkillCategoryController;
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

Route::get('/admin/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');

    /** Skills Categories CRUD routes */
    Route::get('/skills/categories', [SkillCategoryController::class, 'index'])->name('admin.skill.category.index');
    Route::get('/skills/category/create', [SkillCategoryController::class, 'create'])->name('admin.skill.category.create');
    Route::post('/skills/category/store', [SkillCategoryController::class, 'store'])->name('admin.skill.category.store');
    Route::delete('/skills/category/delete', [SkillCategoryController::class, 'delete'])->name('admin.skill.category.delete');
    Route::get('/skills/category/edit/{id}', [SkillCategoryController::class, 'edit'])->name('admin.skill.category.edit');
    Route::post('/skills/category/update', [SkillCategoryController::class, 'update'])->name('admin.skill.category.update');
});