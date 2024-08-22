<?php

use App\Http\Controllers\PdfController;
use App\Livewire\Curriculum\CurriculumView;
use App\Livewire\Curriculum\Pages\Academic;
use App\Livewire\Curriculum\Pages\AcademicCreate;
use App\Livewire\Curriculum\Pages\AcademicEdit;
use App\Livewire\Curriculum\Pages\Accreditation;
use App\Livewire\Curriculum\Pages\AccreditationCreate;
use App\Livewire\Curriculum\Pages\AccreditationEdit;
use App\Livewire\Curriculum\Pages\Banner;
use App\Livewire\Curriculum\Pages\BannerCreate;
use App\Livewire\Curriculum\Pages\BannerEdit;
use App\Livewire\Curriculum\Pages\CurriculumNatnlTvet;
use App\Livewire\Curriculum\Pages\CurriculumNatnlTvetCreate;
use App\Livewire\Curriculum\Pages\CurriculumNatnlTvetEdit;
use App\Livewire\Curriculum\Pages\CurriculumNatnlTvetFile;
use App\Livewire\Curriculum\Pages\CurriculumNatnlTvetFileCreate;
use App\Livewire\Curriculum\Pages\CurriculumNatnlTvetFileEdit;
use App\Livewire\Curriculum\Pages\CurriculumNumNatnlTvet;
use App\Livewire\Curriculum\Pages\CurriculumNumNatnlTvetCreate;
use App\Livewire\Curriculum\Pages\CurriculumNumNatnlTvetEdit;
use App\Livewire\Curriculum\Pages\Performance;
use App\Livewire\Curriculum\Pages\PerformanceCreate;
use App\Livewire\Curriculum\Pages\PerformanceEdit;
use App\Livewire\Department\Department;
use App\Livewire\Department\Pages\Create as DepartmentCreate;
use App\Livewire\Department\Pages\Edit as DepartmentEdit;
use App\Livewire\EventsAccomplish\EventsAccomplishView;
use App\Livewire\Faculty\FacultyCreate;
use App\Livewire\Faculty\FacultyEdit;
use App\Livewire\Faculty\FacultyView;
use App\Livewire\FacultyStaff\FacultyStaffView;
use App\Livewire\InfrastructureDevelopment\InfrastructureDevelopmentView;
use App\Livewire\Linkage\LinkageView;
use App\Livewire\Notification\Notification;
use App\Livewire\Products\ProductCreate;
use App\Livewire\Products\ProductEdit;
use App\Livewire\Products\ProductView;
use App\Livewire\Program\Program;
use App\Livewire\Program\Pages\Create as ProgramCreate;
use App\Livewire\Program\Pages\Edit as ProgramEdit;
use App\Livewire\ResearchExtension\ResearchExtensionView;
use App\Livewire\RolesPermission\PermissionsCreate;
use App\Livewire\RolesPermission\PermissionsEdit;
use App\Livewire\RolesPermission\PermissionView;
use App\Livewire\RolesPermission\RolesCreate;
use App\Livewire\RolesPermission\RolesEdit;
use App\Livewire\RolesPermission\RolesPermissionView;
use App\Livewire\StudentDevelopment\StudentDevelopmentView;
use App\Livewire\StudentProfile\StudentProfileView;
use App\Livewire\User\User;
use App\Livewire\User\Pages\Create as UserCreate;
use App\Livewire\User\Pages\Edit as UserEdit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/test', function () {
    event(new App\Events\NotificationEvent('hello world'));
    return 'event fired!';
});

