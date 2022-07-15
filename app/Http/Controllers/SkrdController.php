<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retribusi;
use App\Models\Registrasi;


class SkrdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrasi()
    {
        $data = Retribusi::with('registrasi','registrasi.makam','registrasi.ahliwaris','registrasi.retribusi')->groupBy('registrasi_id')->get('registrasi_id','uraian','nominal');
        return view('pages.skrd.registrasi', compact('data'));
    }

    public function herregistrasi(Request $request)
    {
        $data = Registrasi::with('herregistrasi','ahliwaris','makam')->get();
        if ($request->ajax()) {
            $data = Registrasi::with('herregistrasi','ahliwaris','makam')->where('id', $request->id)->get();
            return response()->json($data);
        }
        return view('pages.skrd.herregistrasi',compact('data'));
    }

    public function skrd(Request $request)
    {
        $data = Retribusi::where('registrasi_id',$request->registrasi_id)->with('registrasi','registrasi.makam','registrasi.ahliwaris','registrasi.retribusi')->first();
        return view('pages.skrd.detail', compact('data'));
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
