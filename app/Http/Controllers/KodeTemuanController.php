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
                    $btn = '<div class="d-flex justify-content-between">';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-info editForm" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-danger deleteForm" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }



        $title = 'List Data';
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
        $data = [
            'kode' => $request->kode,
            'nama' => $request->nama,
        ];

        $kode = KodeTemuan::find($request->kode_id);
        if (!$kode) {
            $data['created_by'] = auth()->user()->level;
            $data['created_by_id'] = auth()->user()->id;
        }
        $data['updated_by'] = auth()->user()->name;
        $data['updated_by_id'] = auth()->user()->id;

        KodeTemuan::updateOrCreate(
            [
                'id' => $request->kode_id
            ],
            $data
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