// PDF templates
Route::prefix('pdf')->group(function() {
    Route::get('/curriculum-accreditation', [ PdfController::class, 'curriculumAccreditation']);
    Route::get('/curriculum-academic', [ PdfController::class, 'curriculumAcademic']);
    Route::get('/curriculum-performance', [ PdfController::class, 'curriculumPerformance']);
    Route::get('/curriculum-certification', [ PdfController::class, 'curriculumCertification']);
    Route::get('/curriculum-student-qualification', [ PdfController::class, 'curriculumQualification']);

    Route::get('/student-profile-enrollment', [ PdfController::class, 'studentEnrollment']);
    Route::get('/student-profile-graduates', [ PdfController::class, 'studentGraduates']);
    Route::get('/student-profile-scholarship', [ PdfController::class, 'studentScholarship']);
    Route::get('/student-profile-awards', [ PdfController::class, 'studentAwards']);
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
->group(function () {

    // Settings
    Route::prefix('settings')->group(function () {

        // Department
        Route::get('/departments', Department::class)->name('departments.index');
        Route::get('/departments/create', DepartmentCreate::class)->name('departments.create');
        Route::get('/departments/edit/{id}', DepartmentEdit::class)->name('departments.edit');

        // Program
        Route::get('/programs', Program::class)->name('programs.index');
        Route::get('/programs/create', ProgramCreate::class)->name('programs.create');
        Route::get('/programs/edit/{id}', ProgramEdit::class)->name('programs.edit');
    });

    // Notification
    Route::get('/notifications', Notification::class)->name('notifications.index');

    // Users
    Route::get('/users', User::class)->name('users.index');
    Route::get('/users/create', UserCreate::class)->name('users.create');
    Route::get('/users/edit/{id}', UserEdit::class)->name('users.edit');

    // Products
    Route::get('/products', ProductView::class)->name('products.index');
    Route::get('/products/create', ProductCreate::class)->name('products.create');
    Route::get('/products/edit/{id}', ProductEdit::class)->name('products.edit');

    // Roles and Permission
    Route::get('/roles-and-permission/role', RolesPermissionView::class)->name('roles-permission.index');
    Route::get('/roles-and-permission/role/create', RolesCreate::class)->name('roles.create');
    Route::get('/roles-and-permission/role/edit/{id}', RolesEdit::class)->name('roles.edit');
    Route::get('/roles-and-permission/permission', PermissionView::class)->name('permissions.index');
    Route::get('/roles-and-permission/permission/create', PermissionsCreate::class)->name('permissions.create');
    Route::get('/roles-and-permission/permission/edit/{id}', PermissionsEdit::class)->name('permissions.edit');

    // Faculty
    Route::get('/faculty-profile', FacultyView::class)->name('faculty.index');
    Route::get('/faculty-profile/create', FacultyCreate::class)->name('faculty.create');
    Route::get('/faculty-profile/edit/{id}', FacultyEdit::class)->name('faculty.edit');

    // Curriculum
    Route::get('/curriculum', CurriculumView::class)->name('curriculum.index');

    Route::get('/curriculum/accreditation', Accreditation::class)->name('curriculum-accreditation.index');
    Route::get('/curriculum/accreditation/create', AccreditationCreate::class)->name('curriculum-accreditation.create');
    Route::get('/curriculum/accreditation/edit/{id}', AccreditationEdit::class)->name('curriculum-accreditation.edit');

    Route::get('/curriculum/academic', Academic::class)->name('curriculum-academic.index');
    Route::get('/curriculum/academic/create', AcademicCreate::class)->name('curriculum-academic.create');
    Route::get('/curriculum/academic/edit/{id}', AcademicEdit::class)->name('curriculum-academic.edit');

    Route::get('/curriculum/performance', Performance::class)->name('curriculum-performance.index');
    Route::get('/curriculum/performance/create', PerformanceCreate::class)->name('curriculum-performance.create');
    Route::get('/curriculum/performance/edit/{id}', PerformanceEdit::class)->name('curriculum-performance.edit');
    Route::get('/curriculum/performance/banner', Banner::class)->name('curriculum-performance.banner');
    Route::get('/curriculum/performance/banner/create', BannerCreate::class)->name('curriculum-performance.banner-create');
    Route::get('/curriculum/performance/banner/edit/{id}', BannerEdit::class)->name('curriculum-performance.banner-edit');

    Route::get('/curriculum/national-tvet', CurriculumNatnlTvet::class)->name('curriculum-national-tvet.index');
    Route::get('/curriculum/national-tvet/create', CurriculumNatnlTvetCreate::class)->name('curriculum-national-tvet.create');
    Route::get('/curriculum/national-tvet/edit/{id}', CurriculumNatnlTvetEdit::class)->name('curriculum-national-tvet.edit');
    Route::get('/curriculum/national-tvet/certificate-files', CurriculumNatnlTvetFile::class)->name('curriculum-national-tvet.file');
    Route::get('/curriculum/national-tvet/certificate-files/create', CurriculumNatnlTvetFileCreate::class)->name('curriculum-national-tvet.file-create');
    Route::get('/curriculum/national-tvet/certificate-files/edit/{id}', CurriculumNatnlTvetFileEdit::class)->name('curriculum-national-tvet.file-edit');

    Route::get('/curriculum/num-national-tvet', CurriculumNumNatnlTvet::class)->name('curriculum-num-national-tvet.index');
    Route::get('/curriculum/num-national-tvet/create', CurriculumNumNatnlTvetCreate::class)->name('curriculum-num-national-tvet.create');
    Route::get('/curriculum/num-national-tvet/edit/{id}', CurriculumNumNatnlTvetEdit::class)->name('curriculum-num-national-tvet.edit');

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
