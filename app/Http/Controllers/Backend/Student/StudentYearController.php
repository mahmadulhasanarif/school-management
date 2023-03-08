<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentYearController extends Controller
{
    public function index()
    {
        $data = StudentYear::all();
        return view('backend.student_year.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=> 'required|integer|unique:student_years'    
            ],
            [
                'name.required'=>'Student year field is required',
                'name.unique'=>'year name is already exist',
                'name.integer'=>'Enter a valid integer year'
            ]
        );

        StudentYear::create([
            'name'=>$request->name
        ]);

        Alert::success('Student year Inserted!', 'Successfully inserted student year');
        return redirect()->route('student.year.index');
    }

    public function create()
    {
        return view('backend.student_year.create');
    }

    public function edit($id)
    {
        $data = StudentYear::findOrFail($id);
        return view('backend.student_year.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'=> 'required|integer|unique:student_years'    
            ],
            [
                'name.required'=>'Student year field is required',
                'name.unique'=>'year name is already exist',
                'name.integer'=>'Enter a valid integer year'
            ]
        );
        StudentYear::findOrFail($id)->update([
            'name'=>$request->name
        ]);

        Alert::success('Student year Updated!', 'Successfully Updaed student year');
        return redirect()->route('student.year.index');
    }


    public function delete($id)
    {
        StudentYear::findOrFail($id)->delete();
        Alert::success('Student year Deleted!', 'Successfully Deleted student year');
        return redirect()->back();
    }
}
