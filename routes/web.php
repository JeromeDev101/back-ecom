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

    // Faculty
    Route::get('faculty-profile', FacultyView::class)->name('faculty.index');

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
