<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index')->with('posts',Post::orderBy('id','DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate
        ([            
            'title'=>'required',
            'image'=>'required_without:image_path|prohibits:image_path|mimes:svg,png,jpg,jpeg|max:5048',
            'image_path'=>'required_without:image|prohibits:image',
            'description'=>'required',
            'cat'=>'required'
        ]);
        $slug = Str::slug($request->title, '-');
        
        if ($request->image_path ==null ) {
            $newImgName = uniqid().'-'.$request->title.'.'.$request->image->extension();
            $request->image->move(public_path('images'),$newImgName);
            # code...
        }else{
            $newImgName =$request->image_path;
        }
        
        Post::create(
            [
                'title' => $request->input('title')
                ,'slug' => $slug
                ,'description' => $request->input('description')
                ,'image_path' => $newImgName
                ,'user_id' => auth()->user()->id
                ,'cat' => $request->input('cat')

            ]
        );
        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        return view('blog.show')
        ->with('post', Post::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        return view('blog.edit')
        ->with('post', Post::where('slug',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate
        ([            
            'title'=>'required',
            'image'=>'required_without:image_path|prohibits:image_path|mimes:svg,png,jpg,jpeg|max:5048',
            'image_path'=>'required_without:image|prohibits:image',
            'description'=>'required',
            'cat'=>'required'
        ]);
        if ($request->image_path ==null ) {
            $newImgName = uniqid().'-'.$request->title.'.'.$request->image->extension();
            $request->image->move(public_path('images'),$newImgName);
        }else{
            $newImgName =$request->image_path;
        }
        Post::where('slug',$slug)->update(
            [
                'title' => $request->input('title')
                ,'description' => $request->input('description')
                ,'image_path' => $newImgName
                ,'user_id' => auth()->user()->id
                ,'cat' => $request->input('cat')

            ]
        );
        return redirect('/blog/'.$slug)->
        with('msg','Post edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        Post::where('slug',$slug)->delete();
        return redirect('/blog/')->
        with('msg','Post Deleted successfully');
    }
}