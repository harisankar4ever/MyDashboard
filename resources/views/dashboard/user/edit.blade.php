@extends('dashboard.master')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">
<div class="row">

    <div class="col-lg-6 ">
        <h1 class="h3 mb-4 text-gray-800">Update Avatar</h1>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            {{ session('success')}}
        </div>
        @endif
        @if(!$user->avatar)
        <img class=" float-left" src="{{asset('uploads/userAvatar/default.jpg')}}" alt="" width="150px;" height="auto" style="margin-right: 20px; width:150px; height:150px; border-radius:90px; ">
        @else
        <img class=" float-left rounded-circle" src="{{asset('uploads/userAvatar/' . $user->avatar)}}" alt=""  style="margin-right: 20px; width:150px; height:150px; border-radius:90px; ">
        @endif
        <div class="float-left" width="100%;">
            <h2 class="text-capitalize">{{$user->name}}'s Profile Image</h2>
            <form  action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group " >
                    <input class="form-control form-control-sm" name="Avatar" id="formFileSm" type="file">
                    <button type="submit" class="btn btn-sm btn-success mt-2">Update</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6  border-left-success">
        <h1 class="h3 mb-4 text-gray-800">Change Password</h1>
        <h2 class="text-capitalize">{{$user->name}}'s Profile Password</h2>
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            {{ session('error')}}
        </div>
        @endif
        @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            {{ session('message')}}
        </div>
        @endif
        <form action="{{route('change.password')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label >Current Password</label>
              <input type="password" name="current_password" class="form-control" >
            </div>
            <div class="form-group">
              <label >New Password</label>
              <input type="password" name="new_password" class="form-control" >
            </div>
            <div class="form-group">
                <label >Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control"  >
              </div>
              <button type="submit" class="btn btn-sm btn-success mt-2 mb-5">Cange Password</button>
          </form>
    </div>





</div>
    <!-- Page Heading -->

</div>
<!-- /.container-fluid -->
</div>
<div class="clearfix"></div>
@endsection
