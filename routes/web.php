<?php
// namespace App\Http\Controllers\Auth;

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


Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth'], function(){

        //dashboard
        Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard.index');
        //permissions
        Route::resource('/permission', 'App\Http\Controllers\Admin\PermissionController', ['except' => ['show', 'create', 'edit', 'update', 'delete'] ,'as' => 'admin']);
        //roles
        Route::resource('/role', 'App\Http\Controllers\Admin\RoleController', ['except' => ['show'] ,'as' => 'admin']);
        //users
        Route::resource('/user', 'App\Http\Controllers\Admin\UsersController', ['except' => ['show'] ,'as' => 'admin']);
        //tags
        Route::resource('/tag', 'App\Http\Controllers\Admin\TagController', ['except' => 'show' ,'as' => 'admin']);
        //categories
        Route::resource('/category', 'App\Http\Controllers\Admin\CategoryController', ['except' => 'show' ,'as' => 'admin']);
        //posts
        Route::resource('/post', 'App\Http\Controllers\Admin\PostController', ['except' => 'show' ,'as' => 'admin']);
        //event
        Route::resource('/event', 'App\Http\Controllers\Admin\EventController', ['except' => 'show' ,'as' => 'admin']);
        //photo
        Route::resource('/photo', 'App\Http\Controllers\Admin\PhotoController', ['except' => ['show', 'create', 'edit', 'update'] ,'as' => 'admin']);
        //video
        Route::resource('/video', 'App\Http\Controllers\Admin\VideoController', ['except' => 'show' ,'as' => 'admin']);
        //slider
        Route::resource('/slider', 'App\Http\Controllers\Admin\SliderController', ['except' => ['show', 'create', 'edit', 'update'] ,'as' => 'admin']);

        Route::group(['prefix' => 'my_account'], function() {
            Route::get('/', [App\Http\Controllers\Admin\MyAccountController::class, 'index'])->name('admin.my_account.index');
            Route::post('/', [App\Http\Controllers\Admin\MyAccountController::class, 'update_profile'])->name('admin.my_account.update_profile');
            Route::get('/edit_password', [App\Http\Controllers\Admin\MyAccountController::class, 'edit_password'])->name('admin.my_account.edit_password');
            Route::post('/edit_password', [App\Http\Controllers\Admin\MyAccountController::class, 'update_password'])->name('admin.my_account.update_password');
        });

        Route::group(['prefix' => 'setting'], function() {
            Route::get('/', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.setting.index');
            Route::post('/', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.setting.update');
        });

        Route::resource('/classes', 'App\Http\Controllers\Admin\MyClassController', ['as' => 'admin']);
        Route::resource('/students', 'App\Http\Controllers\Admin\StudentRecordController', ['as' => 'admin']);
        
        // Route::group(['prefix' => 'students'], function() {
        //     Route::get('/', [App\Http\Controllers\Admin\MyClassController::class, 'index'])->name('admin.classes.index');
        //     //Route::get('/', [App\Http\Controllers\Admin\MyClassController::class, 'edit'])->name('admin.classes.edit');
            //Route::post('/', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.setting.update');
        //});

    });

});
