<?php

namespace App\Http\Controllers;

use App\Models\KodeSebab;
use App\Models\Penyebab;
use App\Models\Temuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class PenyebabController extends Controller
{

    public function index(Request $request, $id)
    {

        if ($request->ajax()) {
            $data = $request->id;
            $data = DB::table('sebab')
                ->join('kode_sebab', 'sebab.kode_sebab', '=', 'kode_sebab.id')
                ->select('sebab.id', 'sebab.no_sebab', 'kode_sebab.kode as nama_kode')
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
        return view('penyebab.index', compact('title_lhp', 'title_temuan', 'kode', 'data', 'tgl_lhp', 'title', 'request', 'id', 'temuan'));
    }


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
        $kode_sebab = KodeSebab::all();
        $title_lhp = 'Data LHP';
        $title_temuan = 'Data Temuan';
        $title = 'Penyebab Penyimpangan';
        return view('penyebab.create', compact(
            'kode_sebab',
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

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_temuan' => 'required',
            'no_sebab' => 'required',
            'uraian_sebab' => 'required',
            'kode_sebab' => 'required',
        ]);

        try {
            $penyebab = new Penyebab;
            $penyebab->id_temuan = $request->id_temuan;
            $penyebab->no_sebab = $request->no_sebab;
            $penyebab->uraian_sebab = $request->uraian_sebab;
            $penyebab->kode_sebab = $request->kode_sebab;
            $kode = Penyebab::find($request->id);
            if (!$kode) {
                $penyebab['created_by'] = auth()->user()->level;
                $penyebab['created_by_id'] = auth()->user()->id;
            }
            $penyebab['updated_by'] = auth()->user()->name;
            $penyebab['updated_by_id'] = auth()->user()->id;
            $penyebab->save();

            return redirect()->route('penyebab.index', $request->id_temuan)->with('success', 'Tambah Data Berhasil');
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }



    public function show(Request $request, $id)
    {
        $penyebab = Penyebab::findOrfail($id);
        $temuan = DB::table('sebab')
            ->join('temuan', 'sebab.id_temuan', '=', 'temuan.id')
            ->join('kode_sebab', 'sebab.kode_sebab', '=', 'kode_sebab.id')
            ->select('sebab.*', 'temuan.id', 'temuan.no_temuan', 'temuan.id_lhp', 'kode_sebab.nama as kod_sebab')
            ->where('temuan.id', $penyebab->id_temuan)
            ->first();
        $temuan_detail = DB::table('temuan')
            ->join('kode_temuan', 'temuan.kode_temuan', '=', 'kode_temuan.id')
            ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
            ->select('temuan.*', 'kode_temuan.kode as kode_temuan', 'kode_bidang.nama as kode_bidang')
            ->where('temuan.id', $temuan->id)
            ->first();
        $lhp_detail = DB::table('lhp')
            ->join('klarifikasi_obrik', 'klarifikasi_obrik.id', '=', 'lhp.klarifikasi')
            ->join('obrik', 'obrik.id', '=', 'lhp.obrik')
            ->select('lhp.*', 'klarifikasi_obrik.nama', 'obrik.nama AS nama_obrik')
            ->where('lhp.id', $temuan->id_lhp)
            ->first();
        // dd($data);
        $tgl_lhp = Carbon::parse($lhp_detail->tgl_lhp)->isoFormat(' D MMMM Y');
        // dd($data);
        $title = 'Penyebab Penyimpangan';
        return view(
            'penyebab.show',
            compact(
                'lhp_detail',
                'tgl_lhp',
                'temuan_detail',
                'penyebab',
                'temuan',
                'title',
                'request'
            )
        );
    }


    public function edit(Request $request, $id)
    {
        $penyebab = Penyebab::findOrfail($id);
        $sebab = DB::table('sebab')
            ->join('temuan', 'sebab.id_temuan', '=', 'temuan.id')
            ->join('kode_sebab', 'sebab.kode_sebab', '=', 'kode_sebab.id')
            ->select('sebab.*', 'temuan.id', 'temuan.no_temuan', 'temuan.id_lhp', 'kode_sebab.kode')
            ->where('temuan.id', $penyebab->id_temuan)
            ->where('sebab.id', $penyebab->id)
            ->first();
        $temuan_detail = DB::table('temuan')
            ->join('kode_temuan', 'temuan.kode_temuan', '=', 'kode_temuan.id')
            ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
            ->select('temuan.*', 'kode_temuan.kode as kode_temuan', 'kode_bidang.nama as kode_bidang')
            ->where('temuan.id', $sebab->id)
            ->first();
        $lhp_detail = DB::table('lhp')
            ->join('klarifikasi_obrik', 'klarifikasi_obrik.id', '=', 'lhp.klarifikasi')
            ->join('obrik', 'obrik.id', '=', 'lhp.obrik')
            ->select('lhp.*', 'klarifikasi_obrik.nama', 'obrik.nama AS nama_obrik')
            ->where('lhp.id', $sebab->id_lhp)
            ->first();
        $kode_sebab_detail = DB::table('kode_sebab') // mengambil data kode sebab
            ->select('kode_sebab.*')
            ->where('kode_sebab.id', $penyebab->kode_sebab)
            ->first();
        $kode_sebab = DB::table('sebab')
            ->join('kode_sebab', 'sebab.kode_sebab', '=', 'kode_sebab.id')
            ->select('kode_sebab.*')
            ->where('sebab.id', $penyebab->id)
            ->get();
        // dd($data);
        $tgl_lhp = Carbon::parse($lhp_detail->tgl_lhp)->isoFormat(' D MMMM Y');
        $kode_sebab = KodeSebab::all();
        // dd($data);
        $title = 'Penyebab Penyimpangan';
        return view(
            'penyebab.edit',
            compact(
                'lhp_detail',
                'tgl_lhp',
                'temuan_detail',
                'penyebab',
                'kode_sebab',
                'sebab',
                'title',
                'request'
            )
        );
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $data = $request->validate([
            'id_temuan' => 'required',
            'no_sebab' => 'required',
            'uraian_sebab' => 'required',
            'kode_sebab' => 'required',
        ]);
        try {
            $penyebab = Penyebab::findOrFail($id);
            $penyebab->id_temuan = $request->id_temuan;
            $penyebab->no_sebab = $request->no_sebab;
            $penyebab->uraian_sebab = $request->uraian_sebab;
            $penyebab->kode_sebab = $request->kode_sebab;
            $kode = Penyebab::find($request->id);
            if (!$kode) {
                $penyebab['created_by'] = auth()->user()->level;
                $penyebab['created_by_id'] = auth()->user()->id;
            }
            $penyebab['updated_by'] = auth()->user()->name;
            $penyebab['updated_by_id'] = auth()->user()->id;
            $penyebab->save();

            return redirect()->route('penyebab.index', $request->id_temuan)->with('success', 'Edit Data Berhasil');
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }


    public function destroy(Request $request, $id)
    {
        $penyebab = Penyebab::findOrfail($id);
        $penyebab->delete();
        return redirect()->back()->withInput()->with('success', 'Data berhasil dihapus');
    }
}
