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
					<h3 class="page-title">{{$editData->name}} <small>Password Change Option</small></h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Update</li>
								<li class="breadcrumb-item active" aria-current="page">Your Profile's Password</li>
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
			  <h4 class="box-title">Manage Your Password</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
                    <form action="{{route('password.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">                               

                               
                        <div class="col-4">
                                <div class="form-group">
                                <h5>Current Password<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="oldpassword" id="current_password"
                                     class="form-control"  value=""  > </div>
                                    <span style="color:white;">
                                    @error('oldpassword')

                                    {{$message}}

                                    @enderror

                                    </span>
                            </div>
                        </div>


                        <div class="col-4">
                                <div class="form-group">
                                <h5>New Password<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password" id="password" class="form-control" > </div>
                                    <span style="color:white;">
                                    @error('password')

                                    {{$message}}

                                    @enderror

                                    </span>
                            </div>
                        </div>

                        <div class="col-4">
                                <div class="form-group">
                                <h5>Confrim Password<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-type your Password" > </div>
                                    <span style="color:white;">
                                    @error('password_confirmation')

                                    {{$message}}

                                    @enderror

                                    </span>
                            </div>
                        </div>


                       

                        <div class="col-12">
                                    <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info btn-outline">Change Password</button>
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