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
                    $btn = '<div class="d-flex justify-content-between">';
                    $btn .=  '<a href="' . route('pendaftaranobrik.edit', $row->id) . '" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a>';
                    $btn .= ' <a  href="' . url('obrik/hapus', $row->id) . '" data-toggle="tooltip" onclick="confirmDelete()" data-original-title="Delete" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $title = 'List Data';
        return view('obrik.index', compact('klarifikasis', 'request', 'tahun', 'title'));
        // return view('pendaftaran_obrik.index', ['klarifikasis' => $klarifikasis, 'request' => $request, 'tahun' => $tahun]);
    }
    public function create(Request $request)
    {
        $klarifikasi_obriks = DB::table('klarifikasi_obrik')->get();
        $title = 'Tambah Data';
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

            $kode = Obrik::find($request->id);
            if (!$kode) {
                $request['created_by'] = auth()->user()->level;
                $request['created_by_id'] = auth()->user()->id;
            }
            $request['updated_by'] = auth()->user()->name;
            $request['updated_by_id'] = auth()->user()->id;
            Obrik::create($request->all());
            return redirect()->route('pendaftaranobrik.index')->with('success', 'Tambah Data Berhasil');
        } catch (\Exception $e) {
            // echo $e->getMessage();
            // die;
            return redirect()->route('pendaftaranobrik.create')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
    public function edit(Request $request, $id)
    {
        // get the data item by id
        $data = Obrik::findOrFail($id);

        // get all klarifikasi obrik
        $klarifikasi_obriks = KlarifikasiObrik::all();
        $title = 'Edit Data';
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
        try {
            $obrik = Obrik::find($id);
            $kode = Obrik::find($request->id);
            if (!$kode) {
                $obrik['created_by'] = auth()->user()->level;
                $obrik['created_by_id'] = auth()->user()->id;
            }
            $obrik['updated_by'] = auth()->user()->name;
            $obrik['updated_by_id'] = auth()->user()->id;

            $obrik->update([
                'tahun' => $request->tahun,
                'kode' => $request->kode,
                'nama' => $request->nama,
                'klarifikasi' => $request->klarifikasi,
                'induk' => $request->induk,
            ]);
            // dd($obrik);
            return redirect()->route('pendaftaranobrik.index')->with('success', 'Update Data Berhasil');
        } catch (\Throwable $th) {
            return redirect()->route('pendaftaranobrik.edit')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }


    public function deleteobrik(Obrik $obrik, $id)
    {
        $obrik = Obrik::find($id);
        $obrik->delete();
        return redirect('pendaftaranobrik')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
