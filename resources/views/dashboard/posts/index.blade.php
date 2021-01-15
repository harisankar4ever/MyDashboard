@extends('dashboard.master')
@section('content')



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Posts </h1>

                    <ul class="nav justify-content-end mb-5">
                        <li class="nav-item">
                          <a class="nav-link btn btn-sm btn-success mr-2" href="/dashboard/posts/new" title="Add Post" data-toggle="tooltip" data-placement="left"><i class="fa fa-plus" aria-hidden="true"></i> Add New Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-primary" href="/dashboard/categories/new" title="Manage Category" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-wrench" aria-hidden="true"></i> Manage Category</a>
                          </li>

                      </ul>
                      {{--  --}}
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" >
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Post Tables</h6>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive" style="overflow-x: hidden;" >
                                <table class="table table-bordered css-serial" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>short descrition</th>

                                            <th> Category</th>
                                            <th>Actions</th>

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
                                    @if($posts->count()>0)

                                      @foreach($posts as  $post)
                                        <tr class="tr">
                                            <td> </td>
                                            <td><img class="img-fluid" width="100px;" height="auto" src="{{asset('uploads/postsimage/' . $post->image)}}" alt=""></td>
                                        <td class="Title">{{{$post->title}}}</td>
                                            <td>{{{$post->description}}}</td>
                                            <td>{{{$post->sdesc}}}</td>

                                            <td>{{{$post->Category->name}}}</td>
                                            <td>

                                                {{-- <a   class="btn btn-warning btn-circle btn-sm edit" data-toggle="modal" data-target=".bd-example-modal-lg" data-idUpdate="{{$post->id}}" data-whatever="@mdo"> <i class="fas fa-edit"></i></a> --}}
                                                <a href="{{url('dashboard/posts/edit')}}/{{$post->id}}"  class="btn btn-warning btn-circle btn-sm edit" data-toggle="tooltip" title="Edit Post" > <i class="fas fa-edit"></i></a>
                                                <a href="{{url('dashboard/posts/delete')}}/{{$post->id}}" onclick="return confirm('Are you sure want to delete it ?' )"class="btn btn-danger btn-circle btn-sm" title="Delete Post" data-toggle="tooltip" data-placement="top">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
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


@endsection
