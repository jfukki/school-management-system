<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function viewGroupList()
    {
        $data['alldata'] = StudentGroup::all()->sortByDesc("created_at");
        return view('admin.backend.setup.student_group.view_group', $data);
        
    }

    public function addGroup()
    {
        return view ('admin.backend.setup.student_group.add_group');

    }

    public function storeGroup(Request $request)
    {
        $data = new StudentGroup(); 

        $request-> validate([

            'name' => 'required|unique:student_groups,name',
            
        ]);

        $data ->name = $request->name;
        
        $data->save();

        return redirect()->route('student.group.view');
    }

    public function deleteGroup($id)
    {
        $deleteClass = StudentGroup::find($id);

        $deleteClass->delete();

        return redirect()->route('student.group.view');

    }

    public function editGroup($id)
    {


        $editData = StudentGroup::find($id);
        $editData = compact('editData'); 
        return view ('admin.backend.setup.student_group.edit_group')->with($editData);
    }

    public function updateGroup(Request $request, $id)
    {
        $request-> validate([

            'name' => 'required|unique:student_groups,name',
            
        ]);


        $updateGroup = StudentGroup::find($id);


        $updateGroup->name = $request['name'];
    

        $updateGroup->save();
         
        return redirect()->route('student.group.view');
        
    }
}
