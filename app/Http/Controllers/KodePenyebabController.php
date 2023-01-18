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
        $data = ['kode' => $request->kode,        'nama' => $request->nama,];

        $kode = KodeSebab::find($request->kode_id);
        if (!$kode) {
            $data['created_by'] = auth()->user()->level;
            $data['created_by_id'] = auth()->user()->id;
        }
        $data['updated_by'] = auth()->user()->name;
        $data['updated_by_id'] = auth()->user()->id;

        KodeSebab::updateOrCreate(
            [
                'id' => $request->kode_id
            ],
            $data
        );

        return response()->json(['success' => 'Kode sebab saved successfully.']);
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
