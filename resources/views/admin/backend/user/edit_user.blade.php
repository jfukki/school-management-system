@extends('admin.admin_master')

@section('admin')


 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Form Validation</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Forms</li>
								<li class="breadcrumb-item active" aria-current="page">Form Validation</li>
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
			  <h4 class="box-title">Add User</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
                    <form action="{{route('user.update', $editData->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">  

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


                                <div class="col-6">  

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

                                <div class="col-6">

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

                                <div class="col-6">
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
                            </div>


                                <div class="col-6">
                                    <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-danger btn-outline">Update</button>
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


@endsection