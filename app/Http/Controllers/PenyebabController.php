<?php

namespace App\Http\Controllers;

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
        // $data = $request->id;
        // $data = DB::table('sebab')
        //     ->select('id', 'no_sebab', 'urian_sebab', 'kode_sebab',)
        //     ->get();
        // dd($data);
        if ($request->ajax()) {
            $data = $request->id;
            $data = DB::table('sebab')
                ->select('id', 'no_sebab', 'uraian_sebab', 'kode_sebab',)
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="' . route('penyebab.edit', $row->id) . '" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a> |';
                    $btn .= ' <a href="' . route('penyebab.show', $row->id) . '" data-toggle="tooltip"   data-original-title="Delete" class="btn btn-sm btn-warning " data-bs-toggle="tooltip" title="Show"><i class="far fa-check-circle"></i></a> |';
                    $btn .= ' <a href="' . url('penyebab/hapus', $row->id) . '" data-toggle="tooltip"  onclick="confirmDelete()" data-original-title="Delete" class="btn btn-sm btn-danger " data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $temuan = Temuan::find($id);
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
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
