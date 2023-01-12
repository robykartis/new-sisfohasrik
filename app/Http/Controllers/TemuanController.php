<?php

namespace App\Http\Controllers;

use App\Models\KlarifikasiObrik;
use App\Models\Lhp;
use App\Models\Temuan;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class TemuanController extends Controller
{

    public function index(Request $request)
    {
        // if ($request->ajax()) {
        //     $data = DB::table('temuan')
        //         ->join('lhp', 'temuan.id_lhp', '=', 'lhp.id')
        //         ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
        //         ->join('kode_temuan', 'temuan.kode_temuan', '=', 'kode_temuan.id')
        //         ->select(
        //             'lhp.nama as nama_lhp',
        //             'kode_bidang.nama as nama_kode_bidang',
        //             'kode_temuan.nama as nama_kode_temuan'
        //         )
        //         ->get();
        //     return Datatables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {
        //             $btn =  '<a href="' . route('lhp.edit', $row->id) . '" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a> |';
        //             $btn .= ' <a href="' . route('lhp.show', $row->id) . '" data-toggle="tooltip"   data-original-title="Delete" class="btn btn-sm btn-warning " data-bs-toggle="tooltip" title="Show"><i class="far fa-check-circle"></i></a> |';
        //             $btn .= ' <a href="' . url('lhp/hapus', $row->id) . '" data-toggle="tooltip"  onclick="confirmDelete()" data-original-title="Delete" class="btn btn-sm btn-danger " data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></a>';
        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        $temuan = DB::table('temuan')
            ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
            ->join('lhp', 'temuan.id_lhp', '=', 'lhp.id')
            ->select('temuan.*', 'kode_bidang.kode as kodetemuan', 'kode_bidang.nama as katemuan', 'lhp.id as idlhpp', 'lhp.no_lhp as nolhp', 'lhp.tahun as thnlhp',)
            ->get();
        dd($temuan);
        $title = 'Detail Obyek Pemeriksaan (Obrik)';
        return view('temuan.index', compact('title'));
    }

    public function create()
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
