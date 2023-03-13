<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Image;
use PDF;

class StudentRegisterController extends Controller
{
    public function index()
    {
        $year = StudentYear::all();
        $class = StudentClass::all();
        $year_id = StudentYear::orderBy('id', 'asc')->first()->id;
        $class_id = StudentClass::orderBy('id', 'asc')->first()->id;
        $data = AssignStudent::where('class_id', $class_id)->where('year_id', $year_id)->latest()->take(1)->get();
        return view('backend.student_register.index', compact('data','class','year', 'year_id', 'class_id'));
    }

    public function searchClassYear(Request $request)
    {
        $year = StudentYear::all();
        $class = StudentClass::all();
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $data = AssignStudent::where('class_id', $class_id)->where('year_id', $year_id)->get();
        return view('backend.student_register.index', compact('data','class','year', 'year_id', 'class_id'));
    }

    public function create()
    {
        $year = StudentYear::all();
        $class = StudentClass::all();
        $group = StudentGroup::all();
        $shift = StudentShift::all();
        return view('backend.student_register.create', compact('class', 'group', 'shift', 'year'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'fname'=>'required',
            'mname'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'religion'=>'required',
            'dob'=>'required',
            'discount'=>'required',
            'class_id'=>'required',
            'year_id'=>'required',
            'group_id'=>'required',
            'shift_id'=>'required',
            'image'=>'required'
        ]);


        DB::transaction(function() use($request){
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'student')->orderBy('id', 'DESC')->first();

            if($student == null){
                $firstReg =0;
                $studentId = $firstReg + 1;

                if($studentId < 10){
                    $id_no = '000'.$studentId;
                }elseif($studentId < 100){
                    $id_no ='00'.$studentId;
                }elseif($studentId < 1000){
                    $id_no ='0'.$studentId;
                }elseif($studentId < 10000){
                    $id_no =$studentId;
                }
            }else{
                $student = User::where('usertype', 'student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student + 1;
                if($studentId < 10){
                    $id_no = '000'.$studentId;
                }elseif($studentId < 100){
                    $id_no ='00'.$studentId;
                }elseif($studentId < 1000){
                    $id_no ='0'.$studentId;
                }elseif($studentId < 10000){
                    $id_no =$studentId;
                }
            } // if else end part

            $final_id_no = $checkYear.$id_no;


            // Assign Student Table Data insert
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = "student";
            $user->code = $code;
            $user->name = strtolower($request->name);
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = $request->dob;
            $user->dob = $request->dob;
            $user->dob = date('Y-m-d',strtotime($request->dob));

            if($request->file('image')){
                $image = $request->file('image');
                $name = uniqid().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(150,120)->save('images/students/'.$name);
                $imgReq = "images/students/".$name;
            }

            $user->image = $imgReq;
            $user->save();


            // Assign Student Table Data insert
            $assignStudent = new AssignStudent();
            $assignStudent->student_id = $user->id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();

            // Discount student Table Data insert
            $discountStudent = new DiscountStudent();
            $discountStudent->assign_student_id = $assignStudent->id;
            $discountStudent->fee_category_id = '1';
            $discountStudent->discount = $request->discount;
            $discountStudent->save();
        });

        Alert::success('Student Registered!', 'Student registration successfully');
        return redirect()->route('student.registration.index');
    } // student Registration store

    public function edit($student_id)
    {
        $year = StudentYear::all();
        $class = StudentClass::all();
        $group = StudentGroup::all();
        $shift = StudentShift::all();
        $data = AssignStudent::with(['student','discount'])->where('student_id', $student_id)->first();
        return view('backend.student_register.edit', compact('class', 'group', 'shift', 'year', 'data'));
    }

    public function update(Request $request, $student_id)
    {
        DB::transaction(function() use($request, $student_id){
            // Assign Student Table Data insert
            $user = User::where('id', $student_id)->first();
            $user->name = strtolower($request->name);
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = $request->dob;
            $user->dob = $request->dob;
            $user->dob = date('Y-m-d',strtotime($request->dob));

            // Image insert start
            if($request->file('image')){
                $image = $request->file('image');
                $name = uniqid().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(150,120)->save('images/students/'.$name);
                $imgReq = "images/students/".$name;
                $user->image = $imgReq;

                $old_img = $request->old_image;
                if($old_img){
                    unlink($old_img);
                }
            }

            // Image insert End

            $user->save();


            // Assign Student Table Data insert
            $assignStudent = AssignStudent::where('id', $request->id)->where('student_id',$student_id)->first();
            $assignStudent->class_id = $request->class_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();

            // Discount student Table Data insert
            $discountStudent = DiscountStudent::where('assign_student_id', $request->id)->first();
            $discountStudent->discount = $request->discount;
            $discountStudent->save();
        });

        Alert::success('Student Registered Updated!', 'Student registration successfully Updated');
        return redirect()->route('student.registration.index');

    }// Student Registration Update method end

    public function studentPromotion($student_id)
    {
        $year = StudentYear::all();
        $class = StudentClass::all();
        $group = StudentGroup::all();
        $shift = StudentShift::all();
        $data = AssignStudent::with(['student','discount'])->where('student_id', $student_id)->first();
        return view('backend.student_register.student_promotion', compact('class', 'group', 'shift', 'year', 'data'));
    }

    public function studentRegistrationPromotion(Request $request, $student_id)
    {
        DB::transaction(function() use($request, $student_id){
            $user = User::where('id', $student_id)->first();
            $user->name = strtolower($request->name);
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = $request->dob;
            $user->dob = $request->dob;
            $user->dob = date('Y-m-d',strtotime($request->dob));

            // Image insert start
            if($request->file('image')){
                $image = $request->file('image');
                $name = uniqid().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(150,120)->save('images/students/'.$name);
                $imgReq = "images/students/".$name;
                $user->image = $imgReq;

                $old_img = $request->old_image;
                if($old_img){
                    unlink($old_img);
                }
            }

            // Image insert End

            $user->save();



            $assignStudent = new AssignStudent();
            $assignStudent->student_id = $student_id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();

            $discountStudent = new DiscountStudent();
            $discountStudent->assign_student_id = $assignStudent->id;
            $discountStudent->fee_category_id = '1';
            $discountStudent->discount = $request->discount;
            $discountStudent->save();
        });

        Alert::success('Student Promote Successful!', 'Student promotion successfully complate');
        return redirect()->route('student.registration.index');
    }

    public function DetailsPDF($student_id)
    {
        $data = AssignStudent::with('student', 'discount')->where('student_id', $student_id)->first();
        $pdf = PDF::loadView('backend.student_register.details_pdf', compact('data'));
     
        return $pdf->download($data->student->name.'.'. $data->roll.'.'.'pdf');
    }
}
