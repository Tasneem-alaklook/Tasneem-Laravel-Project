<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// --- الأكواد الخاصة بالنسخة الثالثة (الاستعلام، التعديل، والتحديث) ---

// 1. مسار جلب وعرض البيانات من جدول tasks
Route::get('/tasks', function () {
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));
});

// 2. مسار جلب السجل المراد تعديله عند الضغط على زر Edit
Route::post('/edit/{id}', function ($id) {
    $task = DB::table('tasks')->where('id', $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('task', 'tasks'));
});

// 3. مسار حفظ وتحديث البيانات في قاعدة البيانات
Route::post('/update', function (Request $request) {
    DB::table('tasks')->where('id', $request->id)->update([
        'name' => $request->name
    ]);
    return redirect('/tasks');
});
