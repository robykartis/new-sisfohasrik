<?php

namespace App\Http\Controllers;

use App\Models\BidangTemuan;
use Illuminate\Http\Request;
use DataTables;

class BidangTemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, BidangTemuan $temuan)
    {

        if ($request->ajax()) {

            $data = BidangTemuan::select('id', 'kode_bidang',  'name_bidang')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="text-info  btn btn-md editBidangTemuan"><i class="bi bi-pencil-fill"></i></a> | ';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="text-danger  btn btn-md deleteBidangTemuan"><i class="bi bi-trash-fill"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        $title = 'Daftar Kode Bidang Temuan';
        return view(
            'bidang_temuan.index'
        )->with([
            'success',
            'title' => $title,
            'temuan' => BidangTemuan::all(),
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
    public function store(Request $request)
    {
        BidangTemuan::updateOrCreate(
            [
                'id' => $request->kode_id
            ],
            [
                'kode_bidang' => $request->kode_bidang,
                'name_bidang' => $request->name_bidang
            ]
        );

        return response()->json(['success' => 'Kode temuan saved successfully.']);
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
        $temuan = BidangTemuan::find($id);
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
        BidangTemuan::find($id)->delete();

        return response()->json(['success' => 'Kode temuan deleted successfully.']);
    }
}
