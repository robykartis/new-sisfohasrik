<?php

namespace App\Http\Controllers;

use App\Models\KodeRekomendasi;
use App\Models\KodeTlhp;
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
            $temuan = $request->id;
            $status_tlhp = [
                'S' => 'Selesai',
                'B' => 'Belum',
                'D' => 'Dalam Proses'
            ];
            $data = DB::table('rekomendasi')
                ->join('temuan', 'rekomendasi.id_temuan', '=', 'temuan.id')
                ->join('kode_rekomendasi', 'rekomendasi.kode_rekomendasi', '=', 'kode_rekomendasi.id')
                ->join('kode_tlhp', 'rekomendasi.kode_tlhp', '=', 'kode_tlhp.id')
                ->where('rekomendasi.id_temuan', $temuan)
                ->select(
                    'rekomendasi.*',
                    'kode_rekomendasi.kode as kod_rekomendasi',
                    'kode_tlhp.kode as kod_tlhp',
                    DB::raw("CASE status_tlhp 
                    WHEN 'S' THEN 'Selesai'
                    WHEN 'B' THEN 'Belum'
                    WHEN 'D' THEN 'Dalam Proses'
                    END as status_tlhp_string")
                )
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row,) {
                    $btn = '<div class="d-flex justify-content-between">';
                    $btn .=  '<a href="' . route('rekomendasi.edit', $row->id) . '" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a>|';
                    $btn .= ' <a href="' . route('rekomendasi.show', $row->id) . '" data-toggle="tooltip"   data-original-title="Delete" class="btn btn-sm btn-warning " data-bs-toggle="tooltip" title="Show"><i class="far fa-check-circle"></i></a>|';
                    $btn .= ' <a href="' . url('rekomendasi/hapus', $row->id) . '" data-toggle="tooltip"  onclick="confirmDelete()" data-original-title="Delete" class="btn btn-sm btn-danger " data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></a>';
                    $btn .= '</div>';
                    return $btn;
                })

                ->rawColumns(['action', 'uraian_rekomendasi', 'uraian_tlhp'])
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
        $kod_rekomendasi = KodeRekomendasi::all();
        $kod_tlhp = KodeTlhp::all();
        $title_lhp = 'Data LHP';
        $title_temuan = 'Data Temuan';
        $title = 'Penyebab Penyimpangan';
        return view('rekomendasi.create', compact(
            'kod_rekomendasi',
            'kod_tlhp',
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

        $rekomendasi = $request->validate([
            'id_temuan' => 'required',
            'no_rekomendasi' => 'required',
            'uraian_rekomendasi' => 'required',
            'kode_rekomendasi' => 'required',
            'status_tlhp' => 'required',
            'tgl_tlhp' => 'required',
            'kode_tlhp' => 'required',
            'uraian_tlhp' => 'required',
        ]);
        // dd($rekomendasi);

        try {
            $rekomendasi = new Rekomendasi;
            $rekomendasi->id_temuan = $request->id_temuan;
            $rekomendasi->no_rekomendasi = $request->no_rekomendasi;
            $rekomendasi->uraian_rekomendasi = $request->uraian_rekomendasi;
            $rekomendasi->kode_rekomendasi = $request->kode_rekomendasi;
            $rekomendasi->status_tlhp = $request->status_tlhp;
            $rekomendasi->tgl_tlhp = $request->tgl_tlhp;
            $rekomendasi->kode_tlhp = $request->kode_tlhp;
            $rekomendasi->uraian_tlhp = $request->uraian_tlhp;
            $kode = Rekomendasi::find($request->id);
            if (!$kode) {
                $rekomendasi['created_by'] = auth()->user()->level;
                $rekomendasi['created_by_id'] = auth()->user()->id;
            }
            $rekomendasi['updated_by'] = auth()->user()->name;
            $rekomendasi['updated_by_id'] = auth()->user()->id;
            $rekomendasi->save();

            return redirect()->route('rekomendasi.index', $request->id_temuan)->with('success', 'Tambah Data Berhasil');
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
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
    public function edit(Request $request, $id)
    {
        $data_rekomendasi = Rekomendasi::find($id);
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
        $status_tlhp = DB::table('rekomendasi')->where('id', $id)->value('status_tlhp');
        $kod_rekomendasi = KodeRekomendasi::all();
        $tgl_rekomendasi = Carbon::parse($data_rekomendasi->tgl_tlhp)->isoFormat(' D MMMM Y');
        $kod_tlhp = KodeTlhp::all();
        $title_lhp = 'Data LHP';
        $title_temuan = 'Data Temuan';
        $title = 'Penyebab Penyimpangan';
        return view('rekomendasi.edit', compact(
            'tgl_rekomendasi',
            'status_tlhp',
            'data_rekomendasi',
            'kod_rekomendasi',
            'kod_tlhp',
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
    public function destroy(Rekomendasi $rekomendasi, $id)
    {
        $penyebab = Rekomendasi::findOrfail($id);
        $penyebab->delete();
        return redirect()->back()->withInput()->with('success', 'Data berhasil dihapus');
    }
}
