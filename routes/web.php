<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\DefaultController;
use App\Models\User;


Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});

// Route::middleware('auth')->group(function(){

 // Admin All Route 
Route::controller(AdminController::class)->middleware('admin')->group(function () {
    Route::get('/admin/alle-gebruikers', 'ProfileAll')->name('admin.all');
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile/{id}', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    Route::get('/delete/profile/{id}', 'DeleteProfile')->name('delete.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
    Route::get('/admin/instellingen', 'Instellingen')->name('admin.instellingen');
     
});

 // Leverancier routes
 Route::controller(SupplierController::class)->group(function () {
    Route::get('/leveranciers/alle', 'SupplierAll')->name('supplier.all');
    Route::get('/leveranciers/toevoegen', 'SupplierAdd')->name('supplier.add');
    Route::post('/leveranciers/opslaan', 'SupplierStore')->name('supplier.store');
    Route::get('/leveranciers/bewerken/{id}', 'SupplierEdit')->name('supplier.edit');
    Route::post('/leveranciers/update', 'SupplierEdit')->name('supplier.update');
    Route::get('/leveranciers/verwijderen/{id}', 'SupplierDelete')->name('supplier.delete');

     
});

 // Klant routes
 Route::controller(CustomerController::class)->group(function () {
    Route::get('/klanten/alle', 'CustomerAll')->name('customer.all');
    Route::get('/klanten/toevoegen', 'CustomerAdd')->name('customer.add');
    Route::post('/klanten/opslaan', 'CustomerStore')->name('customer.store');
    Route::get('/klanten/bewerken/{id}', 'CustomerEdit')->name('customer.edit');
    Route::post('/klanten/update', 'CustomerUpdate')->name('customer.update');
    Route::get('/klanten/verwijderen/{id}', 'CustomerDelete')->name('customer.delete');

     
});

// Producten routes
Route::controller(ProductController::class)->group(function () {
    Route::get('/producten/alle', 'ProductAll')->name('product.all');
    Route::get('/producten/toevoegen', 'ProductAdd')->name('product.add');
    Route::post('/producten/opslaan', 'ProductStore')->name('product.store');
    Route::get('/producten/bewerken/{id}', 'ProductEdit')->name('product.edit');
    Route::post('/producten/update', 'ProductUpdate')->name('product.update');
    Route::get('/producten/verwijderen/{id}', 'ProductDelete')->name('product.delete');

});

// Eenheden routes
Route::controller(UnitController::class)->group(function () {
    Route::get('/eenheden/alle', 'UnitAll')->name('unit.all');
    Route::get('/eenheden/toevoegen', 'UnitAdd')->name('unit.add');
    Route::post('/eenheden/opslaan', 'UnitStore')->name('unit.store');
    Route::get('/eenheden/bewerken/{id}', 'UnitEdit')->name('unit.edit');
    Route::post('/eenheden/update', 'UnitUpdate')->name('unit.update');
    Route::get('/eenheden/verwijderen/{id}', 'UnitDelete')->name('unit.delete');

});

// Categorie routes
Route::controller(CategoryController::class)->group(function () {
    Route::get('/categorieen/alle', 'CategoryAll')->name('category.all');
    Route::get('/categorieen/toevoegen', 'CategoryAdd')->name('category.add');
    Route::post('/categorieen/opslaan', 'CategoryStore')->name('category.store');
    Route::get('/categorieen/bewerken/{id}', 'CategoryEdit')->name('category.edit');
    Route::post('/categorieen/update', 'CategoryUpdate')->name('category.update');
    Route::get('/categorieen/verwijderen/{id}', 'CategoryDelete')->name('category.delete');

});

// Opdrachten routes
Route::controller(PurchaseController::class)->group(function () {
    Route::get('/opdrachten/alle', 'PurchaseAll')->name('purchase.all');
    Route::get('/opdrachten/toevoegen', 'PurchaseAdd')->name('purchase.add');
    

});

// Default routes
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-category', 'GetCategory')->name('get-category');
    Route::get('/get-product', 'GetProduct')->name('get-product');
    
    

});



Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
