<?php

namespace App\Http\Controllers;

use App\Models\Konfigurasi;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Konfigurasi::get();
        return view('pages.konfigurasi.index',compact('data'));
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
        //
    //   $konfig = Konfigurasi::create($request->all());
    $id = $request->id;
    $konfig = Konfigurasi::updateOrCreate(
        [
            'id' => $id,
        ],
        
        $request->all()
        
    ); 
      return redirect()->back()->with('message', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Konfigurasi  $konfigurasi
     * @return \Illuminate\Http\Response
     */
    public function show(Konfigurasi $konfigurasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Konfigurasi  $konfigurasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Konfigurasi $konfigurasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Konfigurasi  $konfigurasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $konfig = Konfigurasi::where('id', $request->id)->first();
	    return response()->json([
	      'data' => $konfig
	    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Konfigurasi  $konfigurasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Konfigurasi $konfigurasi)
    {
        //
    }
}
