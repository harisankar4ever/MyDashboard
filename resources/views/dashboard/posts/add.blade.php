@extends('dashboard.master')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
<div class="row mb-5">

   <div class="col-md-8 col-lg-8 col-sm-12 bg-white shadow " style="padding: 2rem; ">
   <form class="" action="{{ route('post.add') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputTitle">Title</label>
            <input type="text" class="form-control" name="Title" i>
          </div>

        </div>
        <div class="form-group">
          <label for="inputDescription">Description</label>

          <textarea name="Description" class="form-control" id="inputDescription" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
          <label for="inputsdesc">Short Description</label>
          <textarea name="ShortDescription" class="form-control" id="inputsdesc" cols="30" rows="10"></textarea>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputBody">Additional</label>
            <input type="text" name="Additional" class="form-control" id="inputBody">
          </div>

        </div>

        <button type="submit" class="btn btn-primary">Add New</button>

   </div>
   <div class="col-md-4 col-lg-4 col-sm-12 bg-gray-100 border-left-warning">
    <label for="inputcategory">Select Category</label> <a href="/dashboard/categories/new">Add new category</a>
    <select id="inputState" class="form-control" name="category_id">
        @if(count($cat) > 0)
        @foreach ($cat as $key => $value)
        <option value="{{ $value->id }}">{{ $value->name }}</option>
        @endforeach

        @endif
      </select>

      <div class="form-group " >
          <label for="" class="mt-2">Upload Media</label>
        {{-- <div class="custom-file ">

            <input type="file" name="Image" class="custom-file-input" id="validatedCustomFile" >

            <label class="custom-file-label" for="validatedCustomFile">Choose Image File</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
          </div> --}}

  <input class="form-control form-control-sm" name="Image" id="formFileSm" type="file">
      </div>


   </div>
</form>
</div>
</div>
<!-- /.container-fluid -->

</div>


@endsection
