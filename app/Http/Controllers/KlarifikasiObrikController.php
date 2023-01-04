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

            $data = KlarifikasiObrik::select('id', 'kode_obrik',  'name_obrik')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editData">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        $title = 'Klarifikasi Obrik';
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
        KlarifikasiObrik::updateOrCreate(
            [
                'id' => $request->kode_id
            ],
            [
                'kode_obrik' => $request->kode_obrik,
                'name_obrik' => $request->name_obrik
            ]
        );

        return response()->json(['success' => ' saved successfully.']);
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