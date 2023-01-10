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
                    $btn =  '<a href="' . route('pendaftaranobrik.edit', $row->id) . '" class="btn btn-info btn-sm btn-md editForm"><i class="si si-note"></i></a>  |';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-md btn-sm deleteForm"><i class="far fa-trash-can"></i></a>';
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
        $request->validate([
            'tahun' => 'required',
            'klarifikasi' => 'required',
            'kode' => 'required',
            'induk' => 'required',
            'nama' => 'required',
        ]);

        try {
            $request['created_by'] = auth()->user()->level;
            Obrik::create($request->all());
            return redirect()->route('pendaftaranobrik.index')->with('success', 'Tambah Data Berhasil');
        } catch (\Exception $e) {
            // echo $e->getMessage();
            // die;
            return redirect()->route('pendaftaranobrik.index')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
    public function edit(Request $request, $id)
    {
        // get the data item by id
        $data = Obrik::findOrFail($id);

        // get all klarifikasi obrik
        $klarifikasi_obriks = KlarifikasiObrik::all();
        $title = 'Edit Daftar Obyek Pemeriksaan (Obrik)';
        return view('obrik.edit', compact('data', 'klarifikasi_obriks', 'request', 'title'));
    }

    public function update(Request $request, $id)
    {
        // validate the form input
        // $request->validate([
        //     'tahun' => 'required',
        //     'klarifikasi' => 'required?',
        //     'kode' => 'required?',
        //     'induk' => 'required?',
        //     'nama' => 'required?',
        // ]);


        $request['created_by'] = auth()->user()->level;
        $obrik = Obrik::find($id);
        $obrik->update([
            'tahun' => $request->tahun,
            'kode' => $request->kode,
            'nama' => $request->nama,
            'klarifikasi' => $request->klarifikasi,
            'induk' => $request->induk,
        ]);
        // dd($obrik);
        return redirect()->route('pendaftaranobrik.index')->with('success', 'Update Data Berhasil');
    }
}
