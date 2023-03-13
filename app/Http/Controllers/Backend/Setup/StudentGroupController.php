<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentGroupController extends Controller
{
    public function index()
    {
        $data = StudentGroup::all();
        return view('backend.student_group.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=> 'required|unique:student_groups'    
            ],
            [
                'name.required'=>'Student group field is required',
                'name.unique'=>'group name is already exist'
            ]
        );

        StudentGroup::create([
            'name'=>$request->name
        ]);

        Alert::success('Student Group Inserted!', 'Successfully inserted student Group');
        return redirect()->route('setup.group.index');
    }

    public function create()
    {
        return view('backend.student_group.create');
    }

    public function edit($id)
    {
        $data = StudentGroup::findOrFail($id);
        return view('backend.student_group.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'=> 'required|unique:student_groups'    
            ],
            [
                'name.required'=>'Student group field is required',
                'name.unique'=>'Group name is already exist'
            ]
        );
        StudentGroup::findOrFail($id)->update([
            'name'=>$request->name
        ]);

        Alert::success('Student Group Updated!', 'Successfully Updaed student group');
        return redirect()->route('setup.group.index');
    }


    public function delete($id)
    {
        StudentGroup::findOrFail($id)->delete();
        Alert::success('Student Group Deleted!', 'Successfully Deleted student Group');
        return redirect()->back();
    }
}
