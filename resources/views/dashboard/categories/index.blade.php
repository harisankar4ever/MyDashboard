@extends('dashboard.master')
@section('styles')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endsection
@section('scripts')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
    $(function() {
      $('#toggle-two').bootstrapToggle({
        on: 'Enabled',
        off: 'Disabled',

      });
    })
  </script>
<script>
    $('.toggle-class').on('change', function(){
      var status=$(this).prop('checked')==true ? 1 : 0;
      var cat_id=$(this).data('id');
      $.ajax({
          type:'GET',
          dataType:'json',
          url:'{{route("change.status")}}',
          data:{'status':status , 'cat_id':cat_id},
          success:function(data){
              $('#message').html('<p class="alert alert-danger" >'+data.success+'</p>');
          }

      });
    });
      </script>
      <script>

      </script>
@endsection
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">
  {{-- <div class="col-md-8 col-lg-8 col-sm-12 bg-white shadow " style="padding: 2rem; "> --}}
    <!-- Page Heading -->


   <form action="{{ route('category.add') }}" method="POST" enctype="multipart/form-data">
       @csrf

    <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputTitle"> Category Name</label>
          <input type="text" class="form-control" name="CategoryName">
        </div>

      </div>
      <button type="submit" class="btn btn-success" title="Add New Category" data-toggle="tooltip" data-placement="right">Add Category</button>
   </form>
   <div class="card shadow mb-4 mt-4" >
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="float:left" >Category Tables</h6>
        <h6 class="m-0 font-weight-bold text-primary " style="float:right" ><a href="/dashboard/posts" class="btn btn-success">Back</a></h6>

    </div>
    <div class="card-body">
        <div class="table table-responsive" style="overflow-x: hidden;" >
            <table class="table table-bordered css-serial" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>

                        <th>Category Name</th>

                        <th>Status</th>


                    </tr>
                </thead>
                {{-- <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>short descrition</th>
                        <th>Body</th>
                        <th>Post Date</th>
                        <th>Actions</th>


                    </tr>
                </tfoot> --}}
                <tbody>
                @if($categories->count()>0)

                  @foreach($categories as $key => $category)
                    <tr>
                        <td> </td>
                    <td>{{{$category->name}}}</td>


                        <td><input type="checkbox" class="toggle-class" id="toggle-two" data-id="{{$category->id}} " data-toggle="toggle" data-on="Enabled" data-off="Disabled" {{$category->status==true ? 'checked':''}} data-size="small" data-onstyle="success" data-offstyle="danger" ></td>

                    </tr>
                   @endforeach
                 @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->

</div>





@endsection
