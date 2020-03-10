<?php

namespace App\Http\Controllers;
use App\Author;
use Illuminate\Http\File;
use Illuminate\Http\Request;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Lists of Users";
        $data['authors']=Author::paginate('3');
        $data['serial']=($data['authors']->CurrentPage() != 1)?($data['authors']->Perpage()*($data['authors']->CurrentPage()-1))+1:1;
        return view('admin.author.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Create New Author";
        return view('admin.author.create',$data);
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
            'name' => 'required',
            'email' => 'required|email|unique:authors',
            'phone' => 'required|unique:authors',
            'status'=>'required',
        ]);
        $data = $request->all();
        if($request->photo){  
            $data['photo'] = $this->fileUpload($request->photo);
        }
        Author::create($data);
        session()->flash('message',"Author Added Successfully");
        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $data['title'] = "Details Author";
        $data['author'] = $author;
        return view('admin.author.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $data['title'] = "Edit Author";
        $data['author'] = $author;
        return view('admin.author.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
          $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$author->id,
            'phone' => 'required|unique:users,phone,'.$author->id,
            'status'=>'required',
        ]); 
        $data = $request->all();

        if($request->photo){  
            $data['photo'] = $this->fileUpload($request->photo);

        }
        if(file_exists($author->photo))
        {
            unlink($author->photo);
        }
        $author->update($data);
        session()->flash('message',"Author Updated Successfully");
        return redirect()->route('author.index');
    }
    private function fileUpload($img){
        $path = 'images/authors';
        $img->move($path,$img->getClientOriginalName());
        $fullpath = $path. '/'. $img->getClientOriginalName();
        return $fullpath; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
       if($author->photo && file_exists($author->photo))
       {
        unlink($author->photo);
    }
    $author->delete();
    session()->flash('message',"Deleted Successfully");
    return redirect()->route('author.index');
}
}
