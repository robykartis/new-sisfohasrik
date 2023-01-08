<?php

namespace App\Http\Controllers;

use App\Models\KlarifikasiObrik;
use App\Models\Obrik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class ObrikController extends Controller
{
    public function index(Request $request)
    {
        $klarifikasis = DB::table('klarifikasi_obrik')
            ->select('klarifikasi_obrik.*', 'klarifikasi_obrik.nama AS nama_klarifikasi')
            ->get();
        $tahun = DB::table('obrik')->select('tahun')->distinct()->get();
        if ($request->ajax()) {
            $data = DB::table('obrik')
                ->join('klarifikasi_obrik', 'obrik.klarifikasi', '=', 'klarifikasi_obrik.id');

            if (!empty($request->tahun)) {
                $data->where('obrik.tahun', $request->tahun);
            }
            if (!empty($request->klarifikasi)) {
                $data->where('obrik.klarifikasi', $request->klarifikasi);
            }

            $data = $data->select('obrik.*', 'klarifikasi_obrik.nama AS nama_klarifikasi')
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="' . route('pendaftaranobrik.edit', $row->id) . '" class="text-info btn btn-md "><i class="bi bi-pencil-fill"></i></a>  |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="text-danger btn btn-md deleteData"><i class="bi bi-trash-fill"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $title = 'Daftar Obyek Pemeriksaan (Obrik)';
        return view('obrik.index', compact('klarifikasis', 'request', 'tahun', 'title'));
        // return view('pendaftaran_obrik.index', ['klarifikasis' => $klarifikasis, 'request' => $request, 'tahun' => $tahun]);
    }
    public function create(Request $request)
    {
        $klarifikasi_obriks = DB::table('klarifikasi_obrik')->get();
        $title = 'Input Daftar Obyek Pemeriksaan (Obrik)';
        return view('obrik.create', compact('klarifikasi_obriks', 'request', 'title'));
    }
    public function store(Request $request)
    {
        // validate the form input
        // $request->validate([
        //     'tahun' => 'required',
        //     'klarifikasi' => 'required',
        //     'kode' => 'required',
        //     'induk' => 'required',
        //     'nama' => 'required',
        // ]);
        try {
            Obrik::create([
                'tahun' => $request->tahu,
                'klarifikasi' => $request->klarifikasi,
                'kode' => $request->kode,
                'induk' => $request->induk,
                'nama' => $request->nama,
                'created_by' => auth()->user()->level,
            ]);
            return redirect()->route('pendaftaranobrik.index')->with('success', 'Tambah Data Berhasil');
        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
            return redirect()->route('pendaftaranobrik.index')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
}
