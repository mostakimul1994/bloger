<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Author;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'List of all posts';
        $data['posts'] = Post::with('category')->orderBy('id','DESC')->paginate(5);
        $data['serial'] = ($data['posts']->CurrentPage() != 1)?($data['posts']->Perpage()*($data['posts']->CurrentPage()-1))+1:1;
        return view('admin.post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create new Post';
        $data['categories'] = Category::where('status','Active')->orderBy('name','ASC')->pluck('name','id');
        $data['authors'] = Author::where('status','Active')->orderBy('name','ASC')->pluck('name','id');
        return view('admin.post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'author_id' => 'required',
            'title' => 'required',
            'details' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = $this->fileUpload($request->image);
        }
        Post::create($data);
        session()->flash('message','Post created successfully');
        return redirect()->route('post.index');
    }

    private function fileUpload($img)
    {
        $path = 'images/posts';
        $file_name = time().rand(00000,99999).'.'.$img->getClientOriginalExtension();
        $img->move($path, $file_name);
        $fullPath = $path . '/' . $file_name;
        return $fullPath;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
        public function show($id)
    {
        $data['title'] = 'Post Details';
        $data['post'] = Post::with('category','author')->findOrFail($id);
        return view('admin.post.show',$data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data['title'] = 'Edit  Post';
        $data['categories'] = Category::where('status','Active')->orderBy('name','ASC')->pluck('name','id');
        $data['authors'] = Author::where('status','Active')->orderBy('name','ASC')->pluck('name','id');
        $data['post'] = $post;
        return view('admin.post.edit',$data);
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
        $request->validate([
            'category_id' => 'required',
            'author_id' => 'required',
            'title' => 'required',
            'details' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        if($request->hasFile('image')){
            $data['image'] = $this->fileUpload($request->image);
            if($post->image && file_exists($post->image)){
                unlink($post->image);
            }
        }
        if(!$request->has('is_featured'))
        {
            $data['is_featured'] = 0;
        }
        $post->update($data);
        session()->flash('message','Post updated successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       if($post->image && file_exists($post->image)){
        unlink($post->image);
    }
    $post->delete();
    session()->flash('message','Post deleted successfully');
    return redirect()->route('post.index');

    }
}
