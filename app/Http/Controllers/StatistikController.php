<?php

namespace App\Http\Controllers;

use App\Exports\RegistrasiExport;
use App\Models\Makam;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tpu = [
            'Sirnalaya I',
            'Sirnalaya II',
        ];
        foreach ($tpu as $key => $value) {
            $makam = Makam::where('nama_tpu', $value)->count();
        }

        return view('pages.statistik.index', compact(
            'makam'
        ));
    }

    public function registrasi(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        $data = Registrasi::whereHas('makam', function ($query) use ($tahun, $bulan) {
            $query->whereYear('tanggal_meninggal', $tahun)
                  ->whereMonth('tanggal_meninggal', $bulan);
        })->get();

        return view('pages.laporan.registrasi', compact('data'));
    }

    public function laporanRegistrasi(Request $request)
    {
        return Excel::download(new RegistrasiExport($request->tahun, $request->bulan), 'Laporan Registrasi.xlsx');
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
