<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\about_usController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\OrderController;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

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
})->name('welcome');

Route::get('forgot_password', [ForgotPasswordController::class, 'showRequestForm'])->name('password.request');
Route::post('forgot_password', [ForgotPasswordController::class, 'update'])->name('password.update');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'registerUser']);

Route::get('loginMatch',[loginController::class, 'login'])->name('loginMatch');
Route::get('logout',[loginController::class, 'logout'])->name('logout');

Route::get('/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('user.profile.edit')->middleware('auth');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update')->middleware('auth');

Route::get('search', [PizzaController::class, 'search'])->name('search');

Route::get('home',[loginController::class, 'homePage'])->name('home');

Route::get('/menu',[CategorieController::class, 'showCategories_user']);

Route::get('/about_us',[about_usController::class, 'showAboutUs']);

Route::get('/categories/{id}/pizzas', [PizzaController::class, 'showPizzas'])->name('category.pizzas');
Route::get('pizza/{id}', [PizzaController::class, 'show'])->name('viewPizza');

Route::get('admin_home',[loginController::class, 'adminHomePage'])->name('admin_home');

Route::get('/admin_categories_list', [CategorieController::class, 'showCategories'])->name('admin_categories_list');
Route::post('/admin_categories_list', [CategorieController::class, 'add_categories']);

Route::get('/categorie/delete/{id}', [CategorieController::class, 'delete'])->name('categorie.delete');

Route::get('/categorie/trash', [CategorieController::class, 'view'])->name('categorie.trash');
Route::get('/categorie/restore/{id}', [CategorieController::class, 'restore'])->name('categorie.restore');
Route::get('/categorie/permanentDelete/{id}', [CategorieController::class, 'permanentDelete'])->name('categorie.permanentDelete');

Route::post('/categories/update/{id}', [CategorieController::class, 'update'])->name('categories.update');

Route::get('/admin_item_list', [PizzaController::class, 'showItem'])->name('admin_item_list');
Route::post('/admin_item_list', [PizzaController::class, 'add_Item']);

Route::get('/item/delete/{id}', [PizzaController::class, 'delete'])->name('item.delete');

Route::get('/item/trash', [PizzaController::class, 'view'])->name('item.trash');
Route::get('/item/restore/{id}', [PizzaController::class, 'restore'])->name('item.restore');
Route::get('/item/permanentDelete/{id}', [PizzaController::class, 'permanentDelete'])->name('item.permanentDelete');
 
Route::post('/pizzas/update/{id}', [PizzaController::class, 'update'])->name('pizzas.update'); 

Route::get('/admin_user_list', [UserController::class, 'showUser'])->name('admin_user_list');
Route::post('/admin_user_list', [UserController::class, 'newRegisterUser']);

Route::get('/user/delete/{id}', [UserController::class, 'u_delete'])->name('user.delete');

Route::get('/user/trash', [UserController::class, 'u_view'])->name('user.trash');
Route::get('/user/restore/{id}', [UserController::class, 'u_restore'])->name('user.restore');
Route::get('/user/permanentDelete/{id}', [UserController::class, 'u_permanentDelete'])->name('user.permanentDelete');

Route::get('/admin_admin_list', [UserController::class, 'showAdmin'])->name('admin_admin_list');
Route::post('/admin_admin_list', [UserController::class, 'newRegisterAdmin']);

Route::get('/admin/delete/{id}', [UserController::class, 'delete'])->name('admin.delete');

Route::get('/admin/trash', [UserController::class, 'view'])->name('admin.trash');
Route::get('/admin/restore/{id}', [UserController::class, 'restore'])->name('admin.restore');
Route::get('/admin/permanentDelete/{id}', [UserController::class, 'permanentDelete'])->name('admin.permanentDelete');

Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::post('/admin/users/{id}/update', [UserController::class, 'update'])->name('admin.users.update');

Route::post('/cart/add/{id}', [cartController::class, 'add'])->name('cart.add');
Route::get('/cart', [cartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove/{id}', [cartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [cartController::class, 'update'])->name('cart.update');
Route::post('/cart/clearCart', [cartController::class, 'clearCart'])->name('cart.clearCart');

Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('cart.placeOrder');

Route::get('/order-success', function () {
    return view('success');
})->name('order.success');

Route::get('/orders', [OrderController::class, 'userOrders'])->name('orders.index')->middleware('auth');

Route::get('admin_orders', [OrderController::class, 'index'])->name('admin.order');

Route::put('/orders/update-status/{id}', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
Route::put('/orders/update-delivery/{id}', [OrderController::class, 'updateDelivery'])->name('orders.updateDelivery');

Route::get('/admin/orders/report', [OrderController::class, 'report'])->name('admin.orders.report');

Route::get('/export-users', function () {
    return Excel::download(new UsersExport, 'users.xlsx');
});

Route::post('/import-users', [UserController::class, 'import']);

Route::get('/menu', [CategorieController::class, 'menu_filter'])->name('menu');

Route::get('/categories/{id}/pizzas_filter', [PizzaController::class, 'items_filter'])->name('category.pizzas_filter');

