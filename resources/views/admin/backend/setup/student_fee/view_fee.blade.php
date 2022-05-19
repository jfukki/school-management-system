@extends('admin.admin_master')

@section('admin')


      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">fee List View</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Go To Home Dashboard</li>
								<!-- <li class="breadcrumb-item active" aria-current="page">Data Tables</li> -->
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="row">


			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Student fee List</h3>
                  <a href="{{route('student.fee.add')}}" class="btn  btn-rounded btn-info btn-outline" 
                   style="float:right">Add fee</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sr#</th>
							 
								<th>Name</th>
							 
								<th width="25%">Action</th>
								
							</tr>
						</thead>
						<tbody>
                        @foreach($alldata as $key => $data )

                        <tr>
								<td>{{$key+1}}</td>
							 
								<td>{{$data->name}}</td>
							 
								<td>
                                    <a href="{{route('student.fee.edit', $data->id)}}" class="btn btn-warning btn-rounded btn-sm btn-outline">Edit</a>
                                    <a href="{{route('student.fee.delete', $data->id)}}" class="btn btn-danger btn-rounded btn-sm btn-outline" id="delete">Delete</a>    


                                </td>
								
                        </tr>
                            
                        @endforeach
                        
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
        
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->



@endsection