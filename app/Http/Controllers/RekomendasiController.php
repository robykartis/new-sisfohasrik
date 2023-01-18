<?php

namespace App\Http\Controllers;

use App\Models\Rekomendasi;
use App\Models\Temuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        // $data = DB::table('rekomendasi')
        //     ->join('temuan', 'rekomendasi.id_temuan', '=', 'temuan.id')
        //     ->join('kode_rekomendasi', 'rekomendasi.kode_rekomendasi', '=', 'kode_rekomendasi.id')
        //     ->join('kode_tlhp', 'rekomendasi.kode_tlhp', '=', 'kode_tlhp.id')
        //     ->select(
        //         'rekomendasi.id',
        //         'kode_rekomendasi.kode as kod_rekomendasi',
        //         'rekomendasi.uraian_rekomendasi',
        //         'rekomendasi.status_tlhp',
        //         'kode_tlhp.kode as kod_tlhp',
        //         'rekomendasi.uraian_tlhp',
        //     )
        //     ->get();
        // dd($data);
        if ($request->ajax()) {
            $data = $request->id;
            $data = DB::table('rekomendasi')
                ->join('temuan', 'rekomendasi.id_temuan', '=', 'temuan.id')
                ->join('kode_rekomendasi', 'rekomendasi.kode_rekomendasi', '=', 'kode_rekomendasi.id')
                ->join('kode_tlhp', 'rekomendasi.kode_tlhp', '=', 'kode_tlhp.id')
                ->select(
                    'rekomendasi.*',
                    'kode_rekomendasi.kode as kod_rekomendasi',
                    'kode_tlhp.kode as kod_tlhp'
                )
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-between">';
                    $btn .=  '<a href="' . route('penyebab.edit', $row->id) . '" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a>|';
                    $btn .= ' <a href="' . route('penyebab.show', $row->id) . '" data-toggle="tooltip"   data-original-title="Delete" class="btn btn-sm btn-warning " data-bs-toggle="tooltip" title="Show"><i class="far fa-check-circle"></i></a>|';
                    $btn .= ' <a href="' . url('penyebab/hapus', $row->id) . '" data-toggle="tooltip"  onclick="confirmDelete()" data-original-title="Delete" class="btn btn-sm btn-danger " data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></a>';
                    $btn .= '</div>';
                    return $btn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        $temuan = Temuan::find($id);
        // dd($temuan);
        $data = DB::table('lhp')
            ->join('klarifikasi_obrik', 'klarifikasi_obrik.id', '=', 'lhp.klarifikasi')
            ->join('obrik', 'obrik.id', '=', 'lhp.obrik')
            ->select('lhp.*', 'klarifikasi_obrik.nama', 'obrik.nama AS nama_obrik')
            ->where('lhp.id', $temuan->id_lhp)
            ->first();
        // dd($data);
        $tgl_lhp = Carbon::parse($data->tgl_lhp)->isoFormat(' D MMMM Y');

        $kode = DB::table('temuan')
            ->join('kode_temuan', 'temuan.kode_temuan', '=', 'kode_temuan.id')
            ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
            ->select('kode_temuan.nama', 'kode_bidang.nama as bidang')
            ->where('kode_temuan.id', $temuan->kode_temuan)
            ->where('kode_bidang.id', $temuan->bidang_temuan)
            ->first();
        $title_lhp = 'Data LHP';
        $title_temuan = 'Data Temuan';
        $title = 'Penyebab Penyimpangan';
        return view('rekomendasi.index', compact('title_lhp', 'title_temuan', 'kode', 'data', 'tgl_lhp', 'title', 'request', 'id', 'temuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $temuan = Temuan::findOrFail($id);
        // dd($temuan);
        $data = DB::table('lhp')
            ->join('klarifikasi_obrik', 'klarifikasi_obrik.id', '=', 'lhp.klarifikasi')
            ->join('obrik', 'obrik.id', '=', 'lhp.obrik')
            ->select('lhp.*', 'klarifikasi_obrik.nama', 'obrik.nama AS nama_obrik')
            ->where('lhp.id', $temuan->id_lhp)
            ->first();
        // dd($data);
        $tgl_lhp = Carbon::parse($data->tgl_lhp)->isoFormat(' D MMMM Y');

        $kode = DB::table('temuan')
            ->join('kode_temuan', 'temuan.kode_temuan', '=', 'kode_temuan.id')
            ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
            ->select('kode_temuan.nama', 'kode_bidang.nama as bidang')
            ->where('kode_temuan.id', $temuan->kode_temuan)
            ->where('kode_bidang.id', $temuan->bidang_temuan)
            ->first();
        $title_lhp = 'Data LHP';
        $title_temuan = 'Data Temuan';
        $title = 'Penyebab Penyimpangan';
        return view('rekomendasi.create', compact(
            'title_lhp',
            'title_temuan',
            'kode',
            'data',
            'tgl_lhp',
            'title',
            'request',
            'id',
            'temuan'
        ));
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
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function show(Rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekomendasi $rekomendasi)
    {
        //
    }
}
