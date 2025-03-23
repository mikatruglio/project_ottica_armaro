<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PromotionsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/chi_siamo', [PublicController::class, 'chiSiamo'])->name('chiSiamo');
Route::get('/prodotti', [PublicController::class, 'prodotti'])->name('prodotti');
Route::get('/contattaci', [PublicController::class, 'contattaci'])->name('contattaci');
Route::get('/servizi', [PublicController::class, 'servizi'])->name('servizi');
Route::get('/i_nostri_marchi', [PublicController::class, 'ourBrand'])->name('ourBrand');

Route::get('/promotions', [PromotionsController::class, 'show'])->name('promotions');
Route::get('/settings', [PromotionsController::class, 'create'])->name('settings')->middleware('admin');
Route::get('/edit/{promotion}', [PromotionsController::class, 'edit'])->name('edit');
Route::post('/settings', [PromotionsController::class, 'store'])->name('promotions_store');
Route::delete('promotions/delete/{promotion}', [PromotionsController::class, 'destroy'])->name('delete');
Route::put('edit/{promotion}', [PromotionsController::class, 'update'])->name('edit.update');


Route::get('/assign-admin', [RoleController::class, 'assignAdminRole'])->name('assign.admin');