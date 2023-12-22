<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\RombelController;
use App\Http\Controllers\Backend\UstadzController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Aadmin Group Middleware
Route::middleware(['auth','role:superadmin|admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

}); // End Group Admin Middleware

// Agent Group Middleware
Route::middleware(['auth','roles:agent'])->group(function(){

    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');

}); // End Group Agent Middleware

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// Aadmin Group Middleware
Route::middleware(['auth','role:superadmin|admin'])->group(function(){
    //Property Type All Route
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type','AllType')->name('all.type')->middleware('permission:all.type');
        Route::get('/add/type','AddType')->name('add.type')->middleware('permission:add.type');
        Route::post('/store/type','StoreType')->name('store.type')->middleware('permission:all.type');
        Route::get('/edit/type/{id}','EditType')->name('edit.type');
        Route::post('/update/type','UpdateType')->name('update.type');
        Route::get('/delete/type/{id}','DeleteType')->name('delete.type');
    });

    //Amenities All Route
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/amenitie','AllAmenitie')->name('all.amenitie')->middleware('permission:all.amenities');
        Route::get('/add/amenitie','AddAmenitie')->name('add.amenitie')->middleware('permission:add.amenities');
        Route::post('/store/amenitie','StoreAmenitie')->name('store.amenitie');
        Route::get('/edit/amenitie/{id}','EditAmenitie')->name('edit.amenitie')->middleware('permission:edit.amenities');
        Route::post('/update/amenitie','UpdateAmenitie')->name('update.amenitie')->middleware('permission:update.amenities');
        Route::get('/delete/amenitie/{id}','DeleteAmenitie')->name('delete.amenitie')->middleware('permission:delete.amenities');
    });

    //Permission All Route
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission','AllPermission')->name('all.permission')
            ->middleware('permission:all.permission');
        Route::get('/add/permission','AddPermission')->name('add.permission')
            ->middleware('permission:add.permission');
        Route::post('/store/permission','StorePermission')->name('store.permission')
            ->middleware('permission:store.permission');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission')
            ->middleware('permission:edit.permission');
        Route::post('/update/permission','UpdatePermission')->name('update.permission')
            ->middleware('permission:update.permission');
        Route::get('/delete/permission/{id}','DeletePermission')->name('delete.permission')
            ->middleware('permission:delete.permission');
        Route::get('/import/permission','ImportPermission')->name('import.permission')
            ->middleware('permission:import.permission');
        Route::get('/export','Export')->name('export')
            ->middleware('permission:export.permission');
        Route::post('/import','Import')->name('import');
    });

    //Roles All Route
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/roles','AllRoles')->name('all.roles')->middleware('permission:all.roles');
        Route::get('/add/roles','AddRoles')->name('add.roles')->middleware('permission:add.roles');
        Route::post('/store/roles','StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}','EditRoles')->name('edit.roles')->middleware('permission:edit.roles');
        Route::post('/update/roles','UpdateRoles')->name('update.roles')->middleware('permission:update.roles');
        Route::get('/delete/roles/{id}','DeleteRoles')->name('delete.roles')->middleware('permission:delete.roles');
        Route::get('/import/roles','ImportRoles')->name('import.roles')->middleware('permission:import.roles');

        Route::get('/add/roles/permission','AddRolesPermission')->name('add.roles.permission')->middleware('permission:add.rolespermission');
        Route::get('/all/roles/permission','AllRolesPermission')->name('all.roles.permission')->middleware('permission:all.rolespermission');
        Route::post('/roles/permission/store','RolePermissionStore')->name('role.permission.store');

        Route::get('/admin/edit/roles/{id}','AdminEditRoles')->name('admin.edit.roles')
            ->middleware('permission:edit.adminroles')
            ;
        Route::post('/admin/rules/update/{id}','AdminRolesUpdate')->name('admin.roles.update')
            ->middleware('permission:update.adminroles')
            ;
        Route::get('/admin/delete/roles/{id}','AdminDeleteRoles')->name('admin.delete.roles')
            ->middleware('permission:delete.adminroles')
            ;
    });

    //Admin User All Route
    Route::controller(AdminController::class)->group(function(){
        Route::get('/all/admin','AllAdmin')->name('all.admin')->middleware('permission:all.admin');
        Route::get('/add/admin','AddAdmin')->name('add.admin')->middleware('permission:add.admin');
        Route::post('/store/admin','StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}','EditAdmin')->name('edit.admin')->middleware('permission:edit.admin');
        Route::post('/update/admin/{id}','UpdateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}','DeleteAdmin')->name('delete.admin')->middleware('permission:delete.admin');
    });

    //Ustadz Ustadzah All Route
    Route::controller(UstadzController::class)->group(function(){
        Route::get('/admin/ustadz/list','UstadzList')->name('all.ustadz')->middleware('permission:ustadz.list');
        Route::get('/admin/ustadz/add','AddUstadz')->name('add.ustadz')->middleware('permission:ustadz.add');
        Route::post('/admin/ustadz/store','StoreUstadz')->name('store.ustadz')->middleware('permission:ustadz.store');
        Route::get('/admin/ustadz/edit/{id}','EditUstadz')->name('edit.ustadz')->middleware('permission:ustadz.edit');
        Route::post('/admin/ustadz/update','UpdateUstadz')->name('update.ustadz')->middleware('permission:ustadz.update');

    });


}); // End Group Admin Middleware
