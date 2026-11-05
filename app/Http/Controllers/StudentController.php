<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('students')->get();

        return view('students.index', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'major' => 'nullable|string|max:255',
        ]);

        DB::table('students')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'major' => $request->major,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully!');
    }
}
