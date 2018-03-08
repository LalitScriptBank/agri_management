<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Image;

class PostController extends Controller
{
    


     public function __construct()
    {
        $this->middleware('auth:admin');
          
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $auth_id = Auth::id();
        $post = new Post;
       $post->title = $request->title;
       $post->body = $request->body;
       $post->author_id = $auth_id;
       $post->slug = $request->slug;
       $post->category = $request->category;
       $post->status = $request->publish;

      

       $photo = $request->file('image');
        $imagename = time().'.'.$photo->getClientOriginalExtension(); 
        $destinationPath = public_path('/images');
        $post->image = $imagename;
   
        
         Image::make($photo->getRealPath())->resize(100, 100)->save($destinationPath.'/'.$imagename,80);
         

         $post->save();
                    
        
         
       return redirect()->back()->with('success', 'Profile updated!');; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {    
        $post = Post::where('slug',$slug)->where('status','on')->get();
         return view('welcome',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
