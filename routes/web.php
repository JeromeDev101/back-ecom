<?php

use App\Livewire\Curriculum\CurriculumView;
use App\Livewire\EventsAccomplish\EventsAccomplishView;
use App\Livewire\Faculty\FacultyView;
use App\Livewire\FacultyStaff\FacultyStaffView;
use App\Livewire\InfrastructureDevelopment\InfrastructureDevelopmentView;
use App\Livewire\Linkage\LinkageView;
use App\Livewire\Products\ProductCreate;
use App\Livewire\Products\ProductEdit;
use App\Livewire\Products\ProductView;
use App\Livewire\ResearchExtension\ResearchExtensionView;
use App\Livewire\RolesPermission\PermissionsCreate;
use App\Livewire\RolesPermission\PermissionsEdit;
use App\Livewire\RolesPermission\RolesCreate;
use App\Livewire\RolesPermission\RolesEdit;
use App\Livewire\RolesPermission\RolesPermissionView;
use App\Livewire\StudentDevelopment\StudentDevelopmentView;
use App\Livewire\StudentProfile\StudentProfileView;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
->group(function () {

    // Products
    Route::get('/products', ProductView::class)->name('products.index');
    Route::get('/products/create', ProductCreate::class)->name('products.create');
    Route::get('/products/edit/{id}', ProductEdit::class)->name('products.edit');

    // Roles and Permission
    Route::group(['middleware' =>
        ['can:read roles and permission, create roles and permission, update roles and permission, delete roles and permission']]
        , function() {
        Route::get('/roles-and-permission', RolesPermissionView::class)->name('roles-permission.index');
        Route::get('/roles-and-permission/role/create', RolesCreate::class)->name('roles.create');
        Route::get('/roles-and-permission/role/edit/{id}', RolesEdit::class)->name('roles.edit');
        Route::get('/roles-and-permission/permission/create', PermissionsCreate::class)->name('permissions.create');
        Route::get('/roles-and-permission/permission/edit/{id}', PermissionsEdit::class)->name('permissions.edit');
    });


    // Faculty
    Route::group(['middleware' =>
        ['can:read faculty profile, create faculty profile, update faculty profile, delete faculty profile']]
        , function() {
        Route::get('/faculty-profile', FacultyView::class)->name('faculty.index');
    });

    // Curriculum
    Route::group(['middleware' =>
        ['can:read curriculum, create curriculum, update curriculum, delete curriculum']]
        , function() {
        Route::get('/curriculum', CurriculumView::class)->name('curriculum.index');
    });

    // Student Profile
    Route::group(['middleware' =>
        ['can:read student profile, create student profile, update student profile, delete student profile']]
        , function() {
        Route::get('/student-profile', StudentProfileView::class)->name('student-profile.index');
    });

    // Faculty and Staff
    Route::group(['middleware' =>
        ['can:read faculty staff, create faculty staff, update faculty staff, delete faculty staff']]
        , function() {
        Route::get('/faculty-and-staff', FacultyStaffView::class)->name('faculty-staff.index');
    });

    // Student Development
    Route::group(['middleware' =>
        ['can:read student dev, create student dev, update student dev, delete student dev']]
        , function() {
        Route::get('/student-development', StudentDevelopmentView::class)->name('student-development.index');
    });

    // Research and Extension
    Route::group(['middleware' =>
        ['can:read research ext, create research ext, update research ext, delete research ext']]
        , function() {
        Route::get('/research-and-extension', ResearchExtensionView::class)->name('research-extension.index');
    });

    // Linkages
    Route::group(['middleware' =>
        ['can:read linkages, create linkages, update linkages, delete linkages']]
        , function() {
        Route::get('/linkages', LinkageView::class)->name('linkages.index');
    });

    // Infrastructure Development
    Route::group(['middleware' =>
        ['can:read infra dev, create infra dev, update infra dev, delete infra dev']]
        , function() {
        Route::get('/infrastructure-development', InfrastructureDevelopmentView::class)->name('infrastructure-development.index');
    });

    // Events and Accomplishments
    Route::group(['middleware' =>
        ['can:read events accomplish, create events accomplish, update events accomplish, delete events accomplish']]
        , function() {
        Route::get('/events-accomplishment', EventsAccomplishView::class)->name('events-accomplishment.index');
    });

});
