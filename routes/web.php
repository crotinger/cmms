<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ServiceOrderController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Welcome Page
Route::get('/', fn() => view('welcome'));

require __DIR__.'/auth.php';

// Workaround for Admin Dashboard
Route::middleware(['auth', 'role:super-admin'])
    ->get('/dashboard', [AdminController::class, 'dashboard'])
    ->name('dashboard');

// Admin (Super-Admin only)
Route::middleware(['auth', 'role:super-admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('employees', EmployeeController::class);
    });

// Sales (Sales Manager | Sales Representative | Super-Admin)
Route::middleware(['auth', 'role:sales-manager|sales-representative|super-admin'])
    ->prefix('sales')
    ->name('sales.')
    ->group(function () {
        Route::resource('/', SaleController::class)
             ->parameters(['' => 'sale']);
    });

// Service (Service Manager | Service Technician | Super-Admin)
Route::middleware(['auth', 'role:service-manager|service-technician|super-admin'])
    ->prefix('service')
    ->name('service.')
    ->group(function () {
        Route::resource('orders', ServiceOrderController::class);
        Route::get('calendar', fn() => view('service.calendar'))->name('calendar');
    });

// Inventory (Inventory Manager | Super-Admin)
Route::middleware(['auth', 'role:inventory-manager|super-admin'])
    ->prefix('inventory')
    ->name('inventory.')
    ->group(function () {
        Route::resource('items', InventoryItemController::class);
    });

// Customer Portal (Customer | Super-Admin)
Route::middleware(['auth', 'role:customer|super-admin'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {
        Route::resource('customers', CustomerController::class);
    });
//Logout Function
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

//Permission Management
Route::middleware(['auth', 'role:super-admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('roles', [RolePermissionController::class, 'index'])->name('roles.index');
        Route::post('roles', [RolePermissionController::class, 'store'])->name('roles.store');
        Route::get('roles/{role}/edit', [RolePermissionController::class, 'edit'])->name('roles.edit');
        Route::put('roles/{role}', [RolePermissionController::class, 'update'])->name('roles.update');
        Route::delete('roles/{role}', [RolePermissionController::class, 'destroy'])->name('roles.destroy');

        Route::get('users/{user}/permissions', [RolePermissionController::class, 'editUserPermissions'])->name('users.permissions.edit');
        Route::post('users/{user}/permissions', [RolePermissionController::class, 'updateUserPermissions'])->name('users.permissions.update');
    });
//post login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

