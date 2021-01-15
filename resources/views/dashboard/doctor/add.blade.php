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
            <input type="text" class="form-control" name="Title" id="inputTitle">
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
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Add New</button>

   </div>
   <div class="col-md-4 col-lg-4 col-sm-12 bg-gray-100 border-left-warning">
    <label for="inputcategory">Select Category</label>
    <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>Category 1</option>
        <option>Category 2</option>
        <option>Category 3</option>
        <option>Category 4</option>
      </select>

      <div class="form-group " >
          <label for="" class="mt-2">Upload Media</label>
        <div class="custom-file ">

            <input type="file" class="custom-file-input" id="validatedCustomFile" >

            <label class="custom-file-label" for="validatedCustomFile">Choose Image File</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
          </div>
      </div>

   </div>
</form>
</div>
</div>
<!-- /.container-fluid -->

</div>


@endsection
