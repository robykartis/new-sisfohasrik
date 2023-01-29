<?php

namespace App\Http\Controllers;

use App\Models\KodeRekomendasi;
use App\Models\KodeTlhp;
use App\Models\Lhp;
use App\Models\Rekomendasi;
use App\Models\Temuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TindaklanjutController extends Controller
{

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
                    $btn .=  '<a href="' . route('tindaklanjut.edit', $row->id) . '" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a>|';
                    $btn .= ' <a href="' . route('tindaklanjut.show', $row->id) . '" data-toggle="tooltip"   data-original-title="Delete" class="btn btn-sm btn-warning " data-bs-toggle="tooltip" title="Show"><i class="far fa-check-circle"></i></a>|';
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
        return view('tindaklanjut.index', compact('title_lhp', 'title_temuan', 'kode', 'data', 'tgl_lhp', 'title', 'request', 'id', 'temuan'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request, $id)
    {
        $data_rekomendasi = Rekomendasi::findOrFail($id);

        $data_tgl_tlhp = Carbon::parse($data_rekomendasi->tlhp_tgl)->isoFormat(' D MMMM Y');
        $status_tlhp = [
            'S' => 'Selesai',
            'B' => 'Belum',
            'D' => 'Dalam Proses'
        ];
        $data = Lhp::join('temuan', 'lhp.id', '=', 'temuan.id_lhp')
            ->join('klarifikasi_obrik', 'lhp.klarifikasi', '=', 'klarifikasi_obrik.id')
            ->join('obrik', 'lhp.obrik', '=', 'obrik.id')
            ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
            ->join('kode_temuan', 'temuan.kode_temuan', '=', 'kode_temuan.id')
            ->select(
                'klarifikasi_obrik.nama AS klarifikasi_obrik_nama',
                'obrik.nama AS obrik_nama',
                DB::raw("DATE_FORMAT(lhp.tgl_lhp, '%d %M %Y') as tgl_lhp"),
                'lhp.id as lhp_id',
                'lhp.no_lhp as lhp_no',
                'lhp.tahun as lhp_tahun',
                'temuan.id as temuan_id',
                'temuan.no_temuan as temuan_no',
                'temuan.judul_temuan as temuan_judul',
                'kode_bidang.nama as bidang_temuan',
                'kode_temuan.nama as kod_temuan',
            )
            ->where('temuan.id', $data_rekomendasi->id_temuan)->first();
        $data_tgl_lhp = Carbon::parse($data->tgl_lhp)->isoFormat(' D MMMM Y');
        $data_tgl_rekomendasi = Carbon::parse($data_rekomendasi->tgl_tlhp)->isoFormat(' D MMMM Y');
        $kod_rekomendasi = Rekomendasi::join('kode_rekomendasi', 'rekomendasi.kode_rekomendasi', '=', 'kode_rekomendasi.id')
            ->join('kode_tlhp', 'rekomendasi.kode_tlhp', '=', 'kode_tlhp.id')
            ->select(
                'kode_rekomendasi.kode as kode_rekomendasi_kode',
                'kode_tlhp.kode as kode_tlhp_kode',
                'rekomendasi.*'
            )
            ->where('rekomendasi.id', $id)
            ->first();
        $kod_tlhp = DB::table('rekomendasi')
            ->join('kode_tlhp', 'rekomendasi.kode_tlhp', '=', 'kode_tlhp.id')
            ->select('kode_tlhp.*')
            ->where('rekomendasi.id', $data_rekomendasi->id)
            ->get();
        $kod_tlhp = KodeTlhp::all();
        // $status_tlhp = ['S' => 'Selesai', 'B' => 'Belum', 'D' => 'Dalam Proses'];
        $data_status_tlhp = Rekomendasi::where('id', $id)
            ->whereIn('status_tlhp', ['S', 'B', 'D'])
            ->get();
        // dd($data);
        return view('tindaklanjut.show', compact(
            'data_status_tlhp',
            'data_rekomendasi',
            'data_tgl_rekomendasi',
            'kod_rekomendasi',
            'data',
            'data_tgl_tlhp',
            'status_tlhp',
            'kod_tlhp',
            'data_tgl_lhp',
            'request',
            'id'
        ));
    }


    public function edit(Request $request, $id)
    {
        $data_rekomendasi = Rekomendasi::findOrFail($id);

        $data_tgl_tlhp = Carbon::parse($data_rekomendasi->tlhp_tgl)->isoFormat(' D MMMM Y');
        $status_tlhp = [
            'S' => 'Selesai',
            'B' => 'Belum',
            'D' => 'Dalam Proses'
        ];
        $data = Lhp::join('temuan', 'lhp.id', '=', 'temuan.id_lhp')
            ->join('klarifikasi_obrik', 'lhp.klarifikasi', '=', 'klarifikasi_obrik.id')
            ->join('obrik', 'lhp.obrik', '=', 'obrik.id')
            ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
            ->join('kode_temuan', 'temuan.kode_temuan', '=', 'kode_temuan.id')
            ->select(
                'klarifikasi_obrik.nama AS klarifikasi_obrik_nama',
                'obrik.nama AS obrik_nama',
                DB::raw("DATE_FORMAT(lhp.tgl_lhp, '%d %M %Y') as tgl_lhp"),
                'lhp.id as lhp_id',
                'lhp.no_lhp as lhp_no',
                'lhp.tahun as lhp_tahun',
                'temuan.id as temuan_id',
                'temuan.no_temuan as temuan_no',
                'temuan.judul_temuan as temuan_judul',
                'kode_bidang.nama as bidang_temuan',
                'kode_temuan.nama as kod_temuan',
            )
            ->where('temuan.id', $data_rekomendasi->id_temuan)->first();
        $data_tgl_lhp = Carbon::parse($data->tgl_lhp)->isoFormat(' D MMMM Y');
        $data_tgl_rekomendasi = Carbon::parse($data_rekomendasi->tgl_tlhp)->isoFormat(' D MMMM Y');
        $kod_rekomendasi = Rekomendasi::join('kode_rekomendasi', 'rekomendasi.kode_rekomendasi', '=', 'kode_rekomendasi.id')
            ->join('kode_tlhp', 'rekomendasi.kode_tlhp', '=', 'kode_tlhp.id')
            ->select(
                'kode_rekomendasi.kode as kode_rekomendasi_kode',
                'kode_tlhp.kode as kode_tlhp_kode',
                'rekomendasi.*'
            )
            ->where('rekomendasi.id', $id)
            ->first();
        $kod_tlhp = DB::table('rekomendasi')
            ->join('kode_tlhp', 'rekomendasi.kode_tlhp', '=', 'kode_tlhp.id')
            ->select('kode_tlhp.*')
            ->where('rekomendasi.id', $data_rekomendasi->id)
            ->get();
        $kod_tlhp = KodeTlhp::all();
        // dd($data);
        return view('tindaklanjut.edit', compact(
            'data_rekomendasi',
            'data_tgl_rekomendasi',
            'kod_rekomendasi',
            'data',
            'data_tgl_tlhp',
            'status_tlhp',
            'kod_tlhp',
            'data_tgl_lhp',
            'request',
            'id'
        ));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_temuan' => 'required',
                'status_tlhp' => 'required',
                'tgl_tlhp' => 'required',
                'kode_tlhp' => 'required',
                'uraian_tlhp' => 'required',
            ],

        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->all(),);
        }
        try {
            $data =  Rekomendasi::findOrFail($id);
            $data->id_temuan = $request->id_temuan;
            $data->status_tlhp = $request->status_tlhp;
            $data->tgl_tlhp = $request->tgl_tlhp;
            $data->kode_tlhp = $request->kode_tlhp;
            $data->uraian_tlhp = $request->uraian_tlhp;
            $kode = Rekomendasi::find($request->id);
            if (!$kode) {
                $data['created_by'] = auth()->user()->level;
                $data['created_by_id'] = auth()->user()->id;
            }
            $data['updated_by'] = auth()->user()->name;
            $data['updated_by_id'] = auth()->user()->id;
            $data->update();

            return redirect()->route('tindaklanjut.index', $request->id_temuan)->with('success', 'Edit Data Berhasil');
        } catch (\Throwable $e) {
            // echo $e->getMessage();
            return redirect()->route('tindaklanjut.edit', $id)->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }


    public function destroy($id)
    {
        //
    }
}
