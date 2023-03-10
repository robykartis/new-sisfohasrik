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

            $data = KodeTlhp::select('id', 'kode',  'nama')->get();

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
        $data = ['kode' => $request->kode,        'nama' => $request->nama,];

        $kode = KodeTlhp::find($request->kode_id);
        if (!$kode) {
            $data['created_by'] = auth()->user()->level;
            $data['created_by_id'] = auth()->user()->id;
        }
        $data['updated_by'] = auth()->user()->name;
        $data['updated_by_id'] = auth()->user()->id;
        KodeTlhp::updateOrCreate(
            [
                'id' => $request->kode_id
            ],
            $data
        );

        return response()->json(['success' => 'Kode TLHP saved successfully.']);
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
