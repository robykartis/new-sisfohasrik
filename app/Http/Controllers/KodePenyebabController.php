<?php

namespace App\Http\Controllers;

use App\Models\KodePenyebab;
use Illuminate\Http\Request;
use DataTables;

class KodePenyebabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, KodePenyebab $penyebab)
    {
        if ($request->ajax()) {

            $data = KodePenyebab::select('id', 'kode_penyebab',  'name_penyebab')->get();

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


        $title = 'Daftar Kode Penyebab Penyimpangan';
        return view(
            'kode_penyebab.index'
        )->with([
            'success',
            'title' => $title,
            'penyebab' => KodePenyebab::all(),
            'penyebab' => $penyebab,
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
        KodePenyebab::updateOrCreate(
            [
                'id' => $request->kode_id
            ],
            [
                'kode_penyebab' => $request->kode_penyebab,
                'name_penyebab' => $request->name_penyebab
            ]
        );

        return response()->json(['success' => ' saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodePenyebab  $kodePenyebab
     * @return \Illuminate\Http\Response
     */
    public function show(KodePenyebab $kodePenyebab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KodePenyebab  $kodePenyebab
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penyebab = KodePenyebab::find($id);
        return response()->json($penyebab);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KodePenyebab  $kodePenyebab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KodePenyebab $kodePenyebab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodePenyebab  $kodePenyebab
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KodePenyebab::find($id)->delete();

        return response()->json(['success' => ' deleted successfully.']);
    }
}
