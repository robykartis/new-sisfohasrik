<?php

namespace App\Http\Controllers;

use App\Models\KlarifikasiObrik;
use App\Models\PendaftaranObrik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranObrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftaran_obriks = DB::table('pendaftaran_obriks')
            ->join('klarifikasi_obriks', 'pendaftaran_obriks.klarifikasi', '=', 'klarifikasi_obriks.id')
            ->select('pendaftaran_obriks.*', 'klarifikasi_obriks.name_obrik')
            ->get();

        return view('pendaftaran_obrik.index', compact('pendaftaran_obriks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klarifikasi_obriks = KlarifikasiObrik::all();

        return view('pendaftaran_obrik.create', compact('klarifikasi_obriks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'kode' => 'required',
            'klarifikasi' => 'required',
            'nama' => 'required',
            'induk' => 'required',
        ]);

        PendaftaranObrik::create([
            'tahun' => $request->tahun,
            'kode' => $request->kode,
            'klarifikasi' => $request->klarifikasi,
            'nama' => $request->nama,
            'induk' => $request->induk,
        ]);

        return redirect()->route('pendaftaran_obrik.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PendaftaranObrik  $pendaftaranObrik
     * @return \Illuminate\Http\Response
     */
    public function show(PendaftaranObrik $pendaftaranObrik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PendaftaranObrik  $pendaftaranObrik
     * @return \Illuminate\Http\Response
     */
    public function edit(PendaftaranObrik $pendaftaranObrik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PendaftaranObrik  $pendaftaranObrik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PendaftaranObrik $pendaftaranObrik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PendaftaranObrik  $pendaftaranObrik
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendaftaranObrik $pendaftaranObrik)
    {
        //
    }
}
