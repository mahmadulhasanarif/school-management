<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ExamTypeController extends Controller
{
    public function index()
    {
        $data = ExamType::all();
        return view('backend.exam_type.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=> 'required|unique:exam_types'    
            ],
            [
                'name.required'=>'Student exam_type field is required',
                'name.unique'=>'exam_type is already exist'
            ]
        );

        ExamType::create([
            'name'=>$request->name
        ]);

        Alert::success('Student exam_type Inserted!', 'Successfully inserted student exam_type');
        return redirect()->route('student.exam_type.index');
    }

    public function create()
    {
        return view('backend.exam_type.create');
    }

    public function edit($id)
    {
        $data = ExamType::findOrFail($id);
        return view('backend.exam_type.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'=> 'required|unique:exam_types'    
            ],
            [
                'name.required'=>'Student exam_type field is required',
                'name.unique'=>'exam_type is already exist'
            ]
        );
        ExamType::findOrFail($id)->update([
            'name'=>$request->name
        ]);

        Alert::success('Student exam_type Updated!', 'Successfully Updaed student exam_type');
        return redirect()->route('student.exam_type.index');
    }


    public function delete($id)
    {
        ExamType::findOrFail($id)->delete();
        Alert::success('Student exam_type Deleted!', 'Successfully Deleted student exam_type');
        return redirect()->back();
    }
}
