<?php

namespace App\Http\Controllers;

use App\Models\KodeRekomendasi;
use Illuminate\Http\Request;
use DataTables;

class KodeRekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, KodeRekomendasi $rekomendasi)
    {

        if ($request->ajax()) {

            $data = KodeRekomendasi::select('id', 'kode',  'nama')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit text-info btn btn-md editData"><i class="bi bi-pencil-fill"></i></a>  | ';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="text-danger btn btn-md deleteData"><i class="bi bi-trash-fill"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        $title = 'Daftar Kode Rekomendasi';
        return view(
            'kode_rekomendasi.index'
        )->with([
            'success',
            'title' => $title,
            'rekomendasi' => KodeRekomendasi::all(),
            'rekomendasi' => $rekomendasi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KodeRekomendasi::updateOrCreate(
            [
                'id' => $request->kode_id
            ],
            [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'create_by' => auth()->user()->level,
            ]
        );

        return response()->json(['success' => ' saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodeRekomendasi  $kodeRekomendasi
     * @return \Illuminate\Http\Response
     */
    public function show(KodeRekomendasi $kodeRekomendasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KodeRekomendasi  $kodeRekomendasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rekomendasi = KodeRekomendasi::find($id);
        return response()->json($rekomendasi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KodeRekomendasi  $kodeRekomendasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KodeRekomendasi $kodeRekomendasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodeRekomendasi  $kodeRekomendasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KodeRekomendasi::find($id)->delete();

        return response()->json(['success' => ' deleted successfully.']);
    }
}
