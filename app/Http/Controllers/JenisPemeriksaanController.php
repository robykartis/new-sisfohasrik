<?php

namespace App\Http\Controllers;

use App\Models\JenisPemeriksaan;
use Illuminate\Http\Request;
use DataTables;

class JenisPemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, JenisPemeriksaan $obrik)
    {
        if ($request->ajax()) {

            $data = JenisPemeriksaan::select('id', 'kode',  'nama', 'singkatan', 'bobot')->get();

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


        $title = 'Kode Jenis Pemeriksaan';
        return view(
            'jenis_pemeriksaan.index'
        )->with([
            'success',
            'title' => $title,
            'obrik' => JenisPemeriksaan::all(),
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
        JenisPemeriksaan::updateOrCreate(
            [
                'id' => $request->kode_id
            ],
            [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'singkatan' => $request->singkatan,
                'bobot' => $request->bobot
            ]
        );
        return response()->json(['success' => ' saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPemeriksaan  $jenisPemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPemeriksaan $jenisPemeriksaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPemeriksaan  $jenisPemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = JenisPemeriksaan::find($id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisPemeriksaan  $jenisPemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisPemeriksaan $jenisPemeriksaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPemeriksaan  $jenisPemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisPemeriksaan::find($id)->delete();

        return response()->json(['success' => ' deleted successfully.']);
    }
}
