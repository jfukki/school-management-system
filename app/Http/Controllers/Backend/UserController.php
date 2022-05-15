<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userview()
    {
        // $allData = User::all();
        // $data = compact($allData);
        // return view ('admin.backend.user.view_user')->with('data');
        
        $data['alldata'] = User::all()->sortByDesc("created_at");
        return view('admin.backend.user.view_user', $data);
    }

    public function useradd()
    {
        return view('admin.backend.user.add_user');
    }
 
    

    public function userstore(Request $request)
    {
        
        //validate


            $request-> validate([

                'email' => 'required|email',
                'usertype' => 'required',
                'password' => 'required',
                'username' => 'required'
    
            ]);
    
      
            $data = new User();

            $data->usertype = $request['usertype'];
            $data->name = $request['username'];
            $data->email = $request['email'];
            $data->password = bcrypt($request->password);
        
            $data->save();

            //notfications

            $notification = array(

                'message' => 'New User Successfully Added',
                'alert-type' => 'info'
            );

            return redirect()->route('user.view');

        //store

    }

    public function useredit($id)
     {
         $editData = User::find($id);
         $editData = compact('editData'); 
        //  return view('admin.backend.user.edit_user', compact($editData));
         return view('admin.backend.user.edit_user')->with($editData);

    
     }

     public function userupdate($id, Request $request)
     {
         $updateUser = User::find($id);

         $updateUser->usertype = $request['usertype'];
         $updateUser->name = $request['username'];
         $updateUser->email = $request['email'];
         $updateUser->password =  bcrypt($request->password);;

         $updateUser->save();
         
         return redirect()->route('user.view');
 
    }

    public function userdelete ($id)
    {
        $deleteUser = User::find($id);

        $deleteUser->delete();

        return redirect()->route('user.view');
    }
        
}
