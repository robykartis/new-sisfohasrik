<?php

namespace App\Http\Controllers;

use App\Models\KlarifikasiObrik;
use App\Models\Lhp;
use App\Models\Temuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use DateTime;
use Illuminate\Support\Facades\DB;

class LhpController extends Controller
{

    public function index(Request $request, Lhp $lhp)
    {
        if ($request->ajax()) {
            $data = Lhp::select('id', 'no_lhp',  'tgl_lhp')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="' . route('lhp.edit', $row->id) . '" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a> |';
                    $btn .= ' <a href="' . route('lhp.show', $row->id) . '" data-toggle="tooltip"   data-original-title="Delete" class="btn btn-sm btn-warning " data-bs-toggle="tooltip" title="Show"><i class="far fa-check-circle"></i></a> |';
                    $btn .= ' <a href="' . url('lhp/hapus', $row->id) . '" data-toggle="tooltip"  onclick="confirmDelete()" data-original-title="Delete" class="btn btn-sm btn-danger " data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></a>';
                    return $btn;
                })
                ->editColumn('tgl_lhp', function ($row) {
                    return Carbon::parse($row->tgl_lhp)->format('d-F-Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        $resultlhp = DB::table('lhp')
            ->join('obrik', 'lhp.obrik', '=', 'obrik.id')
            ->join('klarifikasi_obrik', 'lhp.klarifikasi', '=', 'klarifikasi_obrik.id')
            ->select('lhp.*', 'obrik.nama as nama_obrik', 'klarifikasi_obrik.nama as nama_klarifikasi')
            ->get();


        $klarifikasi_obrik = DB::table('klarifikasi_obrik')->get();
        $dataobrik = DB::table('obrik')->get();

        $title = 'Laporan Hasil Pemeriksaan (LHP)';
        return view('lhp.index')->with([
            'success',
            'title' => $title,
            'lhp' => Lhp::all(),
            'lhp' => $lhp,
            'resultlhp' => $resultlhp,
            'klarifikasi_obrik' => $klarifikasi_obrik,
            'dataobrik' => $dataobrik,
            'request' => $request
        ]);
    }


    public function create(Request $request, Lhp $lhp)
    {
        $resultlhp = DB::table('lhp')
            ->join('obrik', 'lhp.obrik', '=', 'obrik.id')
            ->join('klarifikasi_obrik', 'lhp.klarifikasi', '=', 'klarifikasi_obrik.id')
            ->select('lhp.*', 'obrik.nama as nama_obrik', 'klarifikasi_obrik.nama as nama_klarifikasi')
            ->get();
        $klarifikasi_obrik = DB::table('klarifikasi_obrik')->get();
        $dataobrik = DB::table('obrik')->get();

        $title = 'Input Laporan Hasil Pemeriksaan (LHP)';
        return view('lhp.create')->with([
            'success',
            'title' => $title,
            'lhp' => Lhp::all(),
            'lhp' => $lhp,
            'resultlhp' => $resultlhp,
            'klarifikasi_obrik' => $klarifikasi_obrik,
            'dataobrik' => $dataobrik,
            'request' => $request
        ]);;
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'klarifikasi' => 'required',
            'no_lhp' => 'required',
            'obrik' => 'required',
            'tgl_lhp' => 'required',
        ]);
        try {

            $lhp = new Lhp();
            $lhp->tahun = $request->tahun;
            $lhp->klarifikasi = $request->klarifikasi;
            $lhp->no_lhp = $request->no_lhp;
            $lhp->obrik = $request->obrik;
            $lhp->tgl_lhp = $request->tgl_lhp;
            $lhp['created_by'] = auth()->user()->level;
            $lhp->save();
            return redirect()->route('lhp.index')->with('success', 'Tambah Data Berhasil');
        } catch (\Exception $e) {
            // echo $e->getMessage();
            // die;
            return redirect()->route('lhp.index')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }



    public function edit(Request $request, $id)
    {
        // get the data item by id
        $data = Lhp::findOrFail($id);
        $tgl_lhp = new DateTime($data->tgl_lhp);
        $tgl_lhp = $tgl_lhp->format('d  F  Y');

        $klarifikasi_obrik = DB::table('klarifikasi_obrik')->get();
        $dataobrik = DB::table('obrik')->get();
        $title = 'Edit Daftar Obyek Pemeriksaan (Obrik)';
        return view('lhp.edit', compact('data', 'dataobrik', 'klarifikasi_obrik', 'tgl_lhp', 'title', 'request'));
    }

    public function update(Request $request, $id)
    {
        // validate the form input
        $request->validate([
            'tahun' => 'required',
            'klarifikasi' => 'required',
            'no_lhp' => 'required',
            'obrik' => 'required',
            'tgl_lhp' => 'required',
        ]);
        try {
            $request['created_by'] = auth()->user()->level;
            $obrik = Lhp::find($id);
            $obrik->update([
                'tahun' => $request->tahun,
                'klarifikasi' => $request->klarifikasi,
                'no_lhp' => $request->no_lhp,
                'obrik' => $request->obrik,
                'tgl_lhp' => $request->tgl_lhp,
            ]);
            return redirect()->route('lhp.index')->with('success', 'Update Data Berhasil');
        } catch (\Throwable $th) {
            // echo $e->getMessage();
            // die;
            return redirect()->route('lhp.edit')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function deletelhp(Lhp $lhp, $id)
    {

        $lhp = Lhp::find($id);
        $lhp->delete();
        return redirect('lhp')
            ->with('success', 'Data Berhasil Dihapus');
    }




    public function show(Request $request, $id)
    {

        if ($request->ajax()) {
            $data = DB::table('temuan')
                ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
                ->join('lhp', 'temuan.id_lhp', '=', 'lhp.id')
                ->select('temuan.*', 'kode_bidang.kode as kodetemuan', 'kode_bidang.nama as katemuan', 'lhp.id as idlhpp', 'lhp.no_lhp as nolhp', 'lhp.tahun as thnlhp',)
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="' . route('lhp.edit', $row->id) . '" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a> |';
                    $btn .= ' <a href="' . route('lhp.show', $row->id) . '" data-toggle="tooltip"   data-original-title="Delete" class="btn btn-sm btn-warning " data-bs-toggle="tooltip" title="Show"><i class="far fa-check-circle"></i></a> |';
                    $btn .= ' <a href="' . url('lhp/hapus', $row->id) . '" data-toggle="tooltip"  onclick="confirmDelete()" data-original-title="Delete" class="btn btn-sm btn-danger " data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }




        // get the data item by id
        $data = Lhp::findOrFail($id);
        $klarifikasi = KlarifikasiObrik::find($data->klarifikasi);
        $tgl_lhp = new DateTime($data->tgl_lhp);
        $tgl_lhp = $tgl_lhp->format('d  F  Y');
        $data = DB::table('lhp')
            ->join('klarifikasi_obrik', 'klarifikasi_obrik.id', '=', 'lhp.klarifikasi')
            ->join('obrik', 'obrik.id', '=', 'lhp.obrik')
            ->select('lhp.*', 'klarifikasi_obrik.nama', 'obrik.nama AS nama_obrik')
            ->where('lhp.id', $id)
            ->first();
        $dataobrik = DB::table('obrik')->get();
        $title = 'Detail Obyek Pemeriksaan (Obrik)';
        return view('lhp.index_temuan', compact('data', 'dataobrik', 'klarifikasi', 'tgl_lhp', 'title', 'request', 'id'));
    }
}
