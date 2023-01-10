<?php

namespace App\Http\Controllers;

use App\Models\KodeTemuan;
use Illuminate\Http\Request;
use Response;
use DataTables;
use Validator;

class KodeTemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, KodeTemuan $temuan)
    {

        if ($request->ajax()) {

            $data = KodeTemuan::select('id', 'kode',  'nama')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-info btn-sm btn-md editForm"><i class="si si-note"></i></a> | ';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-md btn-sm deleteForm"><i class="far fa-trash-can"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }



        $title = 'Daftar Kode Temuan Pemeriksaan';
        return view(
            'kode_temuan.index'
        )->with([
            'success',
            'title' => $title,
            'temuan' => KodeTemuan::all(),
            'temuan' => $temuan,
        ]);
    }





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
        KodeTemuan::updateOrCreate(
            [
                'id' => $request->kode_id
            ],
            [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'create_by' => auth()->user()->level,
            ]
        );

        return response()->json(['success' => 'Kode temuan saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodeTemuan  $kodeTemuan
     * @return \Illuminate\Http\Response
     */
    public function show(KodeTemuan $kodeTemuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KodeTemuan  $kodeTemuan
     * @return \Illuminate\Http\Response
     */
    public function edit(KodeTemuan $kodeTemuan, $id)
    {
        $temuan = KodeTemuan::find($id);
        return response()->json($temuan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KodeTemuan  $kodeTemuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KodeTemuan $kodeTemuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodeTemuan  $kodeTemuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(KodeTemuan $kodeTemuan, $id)
    {
        KodeTemuan::find($id)->delete();

        return response()->json(['success' => 'Kode temuan deleted successfully.']);
    }
}
