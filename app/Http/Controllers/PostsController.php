<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\Tag;
use Session;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();

        if($categories->count() == 0 || $tags->count() == 0){

            Session::flash('info', 'You must have some categories and Tags before  attempting to create a  post.');

            return redirect()->back();
    }

        return view('admin.posts.create')->with('categories', $categories)
                        ->with('tags',$tags); 
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
            'content' => 'required',
            'featured' => 'required|image',
            'category_id' => 'required',
            'tags' => 'required',
           
        ]);   

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $posts = Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'featured' => 'uploads/posts/' . $featured_new_name,
                'category_id'=> $request->category_id,
                 'slug' => Str::slug($request->title),
                 'user_id' => Auth::id(),

        ]);

        $posts->tags()->attach($request->tag);

        Session::flash('success', 'Post created successfully');

         return redirect()->route('posts'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts= Post::find($id);

        return view('admin.posts.edit')->with('posts', $posts)->with('categories',Category::all())
            ->with('tags', Tag::all());
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
            'content' => 'required', 
            'category_id' => 'required',
            'featured' => 'sometimes|image|file',
        ]);

        $posts = Post::find($id);

        if($request->hasFile('featured')){

            $featured = $request->featured;

            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            // new name
            $posts->featured = 'uploads/posts/'. $featured_new_name;
        }

            

            $posts->title = $request->title;
            $posts->content = $request->content;
            $posts->category_id = $request->category_id;

            $posts->save();

            //deletes all the tags from the post and calls the attach to attach the new info

            $posts->tags()->sync($request->tags);

            Session::flash('success', 'Post Updated successfully');

            return redirect()->route('posts');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);

        $posts->delete();

        Session::flash('success', 'The Post was just Trashed');

        return redirect()->back();
    }


    public function trashed(){

        $posts = Post::onlyTrashed()->get(); //querybuilders need get to fetch the data

        return view('admin.posts.trashed')->with('posts', $posts);


    }

    public function kill($id){

        // Query Builder

        $posts = Post::withTrashed()->where('id',$id)->first();

        // deleted Permanently

        $posts->forceDelete();

        Session::flash('success', "Post deleted Permanently");


        return redirect()->back();
    }

    public function restore($id){

        // Query Builder

        $posts = Post::withTrashed()->where('id',$id)->first();

        // deleted Permanently

        $posts->restore();

        Session::flash('success', "Post restored successfully");


        return redirect()->route('posts');
    }


}
