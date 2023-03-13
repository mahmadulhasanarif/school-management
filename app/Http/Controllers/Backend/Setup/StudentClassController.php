<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentClassController extends Controller
{
    public function index()
    {
        $data = StudentClass::all();
        return view('backend.student_class.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=> 'required|unique:student_classes'    
            ],
            [
                'name.required'=>'Student class field is required',
                'name.unique'=>'Class name is already exist'
            ]
        );

        StudentClass::create([
            'name'=>$request->name
        ]);

        Alert::success('Student Class Inserted!', 'Successfully inserted student class');
        return redirect()->route('setup.class.index');
    }

    public function create()
    {
        return view('backend.student_class.create');
    }

    public function edit($id)
    {
        $data = StudentClass::findOrFail($id);
        return view('backend.student_class.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'=> 'required|unique:student_classes'    
            ],
            [
                'name.required'=>'Student class field is required',
                'name.unique'=>'Class name is already exist'
            ]
        );
        StudentClass::findOrFail($id)->update([
            'name'=>$request->name
        ]);

        Alert::success('Student Class Updated!', 'Successfully Updaed student class');
        return redirect()->route('setup.class.index');
    }


    public function delete($id)
    {
        StudentClass::findOrFail($id)->delete();
        Alert::success('Student Class Deleted!', 'Successfully Deleted student class');
        return redirect()->back();
    }
}
