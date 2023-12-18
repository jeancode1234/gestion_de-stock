<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Auth::routes();
Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::prefix('admin')->middleware(['auth','gestionnaire'])->group(function(){
      //Routes pour les categories 
    Route::get('/categories',[App\Http\Controllers\CategoryController::class,'index'])->name('categorie');
    Route::get('/categories/create',[App\Http\Controllers\CategoryController::class,'create'])->name('categorie.create');
    Route::get('/categories/show/{category}',[App\Http\Controllers\CategoryController::class,'show'])->name('categorie.show');
    Route::get('/categories/edit/{category}',[App\Http\Controllers\CategoryController::class,'edit'])->name('categorie.edit');
    Route::delete('/categories/delete/{category}',[App\Http\Controllers\CategoryController::class,'destroy'])->name('categorie.delete');
    Route::put('/categories/update/{category}',[App\Http\Controllers\CategoryController::class,'update'])->name('categorie.update');
    Route::post('/categories/store',[App\Http\Controllers\CategoryController::class,'store'])->name('categorie.store');
    Route::resource('/produits',\App\Http\Controllers\ProduitController::class);
    Route::get('/commandes',[\App\Http\Controllers\CommandeController::class,'index'])->name('commandes');
    Route::get('/ventes',[\App\Http\Controllers\SortirController::class,'index'])->name('ventes');
    Route::delete('/ventes/{sortir}',[\App\Http\Controllers\SortirController::class,'destroy'])->name('vente.destroy');
    Route::get('/clients',[\App\Http\Controllers\UserController::class,'index'])->name('clients');
    Route::delete('/clients/{id}',[\App\Http\Controllers\UserController::class,'destroy'])->name('client.delete');
    Route::resource('/fournisseurs',\App\Http\Controllers\FournisseurController::class);
    Route::resource('/entrers',\App\Http\Controllers\EntrerController::class);
});
Route::prefix('client')->middleware(['auth','client'])->group(function(){
  Route::post('/commande/{produit}',[App\Http\Controllers\CommandeController::class,'store'])->name('commande.store');
  Route::get('/Mescommandes',[App\Http\Controllers\CommandeController::class,'Mescommandes'])->name('commande.mescommandes');
  Route::delete('/Mescommandes/destroy/{commande}',[App\Http\Controllers\CommandeController::class,'destroy'])->name('commande.destroy');
 //  Route::delete('/Mescommandes/destroy/{commande}',[App\Http\Controllers\CommandeController::class,'annulerAllCommande'])->name('commande.Alldestroy');
  
   Route::get('/generer-facture/{commandeId}', [\App\Http\Controllers\SortirController::class,'genererFacture'])->name('facture');
  Route::post('/Achat/commande/{commande}',[\App\Http\Controllers\SortirController::class,'store'])->name('vente.commande');
  Route::get('/mesAchats',[\App\Http\Controllers\SortirController::class,'Mesachats'])->name('vente.mesachats');
  
});