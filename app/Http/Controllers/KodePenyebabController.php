<?php

namespace App\Http\Controllers;

use App\Models\KodePenyebab;
use App\Models\KodeSebab;
use Illuminate\Http\Request;
use DataTables;

class KodePenyebabController extends Controller
{

    public function index(Request $request, KodeSebab $penyebab)
    {
        if ($request->ajax()) {

            $data = KodeSebab::select('id', 'kode',  'nama')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-info btn-sm btn-md editData"><i class="si si-note"></i></a> | ';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-md btn-sm deleteData"><i class="far fa-trash-can"></i></a>';
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
            'penyebab' => KodeSebab::all(),
            'penyebab' => $penyebab,
        ]);
    }


    public function store(Request $request)
    {
        KodeSebab::updateOrCreate(
            [
                'id' => $request->kode_id
            ],
            [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'create_by' => auth()->user()->level,
            ]
        );

        return response()->json(['success' => ' saved successfully.']);
    }


    public function edit($id)
    {
        $penyebab = KodeSebab::find($id);
        return response()->json($penyebab);
    }



    public function destroy($id)
    {
        KodeSebab::find($id)->delete();

        return response()->json(['success' => ' deleted successfully.']);
    }
}
