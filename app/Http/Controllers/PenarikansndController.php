<?php

namespace App\Http\Controllers;

use App\Models\KodeTlhp;
use App\Models\Lhp;
use App\Models\Penarikanrnd;
use App\Models\Penarikansnd;
use App\Models\Rekomendasi;
use App\Models\Temuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Type\Decimal;

class PenarikansndController extends Controller
{

    public function index(Request $request, $id)
    {

        $temuan = Temuan::find($id);
        $data_lhp = DB::table('lhp')
            ->join('klarifikasi_obrik', 'klarifikasi_obrik.id', '=', 'lhp.klarifikasi')
            ->join('obrik', 'obrik.id', '=', 'lhp.obrik')
            ->select('lhp.*', 'klarifikasi_obrik.nama', 'obrik.nama AS nama_obrik')
            ->where('lhp.id', $temuan->id_lhp)
            ->first();
        // dd($temuan);
        $tgl_lhp = Carbon::parse($data_lhp->tgl_lhp)->isoFormat(' D MMMM Y');

        $data_temuan = DB::table('temuan')
            ->join('kode_temuan', 'temuan.kode_temuan', '=', 'kode_temuan.id')
            ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
            ->select('kode_temuan.nama', 'kode_bidang.nama as bidang')
            ->where('kode_temuan.id', $temuan->kode_temuan)
            ->where('kode_bidang.id', $temuan->bidang_temuan)
            ->first();

        $data_penarikan = DB::table('penarikan_kerugian')
            ->select('penarikan_kerugian.*', 'id', 'jml_penarikan_neg', 'jml_penarikan_drh', 'keterangan', 'tgl_penarikan')
            ->where('id_temuan', $temuan->id)
            ->where('jns_kerugian', '=', 'SND')
            ->get();

        // Data Hasil Temuan
        $kerugian_neg = $temuan->jml_snd_neg;
        $kerugian_drh = $temuan->jml_snd_drh;
        $total_kerugian = $kerugian_neg + $kerugian_drh;
        // dd($total_kerugian);

        // Total Ditarik
        $tarik_neg = $data_penarikan->sum('jml_penarikan_neg');
        $tarik_drh = $data_penarikan->sum('jml_penarikan_drh');
        $tot_tarik = $tarik_neg + $tarik_drh;
        // dd($tarik_neg);

        $tot_sisa = $total_kerugian - $tot_tarik;
        // dd($tot_sisa);
        $sisa_neg = $kerugian_neg - $tarik_neg;
        $sisa_drh = $kerugian_drh - $tarik_drh;

        $title_lhp = 'Data LHP';
        $title_temuan = 'Data Temuan';
        $title = 'Penarikan Kewajiban Setor Pada Negara/Daerah (SND)';
        return view('penarikan_snd.index', compact(
            'title',
            'title_lhp',
            'title_temuan',
            'data_lhp',
            'data_temuan',
            'tgl_lhp',
            'temuan',
            'id',

            'total_kerugian',
            'data_penarikan',
            'tot_tarik',
            'tot_sisa',
            'tarik_neg',
            'tarik_drh',
            'sisa_neg',
            'sisa_drh',
        ));
    }


