<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FeeCategoryController extends Controller
{
    public function index()
    {
        $data = FeeCategory::all();
        return view('backend.student_fee_category.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=> 'required|unique:fee_categories'    
            ],
            [
                'name.required'=>'Student fee_category field is required',
                'name.unique'=>'fee_category name is already exist'
            ]
        );

        FeeCategory::create([
            'name'=>$request->name
        ]);

        Alert::success('Student fee_category Inserted!', 'Successfully inserted student fee_category');
        return redirect()->route('setup.fee_category.index');
    }

    public function create()
    {
        return view('backend.student_fee_category.create');
    }

    public function edit($id)
    {
        $data = FeeCategory::findOrFail($id);
        return view('backend.student_fee_category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'=> 'required|unique:fee_categories'    
            ],
            [
                'name.required'=>'Student fee_category field is required',
                'name.unique'=>'fee_category name is already exist'
            ]
        );
        FeeCategory::findOrFail($id)->update([
            'name'=>$request->name
        ]);

        Alert::success('Student fee_category Updated!', 'Successfully Updaed student fee_category');
        return redirect()->route('setup.fee_category.index');
    }


    public function delete($id)
    {
        FeeCategory::findOrFail($id)->delete();
        Alert::success('Student fee_category Deleted!', 'Successfully Deleted student fee_category');
        return redirect()->back();
    }
}