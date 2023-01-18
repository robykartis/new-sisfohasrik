<?php

namespace App\Http\Controllers;

use App\Models\KlarifikasiObrik;
use Illuminate\Http\Request;
use DataTables;

class KlarifikasiObrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, KlarifikasiObrik $obrik)
    {
        if ($request->ajax()) {

            $data = KlarifikasiObrik::select('id', 'kode',  'nama')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-between">';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-info editData" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-danger deleteData" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        $title = 'List Data';
        return view(
            'klarifikasi_obrik.index'
        )->with([
            'success',
            'title' => $title,
            'obrik' => KlarifikasiObrik::all(),
            'obrik' => $obrik,
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
        $data = ['kode' => $request->kode,        'nama' => $request->nama,];

        $kode = KlarifikasiObrik::find($request->kode_id);
        if (!$kode) {
            $data['created_by'] = auth()->user()->level;
            $data['created_by_id'] = auth()->user()->id;
        }
        $data['updated_by'] = auth()->user()->name;
        $data['updated_by_id'] = auth()->user()->id;

        KlarifikasiObrik::updateOrCreate(
            [
                'id' => $request->kode_id
            ],
            $data
        );

        return response()->json(['success' => 'Kode klarifikasi obrik saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KlarifikasiObrik  $klarifikasiObrik
     * @return \Illuminate\Http\Response
     */
    public function show(KlarifikasiObrik $klarifikasiObrik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KlarifikasiObrik  $klarifikasiObrik
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = KlarifikasiObrik::find($id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KlarifikasiObrik  $klarifikasiObrik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KlarifikasiObrik $klarifikasiObrik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KlarifikasiObrik  $klarifikasiObrik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KlarifikasiObrik::find($id)->delete();

        return response()->json(['success' => ' deleted successfully.']);
    }
}
