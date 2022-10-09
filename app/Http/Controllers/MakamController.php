<?php

namespace App\Http\Controllers;

use App\Models\Makam;
use Auth;
use Illuminate\Http\Request;

class MakamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tpu = Auth::user()->roles->first()->display_name;
        if ($tpu == "Admin") {
            # code...
            $data = Makam::with('registrasi.herregistrasi')->get();
        } else {
            # code...
            $data = Makam::with('registrasi.herregistrasi')->where('nama_tpu', $tpu)->get();

        }
        
        return view('pages.makam.index', compact('data'));
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
    public function show(Request $request)
    {
        $data = Makam::where('registrasi_id', $request->registrasi_id)->with('registrasi', 'registrasi.ahliwaris')->first();

        return view('pages.makam.detail', compact('data'));
    }

    public function publik(Request $request)
    {
        $kode_registrasi = $request->kode_registrasi;
        $data = Makam::whereHas('registrasi', function ($q) use ($kode_registrasi) {
            $q->where('kode_registrasi', $kode_registrasi);
        })->first();

        return view('pages.makam.publik', compact('data'));
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

    public function fotoUpload(Request $req)
    {
        $req->validate([
            'file' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        $RegID = $req->registrasi_id;
        $old = Makam::where('registrasi_id', $RegID)->first();
        $imagePath = public_path('/storage/uploads/'.$old->foto);
        if ($old->foto != '') {
            unlink($imagePath);
        }
        if ($req->file()) {
            $fileName = $RegID.'.'.$req->file->getClientOriginalExtension();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $foto = $RegID.'.'.$req->file->getClientOriginalExtension();
            $foto_path = '/storage/'.$filePath;
        }

        $makam = Makam::updateOrCreate(
            [
                'registrasi_id' => $RegID,
            ],
            [
                'foto' => $foto,
                'foto_path' => $foto_path,
            ]
        );

        return redirect()->back()->with('message', 'Data Berhasil Disimpan');
    }
}
