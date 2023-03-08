<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FeeCategoryAmountController extends Controller
{
    public function index()
    {
        $data = FeeCategoryAmount::select('fee_category_id')
                ->groupBy('fee_category_id')->get();
        return view('backend.fee_category_amount.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'amount'=> 'required',
                'fee_category_id'=>'required',
                'class_id'=>'required'
            ],
            [
                'amount.required'=>'amount field is required',
            ]
        );

        $count = count($request->class_id);

        if ($count != NULL) {
            for ($i=0; $i < $count; $i++) { 
                $feeCategoryAmount = new FeeCategoryAmount();

                $feeCategoryAmount->fee_category_id = $request->fee_category_id;
                $feeCategoryAmount->class_id = $request->class_id[$i];
                $feeCategoryAmount->amount = $request->amount[$i];
                $feeCategoryAmount->save();
            }
            Alert::success('Student fee_category_amount Inserted!', 'Successfully inserted student fee_category_amount');
            return redirect()->route('student.fee_category_amount.index');
        }else{
            return redirect()->back();
        }

    }

    public function create()
    {
        $fee_category = FeeCategory::all();
        $student_class = StudentClass::all();
        return view('backend.fee_category_amount.create', compact('fee_category', 'student_class'));
    }

    public function edit($fee_category_id)
    {
        $data = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id', 'asc')->get();
        
        $fee_category = FeeCategory::all();
        $student_class = StudentClass::all();
        return view('backend.fee_category_amount.edit', compact('data', 'fee_category', 'student_class'));
    }

    public function update(Request $request, $fee_category_id)
    {
        $request->validate(
            [
                'amount'=> 'required',
                'fee_category_id'=>'required',
                'class_id'=>'required'
            ],
            [
                'amount.required'=>'Student amount field is required',
            ]
        );

        if($request->class_id == null){
            Alert::error('Student fee_category_amount error!', 'Error Updaed student fee_category_amount');
            return redirect()->route('student.fee_category_amount.edit', $fee_category_id);
        }else{
                $count = count($request->class_id);
                FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();
                for ($i=0; $i < $count; $i++) { 
                    $feeCategoryAmount = new FeeCategoryAmount();
    
                    $feeCategoryAmount->fee_category_id = $request->fee_category_id;
                    $feeCategoryAmount->class_id = $request->class_id[$i];
                    $feeCategoryAmount->amount = $request->amount[$i];
                    $feeCategoryAmount->save();
                }
                Alert::success('Student fee_category_amount Updated!', 'Updaed student fee_category_amount');
                return redirect()->route('student.fee_category_amount.index');
            }
    }


    public function details($fee_category_id)
    {
        $fee_category_amount = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        return view('backend.fee_category_amount.details', compact('fee_category_amount'));
    }
}