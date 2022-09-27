<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function detail(Request $request)
    {
        $post = Blog::where('id', $request->id)->first();

        return view('pages.blog.detail', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view ('pages.blog.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'judul' => 'required',
            'kategori' => 'required',
            'file' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'post' => 'required'
       ]);

       if($request->file()) {
           $fileName = $request->judul.'_thumbnail'.'.'.$request->file->getClientOriginalExtension();
           $filePath = $request->file('file')->storeAs('blog', $fileName, 'public');
           $foto =  $request->judul.'_thumbnail'.'.'.$request->file->getClientOriginalExtension();
           $foto_path = '/storage/' . $filePath;
       }
       $post = Blog::create([
            'user_id' => $user_id,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'foto' => $foto,
            'foto_path' => $foto_path,
            'post' => $request->post
       ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
