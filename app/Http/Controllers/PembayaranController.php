<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Herregistrasi;
use Illuminate\Http\Request;

class PembayaranController extends Controller
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
        $pembayaranId = $request->pembayaranId;

        $pembayaran = Pembayaran::updateOrCreate(
            [
                'id' => $pembayaranId,
            ],
            [
                'registrasi_id' => $request->registrasi_id,
                'no_inv' => $request->no_inv,
                'nominal' => $request->nominal,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ]
        );
        $herrID = $request->herrID;
        $herregistrasi = Herregistrasi::updateOrCreate(
            [
                'id' => $herrID,
            ],
            [
                'status' => "Sudah Bayar"
            ]
        );
        return redirect()->back()->with('message', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
