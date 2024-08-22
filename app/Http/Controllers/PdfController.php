<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function curriculumAccreditation()
    {
        return view('pdf.curriculum.accreditation');
    }

    public function curriculumAcademic()
    {
        return view('pdf.curriculum.academic');
    }

    public function curriculumPerformance()
    {
        return view('pdf.curriculum.performance');
    }

    public function curriculumCertification()
    {
        return view('pdf.curriculum.certification');
    }

    public function curriculumQualification()
    {
        return view('pdf.curriculum.qualification');
    }

    public function studentEnrollment()
    {
        return view('pdf.student_profile.enrollment');
    }

    public function studentGraduates()
    {
        return view('pdf.student_profile.graduates');
    }

    public function studentScholarship()
    {
        return view('pdf.student_profile.scholarship');
    }

    public function studentAwards()
    {
        return view('pdf.student_profile.awards');
    }
}
