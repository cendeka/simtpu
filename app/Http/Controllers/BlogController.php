<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Auth;
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
        $post = Blog::limit(11)->get();

        return view('pages.blog.index', compact('post'));
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
        return view('pages.blog.tambah');
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
        $user_name = Auth::user()->first_name;

        $this->validate($request, [
            'judul' => 'required',
            'kategori' => 'required',
            // 'file' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'post' => 'required',
        ]);
        $post_id = $request->post_id;
        $old = Blog::where('id', $post_id)->first();
        if ($old != null) {
            // code...
            $imagePath = public_path('/storage/blog/'.$old->foto);

            if ($old->foto != '') {
                unlink($imagePath);
            }
        }

        if ($request->file()) {
            $fileName = $request->judul.'_thumbnail'.'.'.$request->file->getClientOriginalExtension();
            $filePath = $request->file('file')->storeAs('blog', $fileName, 'public');
            $foto = $request->judul.'_thumbnail'.'.'.$request->file->getClientOriginalExtension();
            $foto_path = '/storage/'.$filePath;
        }
        $post = Blog::updateOrCreate(
            [
                'id' => $post_id,
            ],
            [
                'user_id' => $user_id,
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'author' => $user_name,
                'foto' => $foto,
                'foto_path' => $foto_path,
                'post' => $request->post,
            ]);

        return redirect()->route('blog.index')->with('message', 'Data Berhasil Disimpan');
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
    public function edit(Request $request)
    {
        $post = Blog::where('id', $request->id)->first();

        return view('pages.blog.tambah', compact('post'));
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
    public function destroy(Request $request)
    {
        $data = Blog::where('id', $request->id)->delete();

        return redirect()->back()->with('message', 'Data Berhasil Dihapus');
    }
}
