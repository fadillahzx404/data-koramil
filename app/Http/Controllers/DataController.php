<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\StatusData;
use App\Models\DataDetails;
use App\Models\Kelurahaan;
use App\Models\Penduduk;
use App\Models\Wajib_Ktp;
use App\Models\Kartu_Keluarga;
use App\Models\Agama;
use App\Models\Status_Perkawinan;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Data::All();
        return view('pages.data.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $kelurahaan = Kelurahaan::All();
        return view('pages.data.create', ['kelurahaan' => $kelurahaan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $unique = Data::where([['month', '=', $data['month']], ['year', '=', $data['year']], ['kelurahaan_id', '=', $data['kelurahaan_id']]])->first();

        if ($unique == null) {
            $data['status'] = 'Input';
            $datas = new Data();
            $datas = Data::create([
                'month' => $data['month'],
                'year' => $data['year'],
                'kelurahaan_id' => $data['kelurahaan_id'],
                'keterangan' => $data['keterangan'],
                'status' => $data['status'],
            ]);

            Penduduk::create([
                'datas_id' => $datas->id,
                'jumlah_penduduk_laki_laki' => $data['penduduk_laki_laki'],
                'jumlah_penduduk_perempuan' => $data['penduduk_perempuan'],
                'jumlah_penduduk' => $data['penduduk_laki_laki'] + $data['penduduk_perempuan'],
            ]);

            Wajib_Ktp::create([
                'datas_id' => $datas->id,
                'wajib_ktp_laki_laki' => $data['wajib_ktp_laki_laki'],
                'wajib_ktp_perempuan' => $data['wajib_ktp_perempuan'],
                'jumlah_wajib_ktp' => $data['wajib_ktp_laki_laki'] + $data['wajib_ktp_perempuan'],
            ]);

            Kartu_Keluarga::create([
                'datas_id' => $datas->id,
                'kk_laki_laki' => $data['kk_laki_laki'],
                'kk_perempuan' => $data['kk_perempuan'],
                'jumlah_kartu_keluarga' => $data['kk_laki_laki'] + $data['kk_perempuan'],
            ]);

            foreach ($data['status_perkawinan'] as $sp => $val) {
                Status_Perkawinan::create([
                    'datas_id' => $datas->id,
                    'status_perkawinan' => $val,
                    'jumlah_status_laki_laki' => $data['jumlah_status_laki_laki'][$sp],
                    'jumlah_status_perempuan' => $data['jumlah_status_perempuan'][$sp],
                    'jumlah_status_perkawinan' => $data['jumlah_status_laki_laki'][$sp] + $data['jumlah_status_perempuan'][$sp],
                ]);
            }

            foreach ($data['agama'] as $agm => $val) {
                Agama::create([
                    'datas_id' => $datas->id,
                    'agama' => $val,
                    'jumlah_agama_laki_laki' => $data['jumlah_agama_laki_laki'][$agm],
                    'jumlah_agama_perempuan' => $data['jumlah_agama_perempuan'][$agm],
                    'jumlah_agama' => $data['jumlah_agama_laki_laki'][$agm] + $data['jumlah_agama_perempuan'][$agm],
                ]);
            }

            return redirect()
                ->route('datas.index')
                ->with('Success', 'Data Ditambahkan');
        }
        $kel = Kelurahaan::where('id', '=', $data['kelurahaan_id'])->first();

        return back()
            ->withInput($request->input())
            ->with('error', "Maaf data atas kelurahaan $kel->nama_kelurahaan serta bulan $request->month dan tahun $request->year sudah ada !!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelurahaan = Kelurahaan::All();
        $datas = Data::findOrFail($id);

        return view('pages.data.edit', ['datas' => $datas, 'kelurahaan' => $kelurahaan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        Data::findOrFail($id)->update([
            'keterangan' => $data['keterangan'],
        ]);

        Penduduk::where('datas_id', $id)->update([
            'jumlah_penduduk_laki_laki' => $data['penduduk_laki_laki'],
            'jumlah_penduduk_perempuan' => $data['penduduk_perempuan'],
            'jumlah_penduduk' => $data['penduduk_laki_laki'] + $data['penduduk_perempuan'],
        ]);

        Wajib_Ktp::where('datas_id', $id)->update([
            'wajib_ktp_laki_laki' => $data['wajib_ktp_laki_laki'],
            'wajib_ktp_perempuan' => $data['wajib_ktp_perempuan'],
            'jumlah_wajib_ktp' => $data['wajib_ktp_laki_laki'] + $data['wajib_ktp_perempuan'],
        ]);

        Kartu_Keluarga::where('datas_id', $id)->update([
            'kk_laki_laki' => $data['kk_laki_laki'],
            'kk_perempuan' => $data['kk_perempuan'],
            'jumlah_kartu_keluarga' => $data['kk_laki_laki'] + $data['kk_perempuan'],
        ]);

        foreach ($data['status_perkawinan'] as $sp => $val) {
            Status_Perkawinan::where('datas_id', $id)
                ->where('status_perkawinan', $val)
                ->update([
                    'jumlah_status_laki_laki' => $data['jumlah_status_laki_laki'][$sp],
                    'jumlah_status_perempuan' => $data['jumlah_status_perempuan'][$sp],
                    'jumlah_status_perkawinan' => $data['jumlah_status_laki_laki'][$sp] + $data['jumlah_status_perempuan'][$sp],
                ]);
        }

        foreach ($data['agama'] as $agm => $val) {
            Agama::where('datas_id', $id)
                ->where('agama', $val)
                ->update([
                    'jumlah_agama_laki_laki' => $data['jumlah_agama_laki_laki'][$agm],
                    'jumlah_agama_perempuan' => $data['jumlah_agama_perempuan'][$agm],
                    'jumlah_agama' => $data['jumlah_agama_laki_laki'][$agm] + $data['jumlah_agama_perempuan'][$agm],
                ]);
        }

        return redirect()
            ->route('datas.index')
            ->with('Success', 'Data Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penduduk::where('datas_id', $id)->delete();
        Wajib_Ktp::where('datas_id', $id)->delete();
        Kartu_Keluarga::where('datas_id', $id)->delete();
        Agama::where('datas_id', $id)->delete();
        Status_Perkawinan::where('datas_id', $id)->delete();
        $item = Data::findOrFail($id);
        $item->delete();

        return redirect()
            ->route('datas.index')
            ->with('Success', 'Data Dihapus');
    }
}
