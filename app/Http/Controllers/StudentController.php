<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_number' => ['required', 'string', 'unique:students,student_number'],
            'name' => ['required', 'string', 'max:30'],
        ], [
            'student_number.required' => 'Vul een studentnummer in.',
            'student_number.unique' => 'Dit studentnummer bestaat al.',
            'name.required' => 'Vul een naam in.',
            'name.max' => 'De naam mag maximaal 30 tekens bevatten.',
        ]);

        Student::create($validated);

        return redirect()
            ->route('student.index')
            ->with('success', 'Yeeeey, je bent aangemeld!');
    }

    public function show(Student $student)
    {
        return view('show', compact('student'));
    }

    public function index()
    {
        $students = Student::all();
        return view('index', compact('students'));
    }

    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_number' => ['required', 'string', 'unique:students,student_number,' . $student->id],
            'name' => ['required', 'string', 'max:30'],
        ], [
            'student_number.required' => 'Vul een studentnummer in.',
            'student_number.unique' => 'Dit studentnummer bestaat al.',
            'name.required' => 'Vul een naam in.',
            'name.max' => 'De naam mag maximaal 30 tekens bevatten.',
        ]);

        $student->update($validated);

        return redirect()->route('student.show', $student);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.create');
    }
}
