<?php

namespace App\Http\Controllers;

use App\Models\Lhp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class LhpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $nama_pendaftaran = DB::table('pendaftaran_obriks')->get();
        $nama_klarifikasi = DB::table('klarifikasi_obriks')->get();

        if ($request->ajax()) {
            $data = DB::table('lhps')
                ->leftjoin('pendaftaran_obriks', 'pendaftaran_obriks.id', '=', 'lhps.pendaftaran_obriks')
                ->leftjoin('klarifikasi_obriks', 'klarifikasi_obriks.id', '=', 'lhps.klarifikasi_obriks')
                ->leftjoin('jenis_pemeriksaans', 'jenis_pemeriksaans.id', '=', 'lhps.jenis_pemeriksaans')
                ->select(
                    'lhps.*',
                    'pendaftaran_obriks.nama as nama_pendaftaran_obrik',
                    'klarifikasi_obriks.name_obrik as nama_klarifikasi_obrik',
                    'jenis_pemeriksaans.nama as nama_jenis_pemeriksaan'
                );
            if (!empty($request->tahun)) {
                $data->where('lhps.tahun', $request->tahun);
            }
            if (!empty($request->nama_pendaftaran)) {
                $data->where('pendaftaran_obriks', $request->nama_pendaftaran);
            }
            if (!empty($request->nama_klarifikasi)) {
                $data->where('klarifikasi_obriks', $request->nama_klarifikasi);
            }
            $data = $data->get();
            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('users.show', $row->id) . '"  class="text-primary btn btn-md"><i class="bi bi-eye-fill"></i></a> | ';
                    $btn = $btn . '<a href="' . route('users.edit', $row->id) . '" class="text-info  btn btn-md"><i class="bi bi-pencil-fill"></i></a> | ';
                    $btn = $btn . '<a href="' . url('users/hapus', $row->id) . '" onclick="confirmDelete()" class="text-danger  btn btn-md"><i class="bi bi-trash-fill"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // dd($data);
        return view('lhp.index', compact('nama_pendaftaran', 'nama_klarifikasi', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $nama_pendaftaran = DB::table('pendaftaran_obriks')->get();
        $nama_klarifikasi = DB::table('klarifikasi_obriks')->get();
        $title = 'Input Daftar Obyek Pemeriksaan (Obrik)';
        return view('lhp.create', compact('nama_pendaftaran', 'nama_klarifikasi', 'request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the form input
        $request->validate([
            'no_lhp' => 'required',
            'tahun' => 'required',
            'pendaftaran_obriks' => 'required',
            'klarifikasi_obriks' => 'required',
            'tgl_lhp' => 'required',
        ]);

        // create a new data item
        $data = new Lhp;
        $data->no_lhp = $request->no_lhp;
        $data->tahun = $request->tahun;
        $data->pendaftaran_obriks = $request->pendaftaran_obriks;
        $data->klarifikasi_obriks = $request->klarifikasi_obriks;
        // parse the date string and save it to the database
        $data->tgl_lhp = Carbon::parse($request->tgl_lhp)->format('Y-m-d');
        $data->save();
        // redirect to a confirmation page
        return redirect()->route('lhp.index')->with('success', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lhp  $lhp
     * @return \Illuminate\Http\Response
     */
    public function show(Lhp $lhp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lhp  $lhp
     * @return \Illuminate\Http\Response
     */
    public function edit(Lhp $lhp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lhp  $lhp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lhp $lhp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lhp  $lhp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lhp $lhp)
    {
        //
    }
}
