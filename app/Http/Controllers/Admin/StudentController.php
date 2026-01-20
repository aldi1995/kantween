<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Siswa/Index', [
            'students' => Student::with('user')->latest()->get(),
        ]);
    }
}
