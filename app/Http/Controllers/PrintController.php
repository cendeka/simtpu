<?php

namespace App\Http\Controllers;

use App\Models\Makam;
use Auth;
use Illuminate\Http\Request;
use PDF;

class PrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makam()
    {
        $tpu = Auth::user()->roles->first()->display_name;
        if ($tpu == 'Admin') {
            // code...
            $data = Makam::whereYear('tanggal_dimakamkan', 2020)->with('registrasi.herregistrasi', 'registrasi.ahliwaris')->get();
        } else {
            // code...
            $data = Makam::whereYear('tanggal_dimakamkan', 2020)->with('registrasi.herregistrasi', 'registrasi.ahliwaris')->where('nama_tpu', $tpu)->get();
        }

        return view('pages.print.makam', compact('data'));
    }

    public function makamPDF()
    {
        // retreive all records from db
        $tpu = Auth::user()->roles->first()->display_name;
        if ($tpu == 'Admin') {
            // code...
            $data = Makam::whereYear('tanggal_dimakamkan', 2020)->with('registrasi.herregistrasi', 'registrasi.ahliwaris')->get();
        } else {
            // code...
            $data = Makam::whereYear('tanggal_dimakamkan', 2020)->with('registrasi.herregistrasi', 'registrasi.ahliwaris')->where('nama_tpu', $tpu)->get();
        }        // share data to view
        $pdf = PDF::loadView('pages.print.makam', compact('data'));

        return $pdf->stream();
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
