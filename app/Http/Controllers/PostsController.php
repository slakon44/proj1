<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

use DB;

class PostsController extends Controller
{
    /**
     * protected my page - must be login:)
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //return "123";
      //$title = "pages";
      //return Post::all();
      //$posts = Post::all();
      //$posts = Post::where('title','tyt1')->get();
      //można też tak: $posts = DB::select('SELECT * from posts');
      // paginacja:
     //    $posts = Post::orderBy('title','asc')->paginate(1);
     $posts = Post::orderBy('id','desc')->get();

     //$posts = User::all();
//return $posts;
      return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "pages";
      return view('posts.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'title' => 'required',
          'body' => 'required',
          'cover_image' => 'image|nullable|max:1999'
        ]);
        //handle File Upload
        if($request->hasFile('cover_image')){
            //get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload Image
            $path =$request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        //create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->text = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::find($id);
      return view('posts.show')->with('post',$post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::find($id);
      //check correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unautharized Page');
        }
      return view('posts.edit')->with('post',$post);
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
      $this->validate($request, [
        'title' => 'required',
        'body' => 'required'
      ]);

      //create post
      $post = Post::find($id);
      $post->title = $request->input('title');
      $post->text = $request->input('body');

      $post->save();

      return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unautharized Page');
        }


        $post->delete();

        return redirect('/posts')->with('success', 'Post Deleted');
    }
}
