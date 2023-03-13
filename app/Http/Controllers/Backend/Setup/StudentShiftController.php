<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentShiftController extends Controller
{
    public function index()
    {
        $data = StudentShift::all();
        return view('backend.student_shift.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=> 'required|unique:student_shifts'    
            ],
            [
                'name.required'=>'Student shift field is required',
                'name.unique'=>'shift name is already exist'
            ]
        );

        StudentShift::create([
            'name'=>$request->name
        ]);

        Alert::success('Student shift Inserted!', 'Successfully inserted student shift');
        return redirect()->route('setup.shift.index');
    }

    public function create()
    {
        return view('backend.student_shift.create');
    }

    public function edit($id)
    {
        $data = StudentShift::findOrFail($id);
        return view('backend.student_shift.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'=> 'required|unique:student_shifts'    
            ],
            [
                'name.required'=>'Student shift field is required',
                'name.unique'=>'shift name is already exist'
            ]
        );
        StudentShift::findOrFail($id)->update([
            'name'=>$request->name
        ]);

        Alert::success('Student shift Updated!', 'Successfully Updaed student shift');
        return redirect()->route('setup.shift.index');
    }


    public function delete($id)
    {
        StudentShift::findOrFail($id)->delete();
        Alert::success('Student shift Deleted!', 'Successfully Deleted student shift');
        return redirect()->back();
    }
}
