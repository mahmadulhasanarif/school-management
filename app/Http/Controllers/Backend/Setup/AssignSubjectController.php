<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AssignSubjectController extends Controller
{
    public function index()
    {
        $data = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.assign_subject.index', compact('data'));
    }

    public function create()
    {
        $class = StudentClass::all();
        $subject = SchoolSubject::all();
        return view('backend.assign_subject.create', compact('class', 'subject')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id'=>'required',
            'subject_id'=>'required',
            'pass_mark'=>'required',
            'full_mark'=>'required',
            'subjective_mark'=>'required'
        ]);

        $count = count($request->subject_id);

        if($count != null){
            for ($i=0; $i < $count; $i++) { 
                $assignSubject = new AssignSubject();
                $assignSubject->class_id = $request->class_id;
                $assignSubject->subject_id = $request->subject_id[$i];
                $assignSubject->pass_mark = $request->pass_mark[$i];
                $assignSubject->full_mark = $request->full_mark[$i];
                $assignSubject->subjective_mark = $request->subjective_mark[$i];
                $assignSubject->save();
            }

            Alert::success('Assign Subject Inserted!', 'Assign subject inserted successfully');
            return redirect()->route('setup.assign_subject.index');
        }else{
            return back();
        }
    }

    public function edit($class_id)
    {
        $class = StudentClass::all();
        $subject = SchoolSubject::all();
        $data = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        return view('backend.assign_subject.edit', compact('data','class', 'subject'));
    }

    public function update(Request $request, $class_id)
    {
        $request->validate([
            'class_id'=>'required'
        ]);

        if($request->subject_id == NULL){
            Alert::error('Assign Subject error!', 'Error Updaed Assign Subject');
            return redirect()->back();
        }else{
            $count = count($request->subject_id);

            AssignSubject::where('class_id',$class_id)->delete();
            for ($i=0; $i < $count; $i++) { 
                $assignSubject = new AssignSubject();
                $assignSubject->class_id = $request->class_id;
                $assignSubject->subject_id = $request->subject_id[$i];
                $assignSubject->pass_mark = $request->pass_mark[$i];
                $assignSubject->full_mark = $request->full_mark[$i];
                $assignSubject->subjective_mark = $request->subjective_mark[$i];
                $assignSubject->save();
            } // End For Loop
            Alert::success('Assign subject Updated!', 'Assign subject updated successfully');
            return redirect()->route('setup.assign_subject.index');
        } //end if-else
    } // end update fuction

    public function details($class_id)
    {
        $data = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        return view('backend.assign_subject.details', compact('data'));
    }
}
