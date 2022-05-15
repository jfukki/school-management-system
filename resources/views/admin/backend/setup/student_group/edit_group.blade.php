@extends('admin.admin_master')

@section('admin')


 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Student Group </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Homepage</li>
								<!-- <li class="breadcrumb-item active" aria-current="page">Form Validation</li> -->
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
			  <h4 class="box-title">Update Student group</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
                    <form action="{{route('student.group.update', $editData->id)}}" method="post">
                        @csrf
                        <div class="row">


                        <div class="col-12">
                                <div class="form-group">
                                <h5>Student group <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" id="name"
                                     class="form-control"  placeholder="Enter group Here...." 
                                     value="{{$editData->name}}" > </div>
                                    <span style="color:white;">
                                    @error('name')

                                    {{$message}}

                                    @enderror

                                    </span>
                            </div>
                        </div>

                             

                                
                                 

                                

                                <div class="col-6">
                                    <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-danger btn-outline">Update Student Group</button>
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