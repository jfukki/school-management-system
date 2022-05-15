<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function viewYear()
    {
        $data['alldata'] = StudentYear::all()->sortByDesc("created_at");
        return view('admin.backend.setup.student_year.view_year', $data);
    }

    public function viewAddStudentYear()
    {  
        return view ('admin.backend.setup.student_year.add_student_year');
    }

    public function storeStudentYear(Request $request)
    {
        $data = new StudentYear(); 

        $request-> validate([

            'name' => 'required|unique:student_years,name',
            
        ]);

        $data ->name = $request->name;
        
        $data->save();

        return redirect()->route('student.year.view');
    }

    
    public function deleteYear($id)
    {
        $deleteClass = StudentYear::find($id);

        $deleteClass->delete();

        return redirect()->route('student.year.view');
    }

    public function yearEdit($id)
    {


        $editData = StudentYear::find($id);
        $editData = compact('editData'); 
        return view ('admin.backend.setup.student_year.edit_student_year')->with($editData);

   
    }


    public function updateStudentYear(Request $request, $id)
    {
        $request-> validate([

            'name' => 'required|unique:student_years,name',
            
        ]);


        $updateYear = StudentYear::find($id);


        $updateYear->name = $request['name'];
    

        $updateYear->save();
         
        return redirect()->route('student.year.view');
        
    }
}
