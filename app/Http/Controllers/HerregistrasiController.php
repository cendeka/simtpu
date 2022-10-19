<?php

namespace App\Http\Controllers;

use App\Models\Herregistrasi;
use App\Models\Konfigurasi;
use App\Models\Pembayaran;
use App\Models\Registrasi;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HerregistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tpu = Auth::user()->roles->first()->display_name;
        if ($tpu == 'Admin') {
            // code...
            $data = Registrasi::with('herregistrasi', 'ahliwaris', 'makam')->get();
        } else {
            // code...
            $data = Registrasi::with('herregistrasi', 'ahliwaris', 'makam')
            ->whereHas('makam', function ($q) use ($tpu) {
                // Query the name field in status table
                $q->where('nama_tpu', '=', $tpu); // '=' is optional
            })
            ->get();
        }

        $herr = Herregistrasi::where('registrasi_id', $request->registrasi_id)->get();
        $konfig = Konfigurasi::get();

        // if ($request->ajax()) {
        //     $data = Registrasi::with('herregistrasi','ahliwaris','makam')->where('id', $request->id)->get();
        //     return response()->json($data);
        // }
        return view('pages.herregistrasi.index', compact('data', 'herr', 'konfig'));
        // return view('pages.herregistrasi.index', compact('data'));
    }

    public function tagihan(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $status = $request->status;
        $tpu = Auth::user()->roles->first()->display_name;

        if (count($request->all()) >= 1) {
            $data = Herregistrasi::with('registrasi', 'pembayaran', 'registrasi.makam')->where(function ($query) use ($tahun, $bulan, $status) {
                $query->whereYear('tahun', $tahun)
                      ->whereMonth('tahun', $bulan)
                      ->where('status', $status);
            })->get();
        } elseif ($tpu != 'Admin') {
            $data = Herregistrasi::with('registrasi', 'pembayaran')->where(function ($query) {
                $query->whereYear('tahun', Carbon::now()->year);
            })->whereHas('registrasi.makam', function ($q) use ($tpu) {
                // Query the name field in status table
                $q->where('nama_tpu', '=', $tpu); // '=' is optional
            })->get();
        } else {
            /* case 2. email is not confirmed */
            $data = Herregistrasi::with('registrasi', 'pembayaran')->where(function ($query) {
                $query->whereYear('tahun', Carbon::now()->year);
            })->get();
        }

        // $pembayaran = Pembayaran::where('herr_id', 9)->first();

        // if ($request->status) {
        //     # code...
        //     $data = Herregistrasi::with('registrasi')->whereYear('tahun',$request->tahun)->where('masa', $request->masa)->where('status', $request->status)->get();

        // } else {
        //     # code...
        //     $data = Herregistrasi::with('registrasi')->whereYear('tahun',$request->tahun)->where('masa', $request->masa)->get();

        // }

        return view('pages.herregistrasi.tagihan', compact('data'));
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
        $tahun = Carbon::parse($request->tahun)->format('Y');
        $bulan = Carbon::parse($request->tahun)->format('m');
        $no = rand(100000, 999999);
        $string = ['Rp', '.'];
        $nominal = $request->nominal;

        $herregistrasi = Herregistrasi::updateOrCreate(
            [
                'id' => $herrID,
            ],
            [
                'no_inv' => 'INV/'.$no.'/'.$bulan.'/'.$tahun,
                'registrasi_id' => $request->registrasi_id,
                'tahun' => $request->tahun,
                'nominal' => str_replace($string, '', $nominal),
                'uraian' => $request->uraian,
                'status' => 'Belum Bayar',
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

    public function getHerr(Request $request)
    {
        $herr = Herregistrasi::where('id', $request->id)->get();

        return response()->json($herr);
    }
}
