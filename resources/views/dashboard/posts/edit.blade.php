@extends('dashboard.master')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Page</h1>
    <form action="/dashboard/posts/update/{{$post->id}}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputTitle">Title</label>
            <input type="title"  class="form-control" id="inputTitle" name="Title"  value="{{$post->title}}">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Category</label>
            <select id="inputState" class="form-control" name="category_id">
                {{-- <option selected>Choose...</option> --}}
                @if(count($cat) > 0)

                @foreach ($cat as $key => $value)
                <option value="{{ $value->id }}" {{ old('category_id', $post->category_id) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>

                {{-- <option  value="{{ $value->id }}">{{ $value->name }}</option> --}}
                @endforeach

                @endif
              </select>
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputAddress">Description</label>
            @isset($post)
            <textarea name="Description" class="form-control" id="inputDescription" cols="20" rows="10">{{$post->description}}</textarea>
            @else
            <textarea name="Description" class="form-control" id="inputDescription" cols="20" rows="10" ></textarea>
            @endIf

        </div>
        <div class="form-group col-md-6">
            <label for="inputsdesc">Short Description</label>
            @isset($post)
            <textarea name="ShortDescription" class="form-control" id="inputDescription" cols="20" rows="10">{{$post->sdesc}}</textarea>
            @else
            <textarea name="ShortDescription" class="form-control" id="inputshortDescription" cols="20" rows="10" ></textarea>
            @endIf
          </div>
        </div>
          <div class="form-row">
            <div class="form-group col-md-6" style=" margin-top: 8px;">
              <label for="inputBody">Additional</label>
              <input type="text" name="Additional" class="form-control" id="inputBody" value="{{$post->body}}">
            </div>
            <div class="form-group col-md-6" >
                <label for="" class="mt-2">Upload Media</label>
                <div class="clear"></div>
                @if ($post->image)
                  <img class="img-fluid" width="100px;" height="auto" src="{{asset('uploads/postsimage/' . $post->image)}}" alt="">
                @endif
                <input class="form-control form-control " \ name="Image" id="formFileSm" type="file">
            </div>
          </div>
<a class="btn  btn-danger" href="{{url('/dashboard/posts')}}">Cancel</a>
        <button type="submit"  class="btn  btn-success">Update</button>
      </form>

</div>
<!-- /.container-fluid -->

</div>



@endsection
