<?php

namespace App\Http\Controllers;

use App\Models\KodeTlhp;
use Illuminate\Http\Request;
use DataTables;

class KodeTlhpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, KodeTlhp $kodetlhp)
    {
        if ($request->ajax()) {

            $data = KodeTlhp::select('id', 'kode_tlhp',  'name_tlhp')->get();

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


        $title = 'Kode TLHP';
        return view(
            'kode_tlhp.index'
        )->with([
            'success',
            'title' => $title,
            'kodetlhp' => KodeTlhp::all(),
            'kodetlhp' => $kodetlhp,
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
        KodeTlhp::updateOrCreate(
            [
                'id' => $request->kode_id
            ],
            [
                'kode_tlhp' => $request->kode_tlhp,
                'name_tlhp' => $request->name_tlhp
            ]
        );

        return response()->json(['success' => ' saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodeTlhp  $kodeTlhp
     * @return \Illuminate\Http\Response
     */
    public function show(KodeTlhp $kodeTlhp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KodeTlhp  $kodeTlhp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = KodeTlhp::find($id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KodeTlhp  $kodeTlhp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KodeTlhp $kodeTlhp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodeTlhp  $kodeTlhp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KodeTlhp::find($id)->delete();

        return response()->json(['success' => ' deleted successfully.']);
    }
}
