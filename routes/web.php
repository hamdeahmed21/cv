<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\portfolioCategoryController;
use App\Http\Controllers\SkillCategoryController;
use App\Http\Controllers\SkillsController;
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

    /** Skills CRUD routes */
    Route::get('/skills', [SkillsController::class, 'index'])->name('admin.skill.index');
    Route::get('/skills/create', [SkillsController::class, 'create'])->name('admin.skill.create');
    Route::post('/skills/store', [SkillsController::class, 'store'])->name('admin.skill.store');
    Route::delete('/skills/delete', [SkillsController::class, 'delete'])->name('admin.skill.delete');
    Route::get('/skills/edit/{id}', [SkillsController::class, 'edit'])->name('admin.skill.edit');
    Route::put('/skills/update', [SkillsController::class, 'update'])->name('admin.skill.update');
    /** Porftolio Categories CRUD routes */
    Route::get('/portfolio/categories', [portfolioCategoryController::class, 'index'])->name('admin.portfolio.category.index');
    Route::get('/portfolio/category/create', [portfolioCategoryController::class, 'create'])->name('admin.portfolio.category.create');
    Route::post('/portfolio/category/store', [portfolioCategoryController::class, 'store'])->name('admin.portfolio.category.store');
    Route::delete('/portfolio/category/delete', [portfolioCategoryController::class, 'delete'])->name('admin.portfolio.category.delete');
    Route::get('/portfolio/category/edit/{id}', [portfolioCategoryController::class, 'edit'])->name('admin.portfolio.category.edit');
    Route::put('/portfolio/category/update', [portfolioCategoryController::class, 'update'])->name('admin.portfolio.category.update');
    /** Skills CRUD routes */
    Route::get('/about/edit', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::put('/about/update', [AboutController::class, 'update'])->name('admin.about.update');
});