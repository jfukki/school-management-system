@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Profile Edit Form</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Update</li>
								<li class="breadcrumb-item active" aria-current="page">Your Profile</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>	  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Manage Profile</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
                    <form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4">  

                                <div class="form-group">
                                    <h5>User Role <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="usertype" id="select"  class="form-control">
                                            <option value="" disable="">Select User Role</option>
                                            <option value="admin"   {{($editData->usertype == "admin" ? "selected": "")}}>Admin</option>
                                            <option value="student"  {{($editData->usertype == "student" ? "selected": "")}}>Student</option>
                                            <option value="user"  {{($editData->usertype == "user" ? "selected": "")}}>User</option>
                                            
                                        </select>
                                    </div>
                                </div>    

                            </div>


                                <div class="col-4">  

                                <div class="form-group">
								    <h5>Username <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="username"   value="{{$editData->name}}"> </div>
										<span style="color:white;">
										@error('username')

											{{$message}}

											@enderror

										</span>
							    </div>  

                                </div>

                                <div class="col-4">

                                    <div class="form-group">
                                        <h5>User Email  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control"   value="{{$editData->email}}"> </div>
											<span style="color:white;">
											@error('email')

											{{$message}}

											@enderror

											</span>
                                    </div>
                                </div>

                                <!-- <div class="col-4">
                                        <div class="form-group">
                                        <h5>User Password<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="password" class="form-control"  > </div>
											<span style="color:white;">
											@error('password')

											{{$message}}

											@enderror

											</span>
                                    </div>
                                </div>
                            -->



                            <div class="col-6">  

                                <div class="form-group">
                                    <h5>User Gender <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="gender" id="select"  class="form-control">
                                            <option value="" disable="">Select User Gender</option>
                                            <option value="male"   {{($editData->gender == "male" ? "selected": "")}}>Male</option>
                                            <option value="female"  {{($editData->gender == "female" ? "selected": "")}}>Female</option>
                                            <option value="other"  {{($editData->gender == "other" ? "selected": "")}}>Other</option>
                                            
                                        </select>
                                    </div>
                                </div>    

                            </div>

                            <div class="col-6">  

                                <div class="form-group">
								    <h5>Mobile Number <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="mobile" 
                                          value="{{$editData->mobile}}" placeholder="Enter Your Mobile Number"> </div>
										<span style="color:white;">
										@error('mobile')

											{{$message}}

											@enderror

										</span>
							    </div>  
                            </div>




                            <div class="col-8">  

                                <div class="form-group">
								    <h5>Address<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        
                                        <textarea name="address" id="address"  rows="6" class="form-control">
                                        {{$editData->address}}
                                        </textarea>
                                        
                                        </div>
										<span style="color:white;">
										@error('address')

											{{$message}}

											@enderror

										</span>
							    </div>  
                            </div>

                            <div class="col-4">  

                                <div class="form-group">
								    <h5>Profile Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" class="form-control" name="image" id="image" > </div>


										<span style="color:white;">
										@error('image')

											{{$message}}

											@enderror

										</span>

                                        
							    </div>  


                                <div class="form-group">
                                    <div class="controls">
                                    <img src="{{ (!empty($user->image))? url('uploads/user_images/'.$user->image) : url('uploads/no_image.jpg') }}" 
                                    id="showImage" 
                                    style="width:100%; border:1px solid #000;margin-top:10px;">

                                    </div>
                                </div>
                            </div>





                                <div class="col-12">
                                    <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-danger btn-outline">Update Profile</button>
                                </div>
                            </div>
                        </div>

                    </form>


				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
   

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
            
        });
    });
</script>

@endsection