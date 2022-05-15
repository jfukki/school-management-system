<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profileView()
    {   
            //get auth data of the user

            $id= Auth::user()->id;

            $user = User::find($id);
            $user = compact('user');
            return view('admin.backend.user.view_profile')->with($user);
        
    }

    public function profileEdit()
    {
        $id= Auth::user()->id;
        $editData = User::find($id);
        $editData = compact('editData'); 
        
        return view('admin.backend.user.edit_profile')->with($editData);

   
    }

    public function profileUpdate(Request $request)
    {
        $id= Auth::user()->id;
        $data = User::find($id);

        $data->usertype = $request['usertype'];
        $data->name = $request['username'];
        $data->email = $request['email'];
        $data->mobile = $request['mobile'];
        $data->gender = $request['gender'];
        $data->address = $request['address'];
        $data->password =  bcrypt($request->password);
        //image upload
        
        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink(public_path('uploads/user_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();

            $file->move(public_path('uploads/user_images'),$filename);
            $data['image'] = $filename;
        }

        $data->save();
        
        return redirect()->route('profile.view');
    }

    public function passwordView()
    {
        
        $id = Auth::user()->id;
        $editData = User::find($id);
        $editData = compact('editData'); 
        return view ('admin.backend.user.edit_password')->with($editData);
    }

    public function passwordUpdate(Request $request)
    {
        
        //  $request-> validate([

        //     'oldpassword' => 'required',
        //     'password' => 'required|confirmed'

        // ]);
        // dd($request->oldpassword, $request->password, $request->password_confirmation);



        $validateData = $request->validate([
            'oldpassword'  => 'required',
            'password' => 'required|confirmed',
        ]);

        
         

        $hashedPassword = Auth::user()->password;

        

        if(Hash::check($request->oldpassword,$hashedPassword))
        {

               $user = User::find(Auth::id()); 

               $user->password = Hash::make($request->password);
               $user->save();
               
               Auth::logout();

               return redirect()->route('login');
            
            
        }else
        {
            return redirect()->back();
            
        }    

    }
}
        