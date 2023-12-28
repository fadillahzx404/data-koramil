@extends('layouts.app')
@section('title')
    Laporan {{ $year }} {{ $month }}
    Data {{ request()->get('select_datas') ? request()->get('select_datas') : 'Penduduk' }}
@endsection
@section('page-content')
    <div class="data-flash" data-flash="{!! \Session::get('Success') !!}">
    </div>
    <div class="container px-12 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">
        <div class="relative overflow-x-auto shadow-lg border bg-white border-gray-200 sm:rounded-lg p-5">
            <div class="title-table grid">
                <form action="{{ route('status-edit-admin') }}" method="POST">
                    @csrf

                    <div class="flex justify-between place-content-center">
                        <div class="grid ">
                            <p class="text-lg ">Data Tahun <span class="font-bold">{{ $year }}</span> Bulan
                                <span class="font-bold">{{ $month }}</span>
                            </p>
                            <p class="text-sm font-light text-gray-400">Data berdasarkan bulan dan tahun
                            </p>

                        </div>
                    </div>

                </form>
            </div>


            <hr class="mb-3 mt-2 border-gray-400" />

            <div class="flex justify-between">
                <div class="self-center flex gap-4 pt-4">
                    <button class="btn btn-sm px-5 btn-active hover:scale-90 transition-all duration-300 hover:btn-neutral"
                        id="btnPrint">Print Data</button>
                    {{-- <button class="btn btn-sm px-5 btn-active  hover:scale-90 transition-all duration-300 hover:btn-neutral"
                        id="printButtonAll">Print Semua
                        Data</button> --}}
                </div>
                <form action="GET" id="myForm">
                    <input type="hidden" name="year" value="{{ $year }}" />
                    <input type="hidden" name="month" value="{{ $month }}" />
                    <div class="flex">
                        <label class="form-control w-full max-w-xs mb-5">
                            <div class="label">
                                <span class="label-text">Pilih data berdasarkan kategori</span>
                            </div>

                            <select class="select select-bordered" name="select_datas" id="select_datas">
                                <option value="Penduduk"
                                    {{ request()->get('select_datas') == 'Penduduk' ? 'selected' : '' }}>
                                    Penduduk
                                </option>
                                <option value="Wajib_Ktp"
                                    {{ request()->get('select_datas') == 'Wajib_Ktp' ? 'selected' : '' }}>
                                    Wajib
                                    KTP</option>
                                <option value="KK" {{ request()->get('select_datas') == 'KK' ? 'selected' : '' }}>Kartu
                                    Keluarga
                                </option>
                                <option value="SP" {{ request()->get('select_datas') == 'SP' ? 'selected' : '' }}>
                                    Status
                                    Perkawinan
                                </option>
                                <option value="Agama" {{ request()->get('select_datas') == 'Agama' ? 'selected' : '' }}>
                                    Agama
                                </option>
                            </select>


                        </label>


                    </div>
                </form>
            </div>

            <table class="w-full text-sm text-gray-500 dark:text-gray-400 datatable display" style="width: 100%"
                id="datatable">
                <thead class="text-xs text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">


                    <tr>
                        <th scope="col"
                            @if (request()->get('select_datas') == 'SP') rowspan="2" @elseif (request()->get('select_datas') == 'Agama') rowspan="2" @endif
                            class="w-10 p-4 text-center border border-slate-300" style="text-align: center;">
                            No
                        </th>
                        <th scope="col"
                            @if (request()->get('select_datas') == 'SP') rowspan="2" @elseif (request()->get('select_datas') == 'Agama') rowspan="2" @endif
                            class="p-4 text-center border border-slate-300" style="text-align: center;">
                            Desa/Kelurahaan
                        </th>
                        @if (request()->get('select_datas') == 'Penduduk')
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Laki-laki
                            </th>
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Perempuan
                            </th>
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Jumlah
                            </th>
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Keterangan
                            </th>
                        @elseif (request()->get('select_datas') == 'Wajib_Ktp')
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Laki-laki
                            </th>
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Perempuan
                            </th>
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Jumlah
                            </th>
                        @elseif (request()->get('select_datas') == 'KK')
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Laki-laki
                            </th>
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Perempuan
                            </th>
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Jumlah
                            </th>
                        @elseif (request()->get('select_datas') == 'SP')
                            @foreach ($datas[0]['status_perkawinan'] as $sk => $val)
                                <th colspan="2" class="p-4 text-center border border-slate-300 bg-yellow-300">
                                    {{ $val->status_perkawinan }}
                                </th>
                            @endforeach
                        @elseif (request()->get('select_datas') == 'Agama')
                            @foreach ($datas[0]['agama'] as $agm => $val)
                                <th colspan="2" class="p-4 text-center border border-slate-300 bg-yellow-300">
                                    {{ $val->agama }}
                                </th>
                            @endforeach
                        @else
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Laki-laki
                            </th>
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Perempuan
                            </th>
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Jumlah
                            </th>
                            <th scope="col" class="p-4 text-center border border-slate-300">
                                Keterangan
                            </th>
                        @endif



                    </tr>
                    @if (request()->get('select_datas') == 'SP')
                        <tr>

                            @foreach ($datas[0]['status_perkawinan'] as $sk => $val)
                                <th class="p-4  bg-red-700 text-black text-center border">L</th>
                                <th class="p-4  bg-red-700 text-black text-center border">P</th>
                            @endforeach
                        </tr>
                    @elseif (request()->get('select_datas') == 'Agama')
                        <tr>

                            @foreach ($datas[0]['agama'] as $agm => $val)
                                <th class="p-4  bg-gray-300 text-black text-center border">L</th>
                                <th class="p-4  bg-gray-300 text-black text-center border">P</th>
                            @endforeach
                        </tr>
                    @endif




                </thead>
                <tbody>

                    @foreach ($datas as $data)
                        <tr>
                            <td scope="col" class="p-4 text-center border border-slate-300">{{ $loop->iteration }}</td>
                            <td scope="col" class="p-4 text-center border border-slate-300">
                                {{ $data->kelurahaan->nama_kelurahaan }}</td>
                            @if (request()->get('select_datas') == 'Penduduk')
                                <td scope="col" class="p-4 text-center border border-slate-300">
                                    {{ number_format($data->penduduk[0]->jumlah_penduduk_laki_laki) }}</td>
                                <td scope="col" class="p-4 text-center border border-slate-300">
                                    {{ number_format($data->penduduk[0]->jumlah_penduduk_perempuan) }}
                                </td>
                                <td scope="col" class="p-4 text-center border border-slate-300">
                                    {{ number_format($data->penduduk[0]->jumlah_penduduk) }}</td>
                                <td scope="col" class="p-4 text-justify w-80 border border-slate-300">
                                    {{ $data->keterangan }}
                                </td>
                            @elseif (request()->get('select_datas') == 'Wajib_Ktp')
                                <td scope="col" class="p-4 text-center border border-slate-300">
                                    {{ number_format($data->wajib_ktp[0]->wajib_ktp_laki_laki) }}</td>
                                <td scope="col" class="p-4 text-center border border-slate-300">
                                    {{ number_format($data->wajib_ktp[0]->wajib_ktp_perempuan) }}
                                </td>
                                <td scope="col" class="p-4 text-center border border-slate-300">
                                    {{ number_format($data->wajib_ktp[0]->jumlah_wajib_ktp) }}</td>
                            @elseif (request()->get('select_datas') == 'KK')
                                <td scope="col" class="p-4 text-center border border-slate-300">
                                    {{ number_format($data->kartu_keluarga[0]->kk_laki_laki) }}</td>
                                <td scope="col" class="p-4 text-center border border-slate-300">
                                    {{ number_format($data->kartu_keluarga[0]->kk_perempuan) }}
                                </td>
                                <td scope="col" class="p-4 text-center border border-slate-300">
                                    {{ number_format($data->kartu_keluarga[0]->jumlah_kartu_keluarga) }}</td>
                            @elseif (request()->get('select_datas') == 'SP')
                                @foreach ($data->status_perkawinan as $sk => $val)
                                    <td colspan="1" class="border border-slate-300 ">
                                        {{ number_format($val->jumlah_status_laki_laki) }}
                                    <td colspan="1" class="border border-slate-300">
                                        {{ number_format($val->jumlah_status_perempuan) }}

                                    </td>
                                    </td>
                                @endforeach
                            @elseif (request()->get('select_datas') == 'Agama')
                                @foreach ($data->agama as $agm => $val)
                                    <td colspan="1" class="border border-slate-300 ">
                                        {{ number_format($val->jumlah_agama_laki_laki) }}
                                    <td colspan="1" class="border border-slate-300">
                                        {{ number_format($val->jumlah_agama_perempuan) }}

                                    </td>
                                    </td>
                                @endforeach
                            @else
                                <td scope="col" class="p-4 text-center border border-slate-300">
                                    {{ number_format($data->penduduk[0]->jumlah_penduduk_laki_laki) }}</td>
                                <td scope="col" class="p-4 text-center border border-slate-300">
                                    {{ number_format($data->penduduk[0]->jumlah_penduduk_perempuan) }}
                                </td>
                                <td scope="col" class="p-4 text-center border border-slate-300">
                                    {{ number_format($data->penduduk[0]->jumlah_penduduk) }}</td>
                                <td scope="col" class="p-4 text-justify w-80 border border-slate-300">
                                    {{ $data->keterangan }}
                                </td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
                @if (request()->get('select_datas') == 'Penduduk')
                    @php
                        $result_l = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['penduduk'] as $offset => $value) {
                                if (isset($result_l[$offset])) {
                                    $result_l[$offset][$key] = $value['jumlah_penduduk_laki_laki'];
                                } else {
                                    $result_l[$offset] = [$key => $value['jumlah_penduduk_laki_laki']];
                                }
                            }
                        }
                        $sum = [];

                        foreach ($result_l as $key => $value) {
                            $sum['laki_laki'][$key] = array_sum($value);
                        }

                        $result_p = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['penduduk'] as $offset => $value) {
                                if (isset($result_p[$offset])) {
                                    $result_p[$offset][$key] = $value['jumlah_penduduk_perempuan'];
                                } else {
                                    $result_p[$offset] = [$key => $value['jumlah_penduduk_perempuan']];
                                }
                            }
                        }

                        foreach ($result_p as $key => $value) {
                            $sum['perempuan'][$key] = array_sum($value);
                        }

                        $result_j = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['penduduk'] as $offset => $value) {
                                if (isset($result_j[$offset])) {
                                    $result_j[$offset][$key] = $value['jumlah_penduduk'];
                                } else {
                                    $result_j[$offset] = [$key => $value['jumlah_penduduk']];
                                }
                            }
                        }

                        foreach ($result_j as $key => $value) {
                            $sum['jumlah_penduduk'][$key] = array_sum($value);
                        }

                    @endphp
                    <tfoot>
                        <tr>
                            <td colspan="2"
                                class="font-black text-black text-md text-center border border-gray-400 bg-gray-300 border-top-1">
                                Jumlah
                            </td>
                            <td
                                class="font-black text-black text-md text-center border border-gray-400 bg-gray-300 border-top-1 hidden">

                            </td>
                            @php

                            @endphp
                            @foreach ($sum['laki_laki'] as $sum_a => $val)
                                <td class="border border-gray-400 bg-gray-300 text-black font-black">
                                    @php
                                        print_r(number_format($val));
                                    @endphp
                                </td>
                                <td class="border border-gray-400 bg-gray-300 text-black font-black">
                                    @php
                                        print_r(number_format($sum['perempuan'][$sum_a]));
                                    @endphp
                                </td>
                                <td class="border border-gray-400 bg-gray-300 text-black font-black">
                                    @php
                                        print_r(number_format($sum['jumlah_penduduk'][$sum_a]));
                                    @endphp
                                </td>
                                <td class="border border-gray-400 bg-gray-300">

                                </td>
                            @endforeach
                        </tr>
                    </tfoot>
                @elseif (request()->get('select_datas') == 'Wajib_Ktp')
                    @php
                        $result_l = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['wajib_ktp'] as $offset => $value) {
                                if (isset($result_l[$offset])) {
                                    $result_l[$offset][$key] = $value['wajib_ktp_laki_laki'];
                                } else {
                                    $result_l[$offset] = [$key => $value['wajib_ktp_laki_laki']];
                                }
                            }
                        }
                        $sum = [];

                        foreach ($result_l as $key => $value) {
                            $sum['laki_laki'][$key] = array_sum($value);
                        }

                        $result_p = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['wajib_ktp'] as $offset => $value) {
                                if (isset($result_p[$offset])) {
                                    $result_p[$offset][$key] = $value['wajib_ktp_perempuan'];
                                } else {
                                    $result_p[$offset] = [$key => $value['wajib_ktp_perempuan']];
                                }
                            }
                        }

                        foreach ($result_p as $key => $value) {
                            $sum['perempuan'][$key] = array_sum($value);
                        }

                        $result_j = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['wajib_ktp'] as $offset => $value) {
                                if (isset($result_j[$offset])) {
                                    $result_j[$offset][$key] = $value['jumlah_wajib_ktp'];
                                } else {
                                    $result_j[$offset] = [$key => $value['jumlah_wajib_ktp']];
                                }
                            }
                        }

                        foreach ($result_j as $key => $value) {
                            $sum['jumlah_penduduk'][$key] = array_sum($value);
                        }

                    @endphp
                    <tfoot>
                        <tr>
                            <td colspan="1"
                                class="font-black text-black text-center border border-slate-300 bg-gray-200 border-t-0 border-r-0">
                                Jumlah
                            </td>
                            <td
                                class="font-black text-black text-center border border-slate-300 bg-gray-200 border-t-0 border-l-0">

                            </td>
                            @foreach ($sum['laki_laki'] as $sum_a => $val)
                                <td
                                    class="border border-slate-300 bg-gray-200 font-black text-black text-center"style="text-align-last:center">
                                    @php
                                        print_r(number_format($val));
                                    @endphp
                                <td
                                    class="border border-slate-300 bg-gray-200 font-black text-black text-center"style="text-align-last:center">
                                    @php
                                        print_r(number_format($sum['perempuan'][$sum_a]));
                                    @endphp
                                </td>
                                <td
                                    class="border border-slate-300 bg-gray-200 font-black text-black text-center"style="text-align-last:center">
                                    @php
                                        print_r(number_format($sum['jumlah_penduduk'][$sum_a]));
                                    @endphp
                                </td>
                            @endforeach
                        </tr>
                    </tfoot>
                @elseif (request()->get('select_datas') == 'KK')
                    @php
                        $result_l = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['kartu_keluarga'] as $offset => $value) {
                                if (isset($result_l[$offset])) {
                                    $result_l[$offset][$key] = $value['kk_laki_laki'];
                                } else {
                                    $result_l[$offset] = [$key => $value['kk_laki_laki']];
                                }
                            }
                        }
                        $sum = [];

                        foreach ($result_l as $key => $value) {
                            $sum['laki_laki'][$key] = array_sum($value);
                        }

                        $result_p = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['kartu_keluarga'] as $offset => $value) {
                                if (isset($result_p[$offset])) {
                                    $result_p[$offset][$key] = $value['kk_perempuan'];
                                } else {
                                    $result_p[$offset] = [$key => $value['kk_perempuan']];
                                }
                            }
                        }

                        foreach ($result_p as $key => $value) {
                            $sum['perempuan'][$key] = array_sum($value);
                        }

                        $result_j = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['kartu_keluarga'] as $offset => $value) {
                                if (isset($result_j[$offset])) {
                                    $result_j[$offset][$key] = $value['jumlah_kartu_keluarga'];
                                } else {
                                    $result_j[$offset] = [$key => $value['jumlah_kartu_keluarga']];
                                }
                            }
                        }

                        foreach ($result_j as $key => $value) {
                            $sum['jumlah_penduduk'][$key] = array_sum($value);
                        }

                    @endphp
                    <tfoot>


                        <tr>
                            <td colspan="1"
                                class="font-black text-black text-center border border-slate-300 bg-gray-200 border-t-0 border-r-0">
                                Jumlah
                            </td>
                            <td
                                class="font-black text-black text-center border border-slate-300 bg-gray-200 border-t-0 border-l-0">

                            </td>

                            @foreach ($sum['laki_laki'] as $sum_a => $val)
                                <td class="border border-slate-300 bg-gray-200 font-black text-black text-center">
                                    @php
                                        print_r(number_format($val));
                                    @endphp
                                <td class="border border-slate-300 bg-gray-200 font-black text-black text-center">
                                    @php
                                        print_r(number_format($sum['perempuan'][$sum_a]));
                                    @endphp
                                </td>
                                <td class="border border-slate-300 bg-gray-200 font-black text-black text-center">
                                    @php
                                        print_r(number_format($sum['jumlah_penduduk'][$sum_a]));
                                    @endphp
                                </td>
                            @endforeach
                        </tr>
                    </tfoot>
                @elseif (request()->get('select_datas') == 'SP')
                    @php
                        $result_l = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['status_perkawinan'] as $offset => $value) {
                                if (isset($result_l[$offset])) {
                                    $result_l[$offset][$key] = $value['jumlah_status_laki_laki'];
                                } else {
                                    $result_l[$offset] = [$key => $value['jumlah_status_laki_laki']];
                                }
                            }
                        }
                        $sum = [];

                        foreach ($result_l as $key => $value) {
                            $sum['laki_laki'][$key] = array_sum($value);
                        }

                        $result_p = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['status_perkawinan'] as $offset => $value) {
                                if (isset($result_p[$offset])) {
                                    $result_p[$offset][$key] = $value['jumlah_status_perempuan'];
                                } else {
                                    $result_p[$offset] = [$key => $value['jumlah_status_perempuan']];
                                }
                            }
                        }

                        foreach ($result_p as $key => $value) {
                            $sum['perempuan'][$key] = array_sum($value);
                        }

                    @endphp
                    <tfoot>
                        <tr>
                            <td colspan="2"
                                class="font-black text-black text-md text-center border border-slate-300 bg-green-300 border-top-1">
                                Jumlah
                            </td>

                            @foreach ($sum['laki_laki'] as $sum_a => $val)
                                <td class="border border-slate-300 bg-green-300 text-black font-black">
                                    @php
                                        print_r(number_format($val));
                                    @endphp
                                </td>
                                <td class="border border-slate-300 bg-green-300 text-black font-black">
                                    @php
                                        print_r(number_format($sum['perempuan'][$sum_a]));
                                    @endphp
                                </td>
                            @endforeach
                        </tr>
                    </tfoot>
                @elseif (request()->get('select_datas') == 'Agama')
                    @php
                        $result_l = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['Agama'] as $offset => $value) {
                                if (isset($result_l[$offset])) {
                                    $result_l[$offset][$key] = $value['jumlah_agama_laki_laki'];
                                } else {
                                    $result_l[$offset] = [$key => $value['jumlah_agama_laki_laki']];
                                }
                            }
                        }
                        $sum = [];

                        foreach ($result_l as $key => $value) {
                            $sum['laki_laki'][$key] = array_sum($value);
                        }

                        $result_p = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['Agama'] as $offset => $value) {
                                if (isset($result_p[$offset])) {
                                    $result_p[$offset][$key] = $value['jumlah_agama_perempuan'];
                                } else {
                                    $result_p[$offset] = [$key => $value['jumlah_agama_perempuan']];
                                }
                            }
                        }

                        foreach ($result_p as $key => $value) {
                            $sum['perempuan'][$key] = array_sum($value);
                        }

                    @endphp
                    <tfoot>


                        <tr>
                            <td colspan="1"
                                class="font-black text-black text-center border border-slate-300 bg-gray-200 border-t-0 border-r-0">
                                Jumlah
                            </td>
                            <td
                                class="font-black text-black text-center border border-slate-300 bg-gray-200 border-t-0 border-l-0">

                            </td>

                            @foreach ($sum['laki_laki'] as $sum_a => $val)
                                <td class="border border-slate-300 bg-green-300 text-black font-black">
                                    @php
                                        print_r(number_format($val));
                                    @endphp
                                <td class="border border-slate-300 bg-green-300 text-black font-black">
                                    @php
                                        print_r(number_format($sum['perempuan'][$sum_a]));
                                    @endphp
                                </td>
                                </td>
                            @endforeach
                        </tr>
                    </tfoot>
                @else
                    @php
                        $result_l = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['penduduk'] as $offset => $value) {
                                if (isset($result_l[$offset])) {
                                    $result_l[$offset][$key] = $value['jumlah_penduduk_laki_laki'];
                                } else {
                                    $result_l[$offset] = [$key => $value['jumlah_penduduk_laki_laki']];
                                }
                            }
                        }
                        $sum = [];

                        foreach ($result_l as $key => $value) {
                            $sum['laki_laki'][$key] = array_sum($value);
                        }

                        $result_p = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['penduduk'] as $offset => $value) {
                                if (isset($result_p[$offset])) {
                                    $result_p[$offset][$key] = $value['jumlah_penduduk_perempuan'];
                                } else {
                                    $result_p[$offset] = [$key => $value['jumlah_penduduk_perempuan']];
                                }
                            }
                        }

                        foreach ($result_p as $key => $value) {
                            $sum['perempuan'][$key] = array_sum($value);
                        }

                        $result_j = [];

                        foreach ($datas as $key => $data) {
                            foreach ($data['penduduk'] as $offset => $value) {
                                if (isset($result_j[$offset])) {
                                    $result_j[$offset][$key] = $value['jumlah_penduduk'];
                                } else {
                                    $result_j[$offset] = [$key => $value['jumlah_penduduk']];
                                }
                            }
                        }

                        foreach ($result_j as $key => $value) {
                            $sum['jumlah_penduduk'][$key] = array_sum($value);
                        }

                    @endphp
                    <tfoot>


                        <tr>
                            <td colspan="1"
                                class="font-black colp1 text-black text-center border border-slate-300 bg-gray-200 border-t-0 border-r-0">
                                Jumlah
                            </td>
                            <td
                                class="font-black colp2 text-black text-center border border-slate-300 bg-gray-200 border-t-0 border-l-0">

                            </td>




                            @foreach ($sum['laki_laki'] as $sum_a => $val)
                                <td class="border border-slate-300 bg-gray-200 font-black text-black text-center">
                                    @php
                                        print_r(number_format($val));
                                    @endphp
                                </td>
                                <td class="border border-slate-300 bg-gray-200 font-black text-black text-center">
                                    @php
                                        print_r(number_format($sum['perempuan'][$sum_a]));
                                    @endphp
                                </td>
                                <td class="border border-slate-300 bg-gray-200 font-black text-black text-center">
                                    @php
                                        print_r(number_format($sum['jumlah_penduduk'][$sum_a]));
                                    @endphp
                                </td>
                                <td class="border border-slate-300 bg-gray-200"></td>
                            @endforeach
                        </tr>
                    </tfoot>
                @endif
            </table>

        </div>
    </div>


@endsection

@push('addon-script')
    <script>
        document.getElementById('select_datas').addEventListener("change", function() {
            document.getElementById('myForm').submit();
        });
    </script>
@endpush

@push('addon-style')
    <style>
        table.dataTable tfoot th,
        table.dataTable tfoot td,
        thead {
            border: 1px solid #cbd5e1;
        }

        table.dataTable thead .sorting_desc {
            background-image: none;
        }

        table.dataTable>tfoot>tr>th,
        table.dataTable>tfoot>tr>td,
        table.dataTable>tbody>tr>td,
        table.dataTable>tbody>tr,
        table.dataTable>thead>th {
            border: 1px solid #cbd5e1;
        }

        .colp2 {
            border-left: 0px;
        }

        .colp1 {
            border-right: 0px;
        }
    </style>
@endpush
