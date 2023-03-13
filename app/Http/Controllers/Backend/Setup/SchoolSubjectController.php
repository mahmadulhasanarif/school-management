<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SchoolSubjectController extends Controller
{
    public function index()
    {
        $data = SchoolSubject::all();
        return view('backend.school_subject.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=> 'required|unique:school_subjects'    
            ],
            [
                'name.required'=>'subject field is required',
                'name.unique'=>'subject name is already exist'
            ]
        );

        SchoolSubject::create([
            'name'=>$request->name
        ]);

        Alert::success('Subject Inserted!', 'Successfully inserted subject');
        return redirect()->route('setup.school_subject.index');
    }

    public function create()
    {
        return view('backend.school_subject.create');
    }

    public function edit($id)
    {
        $data = SchoolSubject::findOrFail($id);
        return view('backend.school_subject.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'=> 'required|unique:school_subjects'    
            ],
            [
                'name.required'=>'Subject field is required',
                'name.unique'=>'subejct name is already exist'
            ]
        );
        SchoolSubject::findOrFail($id)->update([
            'name'=>$request->name
        ]);

        Alert::success('Subject Updated!', 'Successfully Updaed Subject');
        return redirect()->route('setup.school_subject.index');
    }


    public function delete($id)
    {
        SchoolSubject::findOrFail($id)->delete();
        Alert::success('Subject Deleted!', 'Successfully Deleted Subject');
        return redirect()->back();
    }
}
