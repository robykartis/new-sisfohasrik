<?php

namespace App\Http\Controllers;

use App\Models\KodeSebab;
use App\Models\Penyebab;
use App\Models\Temuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class PenyebabController extends Controller
{

    public function index(Request $request, $id)
    {
        // $data = $request->id;
        // $data = DB::table('sebab')
        //     ->select('id', 'no_sebab', 'urian_sebab', 'kode_sebab',)
        //     ->get();
        // dd($data);
        if ($request->ajax()) {
            $data = $request->id;
            $data = DB::table('sebab')
                ->join('kode_sebab', 'sebab.kode_sebab', '=', 'kode_sebab.id')
                ->select('sebab.id', 'sebab.no_sebab', 'sebab.uraian_sebab', 'kode_sebab.kode as nama_kode')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =  '<a href="' . route('penyebab.edit', $row->id) . '" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a> |';
                    $btn .= ' <a href="' . route('penyebab.show', $row->id) . '" data-toggle="tooltip"   data-original-title="Delete" class="btn btn-sm btn-warning " data-bs-toggle="tooltip" title="Show"><i class="far fa-check-circle"></i></a> |';
                    $btn .= ' <a href="' . url('penyebab/hapus', $row->id) . '" data-toggle="tooltip"  onclick="confirmDelete()" data-original-title="Delete" class="btn btn-sm btn-danger " data-bs-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-times"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $temuan = Temuan::find($id);
        // dd($temuan);
        $data = DB::table('lhp')
            ->join('klarifikasi_obrik', 'klarifikasi_obrik.id', '=', 'lhp.klarifikasi')
            ->join('obrik', 'obrik.id', '=', 'lhp.obrik')
            ->select('lhp.*', 'klarifikasi_obrik.nama', 'obrik.nama AS nama_obrik')
            ->where('lhp.id', $temuan->id_lhp)
            ->first();
        // dd($data);
        $tgl_lhp = Carbon::parse($data->tgl_lhp)->isoFormat(' D MMMM Y');

        $kode = DB::table('temuan')
            ->join('kode_temuan', 'temuan.kode_temuan', '=', 'kode_temuan.id')
            ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
            ->select('kode_temuan.nama', 'kode_bidang.nama as bidang')
            ->where('kode_temuan.id', $temuan->kode_temuan)
            ->where('kode_bidang.id', $temuan->bidang_temuan)
            ->first();
        $title_lhp = 'Data LHP';
        $title_temuan = 'Data Temuan';
        $title = 'Penyebab Penyimpangan';
        return view('penyebab.index', compact('title_lhp', 'title_temuan', 'kode', 'data', 'tgl_lhp', 'title', 'request', 'id', 'temuan'));
    }


    public function create(Request $request, $id)
    {

        $temuan = Temuan::findOrFail($id);
        // dd($temuan);
        $data = DB::table('lhp')
            ->join('klarifikasi_obrik', 'klarifikasi_obrik.id', '=', 'lhp.klarifikasi')
            ->join('obrik', 'obrik.id', '=', 'lhp.obrik')
            ->select('lhp.*', 'klarifikasi_obrik.nama', 'obrik.nama AS nama_obrik')
            ->where('lhp.id', $temuan->id_lhp)
            ->first();
        // dd($data);
        $tgl_lhp = Carbon::parse($data->tgl_lhp)->isoFormat(' D MMMM Y');

        $kode = DB::table('temuan')
            ->join('kode_temuan', 'temuan.kode_temuan', '=', 'kode_temuan.id')
            ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
            ->select('kode_temuan.nama', 'kode_bidang.nama as bidang')
            ->where('kode_temuan.id', $temuan->kode_temuan)
            ->where('kode_bidang.id', $temuan->bidang_temuan)
            ->first();
        $kode_sebab = KodeSebab::all();
        $title_lhp = 'Data LHP';
        $title_temuan = 'Data Temuan';
        $title = 'Penyebab Penyimpangan';
        return view('penyebab.create', compact(
            'kode_sebab',
            'title_lhp',
            'title_temuan',
            'kode',
            'data',
            'tgl_lhp',
            'title',
            'request',
            'id',
            'temuan'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_temuan' => 'required',
            'no_sebab' => 'required',
            'uraian_sebab' => 'required',
            'kode_sebab' => 'required',
        ]);

        $penyebab = new Penyebab;
        $penyebab->id_temuan = $request->id_temuan;
        $penyebab->no_sebab = $request->no_sebab;
        $penyebab->uraian_sebab = $request->uraian_sebab;
        $penyebab->kode_sebab = $request->kode_sebab;
        $penyebab->created_by = auth()->user()->level;
        $penyebab->save();

        return redirect()->route('penyebab.index', $request->id_temuan)->with('success', 'Tambah Data Berhasil');
    }

    public function stoe(Request $request)
    {
        $penyebab = new Penyebab;
        $penyebab->id_temuan = $request->id_temuan;
        $penyebab->no_sebab = $request->no_sebab;
        $penyebab->uraian_sebab = $request->uraian_sebab;
        $penyebab->kode_sebab = $request->kode_sebab;
        $penyebab['created_by'] = auth()->user()->level;
        $penyebab->save();
        dd($penyebab);
        // $data = $request->validate([
        //     'id_temuan' => 'required',
        //     'no_sebab' => 'required',
        //     'uraian_sebab' => 'required',
        //     'kode_sebab' => 'required',
        // ]);
        // dd($data);
        // try {
        //     $data['id_temuan'] = $request->id;
        //     $data['created_by'] = auth()->user()->level;
        //     Penyebab::create($data);
        //     return redirect()->route('lhp.show', $request->id_temuan)->with('success', 'Tambah Data Berhasil');
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data ke database.');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        // }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
