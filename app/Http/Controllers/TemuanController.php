<?php

namespace App\Http\Controllers;

use App\Models\KlarifikasiObrik;
use App\Models\KodeTemuan;
use App\Models\Lhp;
use App\Models\Temuan;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Validator;

class TemuanController extends Controller
{

    public function index(Request $request)
    {
        //   
    }

    public function create(Request $request, $id)
    {
        $data = Lhp::find($id);
        $klarifikasi = KlarifikasiObrik::find($data->klarifikasi);

        $data = DB::table('lhp')
            ->join('klarifikasi_obrik', 'klarifikasi_obrik.id', '=', 'lhp.klarifikasi')
            ->join('obrik', 'obrik.id', '=', 'lhp.obrik')
            ->select('lhp.*', 'klarifikasi_obrik.nama', 'obrik.nama AS nama_obrik')
            ->where('lhp.id', $id)
            ->first();
        $tgl_lhp = Carbon::parse($data->tgl_lhp)->isoFormat(' D MMMM Y');
        $dataobrik = DB::table('obrik')->get();

        $kod_temuan = DB::table('kode_temuan')->get();
        $kod_bidang = DB::table('kode_bidang')->get();
        $title = 'Tambah Data';
        return view('temuan.create', compact('kod_bidang', 'kod_temuan', 'data', 'dataobrik', 'klarifikasi', 'tgl_lhp', 'title', 'request', 'id'));
    }


