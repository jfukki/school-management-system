<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\User;

class StudentClassController extends Controller
{
    public function viewStudentClass()
    {


        // fetch all the data/
        
        $data['alldata'] = StudentClass::all()->sortByDesc("created_at");
        return view('admin.backend.setup.student_class.view_class', $data);
        // return view('admin.backend.setup.student_class.view_class')->with($data);

    }

    public function viewAddStudentClass()
    {   
        // $data = new StudentClass(); 

        // $request-> validate([

        //     'name' => 'required',
            
        // ]);

        // $data ->name = $request->name;
        
        // $data->save();

        return view ('admin.backend.setup.student_class.add_student_class');
    }

    public function addStudentClass(Request $request)
    {
        $data = new StudentClass(); 

        $request-> validate([

            'name' => 'required|unique:student_classes,name',
            
        ]);

        $data ->name = $request->name;
        
        $data->save();

        return redirect()->route('student.class.view');
    }

    public function classDelete($id)
    {
        $deleteClass = StudentClass::find($id);

        $deleteClass->delete();

        return redirect()->route('student.class.view');
    }
    
    public function classEdit($id)
    {


        $editData = StudentClass::find($id);
        $editData = compact('editData'); 
    //    //  return view('admin.backend.user.edit_user', compact($editData));
       return view ('admin.backend.setup.student_class.edit_student_class')->with($editData);

   
    }

    public function classUpdate(Request $request, $id)
    {
        $request-> validate([

            'name' => 'required',
            
        ]);


        $updateClass = StudentClass::find($id);


         $updateClass->name = $request['name'];
    

         $updateClass->save();
         
         return redirect()->route('student.class.view');
        
    }

}
