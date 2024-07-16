<?php

use App\Livewire\Curriculum\CurriculumView;
use App\Livewire\EventsAccomplish\EventsAccomplishView;
use App\Livewire\Faculty\FacultyCreate;
use App\Livewire\Faculty\FacultyEdit;
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
    Route::get('/roles-and-permission', RolesPermissionView::class)->name('roles-permission.index');
    Route::get('/roles-and-permission/role/create', RolesCreate::class)->name('roles.create');
    Route::get('/roles-and-permission/role/edit/{id}', RolesEdit::class)->name('roles.edit');
    Route::get('/roles-and-permission/permission/create', PermissionsCreate::class)->name('permissions.create');
    Route::get('/roles-and-permission/permission/edit/{id}', PermissionsEdit::class)->name('permissions.edit');

    // Faculty
    Route::get('/faculty-profile', FacultyView::class)->name('faculty.index');
    Route::get('/faculty-profile/create', FacultyCreate::class)->name('faculty.create');
    Route::get('/faculty-profile/edit/{id}', FacultyEdit::class)->name('faculty.edit');

    // Curriculum
    Route::get('/curriculum', CurriculumView::class)->name('curriculum.index');

    // Student Profile
    Route::get('/student-profile', StudentProfileView::class)->name('student-profile.index');

    // Faculty and Staff
    Route::get('/faculty-and-staff', FacultyStaffView::class)->name('faculty-staff.index');

    // Student Development
    Route::get('/student-development', StudentDevelopmentView::class)->name('student-development.index');

    // Research and Extension
    Route::get('/research-and-extension', ResearchExtensionView::class)->name('research-extension.index');

    // Linkages
    Route::get('/linkages', LinkageView::class)->name('linkages.index');

    // Infrastructure Development
    Route::get('/infrastructure-development', InfrastructureDevelopmentView::class)->name('infrastructure-development.index');

    // Events and Accomplishments
    Route::get('/events-accomplishment', EventsAccomplishView::class)->name('events-accomplishment.index');

});
