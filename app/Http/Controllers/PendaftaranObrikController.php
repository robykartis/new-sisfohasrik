<?php

namespace App\Http\Controllers;

use App\Models\KlarifikasiObrik;
use App\Models\PendaftaranObrik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class PendaftaranObrikController extends Controller
{

    public function index(Request $request)
    {
        $klarifikasis = DB::table('klarifikasi_obriks')->get();

        if ($request->ajax()) {
            $data = DB::table('pendaftaran_obriks')
                ->join('klarifikasi_obriks', 'pendaftaran_obriks.klarifikasi', '=', 'klarifikasi_obriks.id');

            if (!empty($request->tahun)) {
                $data->where('pendaftaran_obriks.tahun', $request->tahun);
            }
            if (!empty($request->klarifikasi)) {
                $data->where('pendaftaran_obriks.klarifikasi', $request->klarifikasi);
            }

            $data = $data->select('pendaftaran_obriks.*', 'klarifikasi_obriks.name_obrik')
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="' . route('pendaftaranobrik.edit', $row->id) . '" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt"></i></a> | ';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="fas fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pendaftaran_obrik.index', compact('klarifikasis', 'request'));
    }

    public function create()
    {
        $klarifikasi_obriks = KlarifikasiObrik::all();

        return view('pendaftaran_obrik.create', compact('klarifikasi_obriks'));
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

        // create a new data item
        $data = new PendaftaranObrik;
        $data->tahun = $request->tahun;
        $data->klarifikasi = $request->klarifikasi;
        $data->kode = $request->kode;
        $data->induk = $request->induk;
        $data->nama = $request->nama;
        $data->save();

        // redirect to a confirmation page
        return redirect()->route('pendaftaranobrik.index')->with('success', 'Tambah Data Berhasil');
    }


    public function show(PendaftaranObrik $pendaftaranObrik)
    {
        //
    }


    public function edit($id)
    {
        // get the data item by id
        $data = PendaftaranObrik::findOrFail($id);

        // get all klarifikasi obrik
        $klarifikasi_obriks = KlarifikasiObrik::all();

        return view('pendaftaran_obrik.edit', compact('data', 'klarifikasi_obriks'));
    }


    public function update(Request $request, $id)
    {
        // validate the form input
        $request->validate([
            'tahun' => 'required',
            'klarifikasi' => 'required',
            'kode' => 'required',
            'induk' => 'required',
            'nama' => 'required',
        ]);

        // update the data item
        $data = PendaftaranObrik::find($id);
        $data->tahun = $request->tahun;
        $data->klarifikasi = $request->klarifikasi;
        $data->kode = $request->kode;
        $data->induk = $request->induk;
        $data->nama = $request->nama;
        $data->save();

        // redirect to a confirmation page and show a success message
        return redirect()->route('pendaftaranobrik.index')->with('success', 'Data obrik berhasil diperbaharui.');
    }

    public function destroy($id)
    {
        PendaftaranObrik::find($id)->delete();

        return response()->json(['success' => ' deleted successfully.']);
    }
}
