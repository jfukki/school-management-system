@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
  <div class="container-full">
	<section class="content">


		<div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
						<h2 class="widget-user-username">User Name: {{$user->name}}</h2>
						<h6 class="widget-user-desc">User Email: {{$user->email}}</h6>
						<h6 class="widget-user-desc">User Role: {{$user->usertype}}</h6>
						<a href="{{route('profile.edit')}}" class="btn  btn-rounded btn-success "  style="float:right; margin-top:-30px;">Edit Profile</a>


					</div>
					<div class="widget-user-image">
						<img class="rounded-circle" 
						
						src="{{ (!empty($user->image))? url('uploads/user_images/'.$user->image) : url('uploads/no_image.jpg') }}" 
						
						alt="User Avatar">
					</div>
					<div class="box-footer">
						<div class="row">
						<div class="col-sm-4">
							<div class="description-block">
							<h5 class="description-header">Mobile</h5>
							<span class="description-text">{{$user->mobile}}</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
							<div class="description-block">
							<h5 class="description-header">Adress</h5>
							<span class="description-text">{{$user->address}}</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
							<div class="description-block">
							<h5 class="description-header">Gender</h5>
							<span class="description-text">{{$user->gender}}</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					</div>


		</section>
		</div>
</div>


@endsection