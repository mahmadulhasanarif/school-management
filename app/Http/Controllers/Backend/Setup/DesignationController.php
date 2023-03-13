<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DesignationController extends Controller
{
    public function index()
    {
        $data = Designation::all();
        return view('backend.designation.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=> 'required|unique:designations'    
            ],
            [
                'name.required'=>'Designation field is required',
                'name.unique'=>'Designation is already exist'
            ]
        );

        Designation::create([
            'name'=>$request->name
        ]);

        Alert::success('Designation Inserted!', 'Successfully inserted Designation');
        return redirect()->route('setup.designation.index');
    }

    public function create()
    {
        return view('backend.designation.create');
    }

    public function edit($id)
    {
        $data = Designation::findOrFail($id);
        return view('backend.designation.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'=> 'required|unique:designations'    
            ],
            [
                'name.required'=>'Designation field is required',
                'name.unique'=>'Designation is already exist'
            ]
        );
        Designation::findOrFail($id)->update([
            'name'=>$request->name
        ]);

        Alert::success('Designation Updated!', 'Successfully Updaed Designation');
        return redirect()->route('setup.designation.index');
    }


    public function delete($id)
    {
        Designation::findOrFail($id)->delete();
        Alert::success('Designation Deleted!', 'Successfully Deleted Designation');
        return redirect()->back();
    }
}
