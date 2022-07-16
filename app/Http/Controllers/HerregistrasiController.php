<?php

namespace App\Http\Controllers;

use App\Models\Herregistrasi;
use App\Models\Registrasi;

use Illuminate\Http\Request;

class HerregistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Registrasi::with('herregistrasi','ahliwaris','makam')->get();
        return view('pages.herregistrasi.index');
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
        $herrID = $request->herrID;

        $herregistrasi = Herregistrasi::updateOrCreate(
            [
                'id' => $herrID,
            ],
            [
                'registrasi_id' => $request->registrasi_id,
                'masa' => $request->masa,
                'tahun' => $request->tahun,
                'nominal' => $request->nominal,
                'keterangan' => $request->keterangan,
            ]
        );
        return redirect()->back()->with('message', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Herregistrasi  $herregistrasi
     * @return \Illuminate\Http\Response
     */
    public function show(Herregistrasi $herregistrasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Herregistrasi  $herregistrasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Herregistrasi $herregistrasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Herregistrasi  $herregistrasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Herregistrasi $herregistrasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Herregistrasi  $herregistrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Herregistrasi $herregistrasi)
    {
        //
    }
}
