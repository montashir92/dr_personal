<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\AppointmentController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CasecatController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\LatestcaseController;
use App\Http\Controllers\Backend\OurpolicyController;
use App\Http\Controllers\Backend\OurteamController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\HomeController;
use App\Models\Slider;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
//Service Rotes
Route::get('/services', [HomeController::class, 'service'])->name('services');
Route::get('/services/show/{id}', [HomeController::class, 'detailService'])->name('service.show');

//Blog Routes
Route::get('/blog', [HomeController::class, 'blog'])->name('blogs');
Route::get('/blog/show/{id}', [HomeController::class, 'blogDetail'])->name('blog.details');


//Contact Routes
Route::get('/contact', [HomeController::class, 'contact'])->name('contacts');
Route::post('/contact/send', [HomeController::class, 'contactSend'])->name('contact.message');

Route::get('/appointment', [HomeController::class, 'appointment'])->name('appointments');

// appointment routes
Route::post('/send-appointment', [HomeController::class, 'sendAppointment'])->name('send.appointment');

//Latest Case Details Routes
Route::get('/latestcase/detail/{id}', [HomeController::class, 'viewLatest'])->name('latestcase.details');


// Admin Dashboard Routes
Route::middleware(['auth:sanctum', 'verified', 'adminAuth'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    //Profile Routes
    Route::get('/admin/profile', [AdminDashboardController::class, 'profile'])->name('user.profile');
    Route::post('/admin/profile/update', [AdminDashboardController::class, 'profileUpdate'])->name('user.profile.update');
    Route::get('/admin/change/password', [AdminDashboardController::class, 'editPassword'])->name('user.change.password');
    Route::post('/admin/change/password/update', [AdminDashboardController::class, 'updatePassword'])->name('user.update.password');

    //Categories Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/category/inactive/{id}', [CategoryController::class, 'inactive'])->name('admin.category.inactive');
    Route::get('/category/active/{id}', [CategoryController::class, 'active'])->name('admin.category.active');
    Route::post('/category/delete', [CategoryController::class, 'delete'])->name('admin.category.delete');

    //Slider Routes
    Route::get('/sliders', [SliderController::class, 'index'])->name('admin.sliders');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('admin.slider.create');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('admin.slider.store');
    Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('admin.slider.edit');
    Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('admin.slider.update');
    Route::get('/slider/inactive/{id}', [SliderController::class, 'inactive'])->name('admin.slider.inactive');
    Route::get('/slider/active/{id}', [SliderController::class, 'active'])->name('admin.slider.active');
    Route::post('/slider/delete', [SliderController::class, 'delete'])->name('admin.slider.delete');

    //About Routes
    Route::get('/abouts', [AboutController::class, 'index'])->name('admin.abouts');
    Route::get('/about/create', [AboutController::class, 'create'])->name('admin.about.create');
    Route::post('/about/store', [AboutController::class, 'store'])->name('admin.about.store');
    Route::get('/about/edit/{id}', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::post('/about/update/{id}', [AboutController::class, 'update'])->name('admin.about.update');
    Route::post('/about/delete', [AboutController::class, 'delete'])->name('admin.about.delete');

    //Appointment Routes
    Route::get('/appoint-list', [AppointmentController::class, 'index'])->name('admin.appoints');
    Route::post('/appoint/delete', [AppointmentController::class, 'delete'])->name('admin.appoint.delete');

    //Service Routes
    Route::get('/service', [ServiceController::class, 'index'])->name('admin.services');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('admin.service.create');
    Route::post('/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
    Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
    Route::post('/service/update/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
    Route::post('/service/delete', [ServiceController::class, 'delete'])->name('admin.service.delete');

    //Our team Routes
    Route::get('/ourteams', [OurteamController::class, 'index'])->name('admin.ourteams');
    Route::get('/ourteam/create', [OurteamController::class, 'create'])->name('admin.ourteam.create');
    Route::post('/ourteam/store', [OurteamController::class, 'store'])->name('admin.ourteam.store');
    Route::get('/ourteam/edit/{id}', [OurteamController::class, 'edit'])->name('admin.ourteam.edit');
    Route::post('/ourteam/update/{id}', [OurteamController::class, 'update'])->name('admin.ourteam.update');
    Route::post('/ourteam/delete', [OurteamController::class, 'delete'])->name('admin.ourteam.delete');

    //Our Policy Routes
    Route::get('/policy', [OurpolicyController::class, 'index'])->name('admin.policy');
    Route::get('/policy/create', [OurpolicyController::class, 'create'])->name('admin.policy.create');
    Route::post('/policy/store', [OurpolicyController::class, 'store'])->name('admin.policy.store');
    Route::get('/policy/edit/{id}', [OurpolicyController::class, 'edit'])->name('admin.policy.edit');
    Route::post('/policy/update/{id}', [OurpolicyController::class, 'update'])->name('admin.policy.update');
    Route::post('/policy/delete', [OurpolicyController::class, 'delete'])->name('admin.policy.delete');

    //Blog Routes
    Route::get('/blogs', [BlogController::class, 'index'])->name('admin.blogs');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::get('/blog/inactive/{id}', [BlogController::class, 'inactive'])->name('admin.blog.inactive');
    Route::get('/blog/active/{id}', [BlogController::class, 'active'])->name('admin.blog.active');
    Route::post('/blog/delete', [BlogController::class, 'delete'])->name('admin.blog.delete');

    //Contact Message Routes
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts');
    Route::post('/contacts/delete', [ContactController::class, 'delete'])->name('admin.contact.delete');

    //Setting Routes
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings');
    Route::post('/setting/update/{id}', [SettingController::class, 'update'])->name('admin.setting.update');

    //Case Category Routes
    Route::get('/casecats', [CasecatController::class, 'index'])->name('admin.casecats');
    Route::get('/casecat/create', [CasecatController::class, 'create'])->name('admin.casecat.create');
    Route::post('/casecat/store', [CasecatController::class, 'store'])->name('admin.casecat.store');
    Route::get('/casecat/edit/{id}', [CasecatController::class, 'edit'])->name('admin.casecat.edit');
    Route::post('/casecat/update/{id}', [CasecatController::class, 'update'])->name('admin.casecat.update');
    Route::post('/casecat/delete', [CasecatController::class, 'delete'])->name('admin.casecat.delete');

    //Latest Case Routes
    Route::get('/lastestcases', [LatestcaseController::class, 'index'])->name('admin.lastestcases');
    Route::get('/lastestcase/create', [LatestcaseController::class, 'create'])->name('admin.lastestcase.create');
    Route::post('/lastestcase/store', [LatestcaseController::class, 'store'])->name('admin.lastestcase.store');
    Route::get('/lastestcase/edit/{id}', [LatestcaseController::class, 'edit'])->name('admin.lastestcase.edit');
    Route::post('/lastestcase/update/{id}', [LatestcaseController::class, 'update'])->name('admin.lastestcase.update');
    Route::post('/lastestcase/delete', [LatestcaseController::class, 'delete'])->name('admin.lastestcase.delete');

});
