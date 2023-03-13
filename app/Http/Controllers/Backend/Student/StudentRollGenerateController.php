<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentRollGenerateController extends Controller
{
    public function StudentRollView()
    {
        $classes = StudentClass::all();
        $years = StudentYear::all();
        return view('backend.roll_generate.index', compact('classes', 'years'));
    }

    public function GetStudents(Request $request)
    {
        $allData = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        return response()->json($allData);
    }

    public function StudentRollStore(Request $request){

    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	if ($request->student_id !=null) {
    		for ($i=0; $i < count($request->student_id); $i++) { 
    			AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll' => $request->roll[$i]]);
    		} // end for loop
    	}else{
            Alert::error('sorry there are no student', 'Sorry no roll generate');
        }
        Alert::success('Roll Generate Successfully', 'Roll successfully Generated');
        return redirect()->back();
    }
}