<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentFee;


class StudentFeeController extends Controller
{
    public function viewFee()
    {
        $data['alldata'] = StudentFee::all()->sortByDesc("created_at");
        return view("admin.backend.setup.student_fee.view_fee", $data);
    }

    public function addFee()
    {
        return view ('admin.backend.setup.student_fee.add_fee');

    }

    public function storeFee(Request $request)
    {
        $data = new StudentFee(); 

        $request-> validate([

            'name' => 'required|unique:student_fees,name',
            
        ]);

        $data ->name = $request->name;
        
        $data->save();

        return redirect()->route('student.fee.view');
    }

    
    public function deleteFee($id)
    {
        $delete = StudentFee::find($id);

        $delete->delete();

        return redirect()->route('student.fee.view');

    }

    public function editFee($id)
    {


        $editData = StudentFee::find($id);
        $editData = compact('editData'); 
        return view ('admin.backend.setup.student_fee.edit_fee')->with($editData);
    }

    public function updateFee(Request $request, $id)
    {
        $request-> validate([

            'name' => 'required|unique:student_fees,name',
            
        ]);


        $updateFee = StudentFee::find($id);


        $updateFee->name = $request['name'];
    

        $updateFee->save();
         
        return redirect()->route('student.fee.view');
        
    }

}
