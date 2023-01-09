<?php

namespace App\Http\Controllers;

use App\Models\Lhp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class LhpController extends Controller
{

    public function index(Request $request, Lhp $lhp)
    {
        if ($request->ajax()) {
            $data = Lhp::select('id', 'no_lhp',  'tgl_lhp')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="' . route('pendaftaranobrik.edit', $row->id) . '" class="text-info btn btn-md "><i class="bi bi-pencil-fill"></i></a>  |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="text-danger btn btn-md deleteData"><i class="bi bi-trash-fill"></i></a>';
                    return $btn;
                })
                ->editColumn('tgl_lhp', function ($row) {
                    return Carbon::parse($row->tgl_lhp)->format('d-F-Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        $resultlhp = DB::table('lhp')
            ->join('obrik', 'lhp.obrik', '=', 'obrik.id')
            ->join('klarifikasi_obrik', 'lhp.klarifikasi', '=', 'klarifikasi_obrik.id')
            ->select('lhp.*', 'obrik.nama as nama_obrik', 'klarifikasi_obrik.nama as nama_klarifikasi')
            ->get();


        $klarifikasi_obrik = DB::table('klarifikasi_obrik')->get();
        $dataobrik = DB::table('obrik')->get();

        $title = 'Laporan Hasil Pemeriksaan (LHP)';
        return view('lhp.index')->with([
            'success',
            'title' => $title,
            'lhp' => Lhp::all(),
            'lhp' => $lhp,
            'resultlhp' => $resultlhp,
            'klarifikasi_obrik' => $klarifikasi_obrik,
            'dataobrik' => $dataobrik,
            'request' => $request
        ]);
    }


    public function create(Request $request, Lhp $lhp)
    {
        $resultlhp = DB::table('lhp')
            ->join('obrik', 'lhp.obrik', '=', 'obrik.id')
            ->join('klarifikasi_obrik', 'lhp.klarifikasi', '=', 'klarifikasi_obrik.id')
            ->select('lhp.*', 'obrik.nama as nama_obrik', 'klarifikasi_obrik.nama as nama_klarifikasi')
            ->get();
        $klarifikasi_obrik = DB::table('klarifikasi_obrik')->get();
        $dataobrik = DB::table('obrik')->get();

        $title = 'Input Laporan Hasil Pemeriksaan (LHP)';
        return view('lhp.create')->with([
            'success',
            'title' => $title,
            'lhp' => Lhp::all(),
            'lhp' => $lhp,
            'resultlhp' => $resultlhp,
            'klarifikasi_obrik' => $klarifikasi_obrik,
            'dataobrik' => $dataobrik,
            'request' => $request
        ]);;
    }


    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'klarifikasi' => 'required',
            'no_lhp' => 'required',
            'obrik' => 'required',
            'tgl_lhp' => 'required',
        ]);

        try {

            $lhp = new Lhp();
            $lhp->tahun = $request->tahun;
            $lhp->klarifikasi = $request->klarifikasi;
            $lhp->no_lhp = $request->no_lhp;
            $lhp->obrik = $request->obrik;
            $lhp->tgl_lhp = $request->tgl_lhp;
            $lhp['created_by'] = auth()->user()->level;
            $lhp->save();
            return redirect()->route('lhp.index')->with('success', 'Tambah Data Berhasil');
        } catch (\Exception $e) {
            // echo $e->getMessage();
            // die;
            return redirect()->route('lhp.index')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
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
