<?php

namespace App\Http\Controllers;


use App\Models\KodeBidang;
use Illuminate\Http\Request;
use DataTables;

class BidangTemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, KodeBidang $temuan)
    {

        if ($request->ajax()) {

            $data = KodeBidang::select('id', 'kode',  'nama')->get();

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
            'bidang_temuan.index'
        )->with([
            'success',
            'title' => $title,
            'temuan' => KodeBidang::all(),
            'temuan' => $temuan,
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
    // public function store(Request $request)
    // {
    //     KodeBidang::updateOrCreate(
    //         [
    //             'id' => $request->kode_id
    //         ],
    //         [
    //             'kode' => $request->kode,
    //             'nama' => $request->nama,
    //             'created_by' => auth()->user()->level,
    //             'updated_by' => auth()->user()->name,
    //         ]
    //     );

    //     return response()->json(['success' => 'Kode temuan saved successfully.']);
    // }
    public function store(Request $request)
    {


        $data = [
            'kode' => $request->kode,
            'nama' => $request->nama,
        ];
        $kode = KodeBidang::find($request->kode_id);
        if (!$kode) {
            $data['created_by'] = auth()->user()->level;
            $data['created_by_id'] = auth()->user()->id;
        }
        $data['updated_by'] = auth()->user()->name;
        $data['updated_by_id'] = auth()->user()->id;

        KodeBidang::updateOrCreate(
            [
                'id' => $request->kode_id
            ],
            $data
        );
        return response()->json(['success' => 'Kode bidang temuan saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $temuan = KodeBidang::find($id);
        return response()->json($temuan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KodeBidang::find($id)->delete();

        return response()->json(['success' => 'Kode temuan deleted successfully.']);
    }
}
