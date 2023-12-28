<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Data::all()
            ->where('status', 'ACC')
            ->groupBy(['year', 'month'])
            ->sortBy('year');

        return view('pages.report.index', ['datas' => $datas]);
    }

    public function details(Request $request, $year, $month)
    {
        if ($request->select_datas == 'Penduduk') {
            $datas = Data::with('penduduk')
                ->where([['year', $request->year], ['month', $request->month]])
                ->get();
            $status = '';
            foreach ($datas as $stat) {
                $status = $stat;
            }
            return view('pages.report.details', ['datas' => $datas, 'year' => $request->year, 'month' => $request->month, 'status' => $status->status]);
        } elseif ($request->select_datas == 'Wajib_Ktp') {
            $datas = Data::with('wajib_ktp')
                ->where([['year', $request->year], ['month', $request->month]])
                ->get();

            $status = '';
            foreach ($datas as $stat) {
                $status = $stat;
            }

            return view('pages.report.details', ['datas' => $datas, 'year' => $request->year, 'month' => $request->month, 'status' => $status->status]);
        } elseif ($request->select_datas == 'KK') {
            $datas = Data::with('kartu_keluarga')
                ->where([['year', $request->year], ['month', $request->month]])
                ->get();

            $status = '';
            foreach ($datas as $stat) {
                $status = $stat;
            }

            return view('pages.report.details', ['datas' => $datas, 'year' => $request->year, 'month' => $request->month, 'status' => $status->status]);
        } elseif ($request->select_datas == 'SP') {
            $datas = Data::with('status_perkawinan')
                ->where([['year', $request->year], ['month', $request->month]])
                ->get();

            $status = '';
            foreach ($datas as $stat) {
                $status = $stat;
            }
            return view('pages.report.details', ['datas' => $datas, 'year' => $request->year, 'month' => $request->month, 'status' => $status->status]);
        } elseif ($request->select_datas == 'Agama') {
            $datas = Data::with('agama')
                ->where([['year', $request->year], ['month', $request->month]])
                ->get();

            $status = '';
            foreach ($datas as $stat) {
                $status = $stat;
            }
            return view('pages.report.details', ['datas' => $datas, 'year' => $request->year, 'month' => $request->month, 'status' => $status->status]);
        } else {
            $datas = Data::with('penduduk')
                ->where([['year', $year], ['month', $month]])
                ->get();

            $status = '';
            foreach ($datas as $stat) {
                $status = $stat;
            }

            return view('pages.report.details', ['datas' => $datas, 'year' => $year, 'month' => $month, 'status' => $status->status]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
