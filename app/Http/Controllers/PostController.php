<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\UploadedFile;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $cat = Category::all();
        $posts = Post::orderBy('created_at', 'desc')->get();


        return view('dashboard.posts.index')->with('posts' , $posts)->with('cat', $cat);
    }
    public function newPost()
    {
        $cat = Category::where('status', 1)->get();
        return view('dashboard.posts.add', ['cat' =>$cat]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Post::all();
        $cat = Category::all();
        return view('dashboar.posts.add', ['post'=> $post, 'cat' => $cat]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['Title' => 'required|min:3|max:255']);
        $posts = new Post();
        $posts->title = $request->Title;
        $posts->description = $request->Description;
        $posts->sdesc = $request->ShortDescription;
        $posts->body = $request->Additional;
        $posts->category_id = $request->category_id;
        // $posts->image = $request->Image->store('images', 'public');
        if($request->hasfile('Image')){
            $file = $request->file('Image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/postsimage/', $filename);
            $posts->image = $filename;
        } else {
            return $request;
            $posts->image = '';
        }
        $posts->save();
        return Redirect('dashboard/posts')->with('posts' , $posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id)
    {
        $post = Post::find($id);
        $cat = Category::where('status', 1)->get();
        return view('dashboard/posts/edit')->with('post', $post)->with('cat', $cat);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $posts = Post::find($request->id);
        $posts->title = $request->Title;
        $posts->description = $request->Description;
        $posts->sdesc = $request->ShortDescription;
        $posts->body = $request->Additional;
        $posts->category_id = $request->category_id;
        $posts->save();
        return Redirect('dashboard/posts')->with('posts' , $posts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post , $id)
    {
        // dd($id);
        Post::destroy(array('id',$id));
        return Redirect ('dashboard/posts');
    }

}