    public function create(Request $request, $id)
    {
        $data_temuan = Temuan::findOrFail($id);
        $data_tgl_tlhp = Carbon::parse($data_temuan->tlhp_tgl)->isoFormat(' D MMMM Y');
        $temuan = $request->$data_temuan;
        $status_tlhp = [
            'S' => 'Selesai',
            'B' => 'Belum',
            'D' => 'Dalam Proses'
        ];
        $data = Lhp::join('temuan', 'lhp.id', '=', 'temuan.id_lhp')
            ->join('klarifikasi_obrik', 'lhp.klarifikasi', '=', 'klarifikasi_obrik.id')
            ->join('obrik', 'lhp.obrik', '=', 'obrik.id')
            ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
            ->join('kode_temuan', 'temuan.kode_temuan', '=', 'kode_temuan.id')
            ->select(
                'klarifikasi_obrik.nama AS klarifikasi_obrik_nama',
                'obrik.nama AS obrik_nama',
                DB::raw("DATE_FORMAT(lhp.tgl_lhp, '%d %M %Y') as tgl_lhp"),
                'lhp.id as lhp_id',
                'lhp.no_lhp as lhp_no',
                'lhp.tahun as lhp_tahun',
                'temuan.id as temuan_id',
                'temuan.no_temuan as temuan_no',
                'temuan.judul_temuan as temuan_judul',
                'temuan.jml_snd_neg as snd',
                'kode_bidang.nama as bidang_temuan',
                'kode_temuan.nama as kod_temuan',
            )
            ->where('temuan.id', $data_temuan->id)->first();
        $data_tgl_lhp = Carbon::parse($data->tgl_lhp)->isoFormat(' D MMMM Y');

        $kod_tlhp = DB::table('rekomendasi')
            ->join('kode_tlhp', 'rekomendasi.kode_tlhp', '=', 'kode_tlhp.id')
            ->select('kode_tlhp.*')
            ->where('rekomendasi.id', $data_temuan->id)
            ->get();
        $kod_tlhp = KodeTlhp::all();
        // $status_tlhp = ['S' => 'Selesai', 'B' => 'Belum', 'D' => 'Dalam Proses'];
        $data_penarikan = DB::table('penarikan_kerugian')
            ->select('penarikan_kerugian.*', 'id', 'jml_penarikan_neg', 'jml_penarikan_drh', 'keterangan', 'tgl_penarikan')
            ->where('id_temuan', $data_temuan->id)
            ->where('jns_kerugian', '=', 'SND')
            ->get();
        $tarik_neg = $data_penarikan->sum('jml_penarikan_neg');
        $tarik_drh = $data_penarikan->sum('jml_penarikan_drh');
        $total_penarikan = $tarik_neg + $tarik_drh;

        // Data Hasil Temuan
        $kerugian_neg = $data_temuan->jml_snd_neg;
        // dd($kerugian_neg);
        $kerugian_drh = $data_temuan->jml_snd_drh;
        // dd($kerugian_drh);
        $total_kerugian = $kerugian_neg + $kerugian_drh;
        // dd($total_kerugian);
        $sisa_kerugian = $total_kerugian - $total_penarikan;




        return view('penarikan_snd.create', compact(
            'data_temuan',
            'data',
            'data_tgl_tlhp',
            'status_tlhp',
            'kod_tlhp',
            'data_tgl_lhp',
            'request',
            'total_penarikan',
            'tarik_neg',
            'total_kerugian',
            'sisa_kerugian',
        ));
    }


    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_temuan' => 'required',
                'tgl_penarikan' => 'required',
                'jml_penarikan_neg' => 'required',
                'jml_penarikan_drh' => 'required',
                'keterangan' => 'required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->all(),);
        }
        $rd = str_replace(',', '.', preg_replace("/[^0-9,]/", "", $request->jml_penarikan_neg));
        $rd1 = str_replace(',', '.', preg_replace("/[^0-9,]/", "", $request->jml_penarikan_drh));

        try {
            $data = new Penarikansnd;
            $data->id_temuan = $request->id_temuan;
            $data->tgl_penarikan = $request->tgl_penarikan;
            $data->jml_penarikan_neg = $rd;
            $data->jml_penarikan_drh = $rd1;
            $data->keterangan = $request->keterangan;
            $kode = Penarikansnd::find($request->id);
            if (!$kode) {
                $data['created_by'] = auth()->user()->level;
                $data['created_by_id'] = auth()->user()->id;
            }
            $data['updated_by'] = auth()->user()->name;
            $data['updated_by_id'] = auth()->user()->id;
            $data['jns_kerugian'] = 'SND';
            $data->save();

            return redirect()->route('penarikansnd.index', $request->id_temuan)->with('success', 'Tambah Data Berhasil');
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }


    public function show(Request $request, $id)
    {
        $data_penarikanrnd = Penarikansnd::findOrFail($id);
        $data = Lhp::join('temuan', 'lhp.id', '=', 'temuan.id_lhp')
            ->join('klarifikasi_obrik', 'lhp.klarifikasi', '=', 'klarifikasi_obrik.id')
            ->join('obrik', 'lhp.obrik', '=', 'obrik.id')
            ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
            ->join('kode_temuan', 'temuan.kode_temuan', '=', 'kode_temuan.id')
            ->select(
                'klarifikasi_obrik.nama AS klarifikasi_obrik_nama',
                'obrik.nama AS obrik_nama',
                DB::raw("DATE_FORMAT(lhp.tgl_lhp, '%d %M %Y') as tgl_lhp"),
                'lhp.id as lhp_id',
                'lhp.no_lhp as lhp_no',
                'lhp.tahun as lhp_tahun',
                'temuan.id as temuan_id',
                'temuan.no_temuan as temuan_no',
                'temuan.judul_temuan as temuan_judul',
                'kode_bidang.nama as bidang_temuan',
                'kode_temuan.nama as kod_temuan',
            )
            ->where('temuan.id', $data_penarikanrnd->id_temuan)->first();
        $data_tgl_lhp = Carbon::parse($data->tgl_lhp)->isoFormat(' D MMMM Y');

        $tgl_penarikanrnd = Carbon::parse($data_penarikanrnd->tgl_penarikan)->isoFormat('D MMMM Y');

        return view('penarikan_snd.show', compact(
            'tgl_penarikanrnd',
            'data_penarikanrnd',
            'data',
            'data_tgl_lhp',
            'request',
        ));
    }

    public function edit(Request $request, $id)
    {
        $data_penarikansnd = Penarikansnd::findOrFail($id);
        $data_temuan = Temuan::findOrFail($id);
        $data_tgl_tlhp = Carbon::parse($data_temuan->tlhp_tgl)->isoFormat(' D MMMM Y');
        $temuan = $request->$data_temuan;
        $status_tlhp = [
            'S' => 'Selesai',
            'B' => 'Belum',
            'D' => 'Dalam Proses'
        ];
        $data = Lhp::join('temuan', 'lhp.id', '=', 'temuan.id_lhp')
            ->join('klarifikasi_obrik', 'lhp.klarifikasi', '=', 'klarifikasi_obrik.id')
            ->join('obrik', 'lhp.obrik', '=', 'obrik.id')
            ->join('kode_bidang', 'temuan.bidang_temuan', '=', 'kode_bidang.id')
            ->join('kode_temuan', 'temuan.kode_temuan', '=', 'kode_temuan.id')
            ->select(
                'klarifikasi_obrik.nama AS klarifikasi_obrik_nama',
                'obrik.nama AS obrik_nama',
                DB::raw("DATE_FORMAT(lhp.tgl_lhp, '%d %M %Y') as tgl_lhp"),
                'lhp.id as lhp_id',
                'lhp.no_lhp as lhp_no',
                'lhp.tahun as lhp_tahun',
                'temuan.id as temuan_id',
                'temuan.no_temuan as temuan_no',
                'temuan.judul_temuan as temuan_judul',
                'temuan.jml_snd_neg as snd',
                'kode_bidang.nama as bidang_temuan',
                'kode_temuan.nama as kod_temuan',
            )
            ->where('temuan.id', $data_temuan->id)->first();
        $data_tgl_lhp = Carbon::parse($data->tgl_lhp)->isoFormat(' D MMMM Y');

        $kod_tlhp = DB::table('rekomendasi')
            ->join('kode_tlhp', 'rekomendasi.kode_tlhp', '=', 'kode_tlhp.id')
            ->select('kode_tlhp.*')
            ->where('rekomendasi.id', $data_temuan->id)
            ->get();
        $kod_tlhp = KodeTlhp::all();
        // $status_tlhp = ['S' => 'Selesai', 'B' => 'Belum', 'D' => 'Dalam Proses'];
        $data_penarikan = DB::table('penarikan_kerugian')
            ->select('penarikan_kerugian.*', 'id', 'jml_penarikan_neg', 'jml_penarikan_drh', 'keterangan', 'tgl_penarikan')
            ->where('id_temuan', $data_temuan->id)
            ->where('jns_kerugian', '=', 'SND')
            ->get();
        $tarik_neg = $data_penarikan->sum('jml_penarikan_neg');
        $tarik_drh = $data_penarikan->sum('jml_penarikan_drh');
        $total_penarikan = $tarik_neg + $tarik_drh;

        // Data Hasil Temuan
        $kerugian_neg = $data_temuan->jml_snd_neg;
        // dd($kerugian_neg);
        $kerugian_drh = $data_temuan->jml_snd_drh;
        // dd($kerugian_drh);
        $total_kerugian = $kerugian_neg + $kerugian_drh;
        // dd($total_kerugian);
        $sisa_kerugian = $total_kerugian - $total_penarikan;




        return view('penarikan_snd.edit', compact(
            'data_penarikansnd',
            'data_temuan',
            'data',
            'data_tgl_tlhp',
            'status_tlhp',
            'kod_tlhp',
            'data_tgl_lhp',
            'request',
            'total_penarikan',
            'tarik_neg',
            'total_kerugian',
            'sisa_kerugian',
        ));
    }


    public function update(Request $request, $id)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'id_temuan' => 'required',
                'tgl_penarikan' => 'required',
                'jml_penarikan_neg' => 'required',
                'jml_penarikan_drh' => 'required',
                'keterangan' => 'required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->all(),);
        }
        $rd = str_replace(',', '.', preg_replace("/[^0-9,]/", "", $request->jml_penarikan_neg));
        $rd1 = str_replace(',', '.', preg_replace("/[^0-9,]/", "", $request->jml_penarikan_drh));

        try {

            $data =  Penarikansnd::findOrFail($id);
            $data->id_temuan = $request->id_temuan;
            $data->tgl_penarikan = $request->tgl_penarikan;
            $data->jml_penarikan_neg = $rd;
            $data->jml_penarikan_drh = $rd1;
            $data->keterangan = $request->keterangan;
            $kode = Penarikansnd::find($request->id);
            if (!$kode) {
                $data['created_by'] = auth()->user()->level;
                $data['created_by_id'] = auth()->user()->id;
            }
            $data['updated_by'] = auth()->user()->name;
            $data['updated_by_id'] = auth()->user()->id;
            $data['jns_kerugian'] = 'SND';
            $data->update();

            return redirect()->route('penarikansnd.index', $request->id_temuan)->with('success', 'Update Data Berhasil');
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }


    public function destroy($id)
    {
        $penarikan = Penarikansnd::findOrfail($id);
        $penarikan->delete();
        return redirect()->back()->withInput()->with('success', 'Data berhasil dihapus');
    }
}