    public function store(Request $request)
    {
        // validate the form input
        // $data =  $request->validate([
        //     'id_lhp' => 'required',
        //     'bidang_temuan' => 'required',
        //     'no_temuan' => 'required',
        //     'judul_temuan' => 'required',
        //     'uraian_temuan' => 'required',
        //     'kode_temuan' => 'required',
        //     "jml_rnd_neg" => 'required',
        //     "jml_snd_neg" => 'required',
        //     "jml_rnd_drh" => 'required',
        //     "jml_snd_drh" => 'required',
        //     "keterangan" => 'required',

        // ]);
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'id_lhp' => 'required',
                'bidang_temuan' => 'required',
                'no_temuan' => 'required',
                'judul_temuan' => 'required',
                'uraian_temuan' => 'required',
                'kode_temuan' => 'required',
                "jml_rnd_neg" => 'required',
                "jml_snd_neg" => 'required',
                "jml_rnd_drh" => 'required',
                "jml_snd_drh" => 'required',
                "keterangan" => 'required',
            ],

        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->all(),);
        }


        $rnd_neg = str_replace(',', '.', preg_replace("/[^0-9,]/", "", $request->jml_rnd_neg));
        $rnd_drh = str_replace(',', '.', preg_replace("/[^0-9,]/", "", $request->jml_rnd_drh));
        $snd_neg = str_replace(',', '.', preg_replace("/[^0-9,]/", "", $request->jml_snd_neg));
        $snd_drh = str_replace(',', '.', preg_replace("/[^0-9,]/", "", $request->jml_snd_drh));

        try {
            $data = new Temuan;
            $data->id_lhp = $request->id_lhp;
            $data->bidang_temuan = $request->bidang_temuan;
            $data->no_temuan = $request->no_temuan;
            $data->judul_temuan = $request->judul_temuan;
            $data->uraian_temuan = $request->uraian_temuan;
            $data->kode_temuan = $request->kode_temuan;
            $data->keterangan = $request->keterangan;
            $data->jml_rnd_neg = $rnd_neg;
            $data->jml_rnd_drh = $rnd_drh;
            $data->jml_rnd_neg = $snd_neg;
            $data->jml_snd_drh = $snd_drh;
            $kode = Temuan::find($request->id);
            if (!$kode) {
                $data['created_by'] = auth()->user()->level;
                $data['created_by_id'] = auth()->user()->id;
            }
            $data['updated_by'] = auth()->user()->name;
            $data['updated_by_id'] = auth()->user()->id;

            $data->save();

            return redirect()->route('lhp.show', $request->id_lhp)->with('success', 'Tambah Data Berhasil');
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }



        // try {
        //     $kode = Temuan::find($request->id);
        //     if (!$kode) {
        //         $data['created_by'] = auth()->user()->level;
        //         $data['created_by_id'] = auth()->user()->id;
        //     }
        //     $data['updated_by'] = auth()->user()->name;
        //     $data['updated_by_id'] = auth()->user()->id;
        //     $data['id_temuan'] = $request->kode_temuan;
        //     $data['urian_temuan'] = $request->uraian_temuan;
        //     Temuan::create($data);
        //     return redirect()->route('lhp.show', $request->id_lhp)->with('success', 'Tambah Data Berhasil');
        // } catch (\Exception $e) {
        //     echo $e->getMessage();
        // }
    }


    public function show(Request $request, $id)
    {
        $temuan = Temuan::find($id);
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
        $title = 'Edit Temuan Hasil Pemeriksaan';
        return view('temuan.show', compact('title_lhp', 'title_temuan', 'kode', 'data', 'tgl_lhp', 'title', 'request', 'id', 'temuan'));
    }

    public function edit(Request $request, $id)
    {

        $temuan = Temuan::find($id);
        $data = DB::table('lhp')
            ->join('klarifikasi_obrik', 'klarifikasi_obrik.id', '=', 'lhp.klarifikasi')
            ->join('obrik', 'obrik.id', '=', 'lhp.obrik')
            ->select('lhp.*', 'klarifikasi_obrik.nama', 'obrik.nama AS nama_obrik')
            ->where('lhp.id', $temuan->id_lhp)
            ->first();
        // dd($data);
        $tgl_lhp = Carbon::parse($data->tgl_lhp)->isoFormat(' D MMMM Y');

        $dataobrik = DB::table('obrik')->get();
        $kod_temuan = DB::table('kode_temuan')->get();
        $kod_bidang = DB::table('kode_bidang')->get();
        $title = 'Edit Temuan Hasil Pemeriksaan';
        return view('temuan.edit', compact('kod_bidang', 'kod_temuan', 'data', 'dataobrik', 'tgl_lhp', 'title', 'request', 'id', 'temuan'));
    }


    public function update(Request $request, $id)
    {
        $data =  $request->validate([
            'id_lhp' => 'required',
            'bidang_temuan' => 'required',
            'no_temuan' => 'required',
            'judul_temuan' => 'required',
            'uraian_temuan' => 'required',
            'kode_temuan' => 'required',
            "jml_rnd_neg" => 'required',
            "jml_snd_neg" => 'required',
            "jml_rnd_drh" => 'required',
            "jml_snd_drh" => 'required',
            "keterangan" => 'required',
        ]);

        try {
            // dd($request);
            $temuan = Temuan::find($request->id);
            $data['id_temuan'] = $request->kode_temuan;
            $data['urian_temuan'] = $request->uraian_temuan;
            $kode = Temuan::find($request->id);
            if (!$kode) {
                $data['created_by'] = auth()->user()->level;
                $data['created_by_id'] = auth()->user()->id;
            }
            $data['updated_by'] = auth()->user()->name;
            $data['updated_by_id'] = auth()->user()->id;
            $temuan->update($data);
            return redirect()->route('lhp.show', $request->id_lhp)->with('success', 'Tambah Data Berhasil');
        } catch (\Exception $e) {
            echo $e->getMessage();
            //     // die;
            return redirect()->route('temuan.edit', $temuan->id)->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }


    public function destroy($id)
    {
        $temuan = Temuan::find($id);
        $lhpID = $temuan->id_lhp;
        $temuan->delete();
        return redirect()->route('lhp.show', $lhpID)->with('success', 'Data Berhasil Dihapus');
    }
}
