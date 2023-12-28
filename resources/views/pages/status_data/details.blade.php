@extends('layouts.app')
@section('title')
    Data Details
@endsection
@section('page-content')
    <div class="data-flash" data-flash="{!! \Session::get('Success') !!}">
    </div>
    <div class="container px-12 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <div class="relative overflow-x-auto shadow-lg borde bg-white border-gray-200 sm:rounded-lg p-5">
            <div class="title-table grid">
                <form action="{{ route('status-edit-admin') }}" method="POST">
                    @csrf

                    <div class="flex justify-between place-content-center">
                        <div class="grid ">
                            <p class="text-lg ">Data Tahun <span class="font-bold">{{ $year }}</span> Bulan
                                @php
                                    if ($month == 'GET') {
                                        $month = request()->get('month');
                                    }
                                @endphp
                                <span class="font-bold">{{ $month }}</span>
                            </p>
                            <p class="text-sm font-light text-gray-400">Data berdasarkan bulan dan tahun
                            </p>

                            <div class="flex p-2 place-items-center">

                                <p>Status saat ini: </p>
                                @if (Auth::user()->roles == 'ADMIN KORAMIL' ?? 'MASTER ADMIN')
                                    <div class="join w-full">
                                        <input class="join-item btn checked:bg-primary w-10/12 " type="radio"
                                            name="statusAdmin" value="Input"
                                            @if ($status == 'Input') checked @endif aria-label="Input" />
                                        <input class="join-item btn checked:bg-warning w-11/12" type="radio"
                                            name="statusAdmin" value="Oncheck"
                                            @if ($status == 'Oncheck') checked @endif aria-label="Siap DI Check" />

                                    </div>
                                    <input type="hidden" name="year" value="{{ $year }}" />
                                    <input type="hidden" name="month" value="{{ $month }}" />
                                @else
                                    <div class="badge badge-primary ml-2">{{ $status }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('status.index') }}"
                                class="btn btn-sm btn-warning transition duration-300 hover:scale-90">Kembali</a>
                            @if (Auth::user()->roles !== 'KEPALA KORAMIL')
                                <button type="submit"
                                    class="btn btn-sm btn-success transition duration-300 hover:scale-90">Simpan</button>
                            @endif
                </form>
            </div>
        </div>

        <hr class="mb-3 mt-2 border-gray-400" />






        @if ($status !== 'Input' && Auth::user()->roles == 'KEPALA KORAMIL')
            <form action="{{ route('status-edit-koramil') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 mb-10">
                    <div class="inpt self-center">
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Ubah Status Data</span>

                            </div>
                            <select id="stat" onchange="onstat(this)" name="statusKoramil"
                                class="select select-bordered">

                                <option value="ACC">ACC</option>
                                <option value="Tidak ACC">Tidak ACC</option>
                            </select>

                        </label>
                        <input type="hidden" name="year" value="{{ $year }}" />
                        <input type="hidden" name="month" value="{{ $month }}" />
                    </div>


                    <div class="grid">
                        <div class="action text-end">
                            <button class="btn btn-sm btn-success mb-3" type="submit">Simpan</button>
                        </div>
                        <label class="form-control" id="keterangan_kepala_kodim" style="display:none">
                            <div class="label">
                                <span class="label-text">Keterangan Kepala Koramil</span>
                                <div class="badge badge-error">Tidak ACC</div>
                            </div>
                            <textarea class="textarea textarea-bordered h-24 w-full" name="keterangan_kepala_koramil"
                                placeholder="Masukan keterangan kenapa tidak di ACC."></textarea>

                        </label>

                    </div>
                </div>
            </form>
        @else
        @endif
        @if (Auth::user()->roles == 'ADMIN KORAMIL' && $status == 'Tidak ACC')
            <div class="grid pb-4">

                <label class="form-control  w-7/12 justify-self-end">
                    <div class="label">
                        <span class="label-text">Keterangan Kepala Koramil</span>
                        <div class="badge badge-error">Tidak ACC</div>
                    </div>
                    <?php
                    foreach ($datas as $ket => $keterangan) {
                        $kets = $keterangan['keterangan_kepala_koramil'];
                    } ?>
                    <textarea class="textarea textarea-bordered h-24" readonly>{{ $kets }}</textarea>

                </label>

            </div>
        @endif
        <form action="GET" id="myForm">
            <input type="hidden" name="year" value="{{ $year }}" />
            <input type="hidden" name="month" value="{{ $month }}" />
            <div class="flex w-full justify-end">
                <label class="form-control w-full max-w-xs mt-5 mb-5">
                    <div class="label">
                        <span class="label-text">Pilih data berdasarkan kategori</span>
                    </div>

                    <select class="select select-bordered" name="select_datas" id="select_datas">
                        <option value="Penduduk" {{ request()->get('select_datas') == 'Penduduk' ? 'selected' : '' }}>
                            Penduduk
                        </option>
                        <option value="Wajib_Ktp" {{ request()->get('select_datas') == 'Wajib_Ktp' ? 'selected' : '' }}>
                            Wajib
                            KTP</option>
                        <option value="KK" {{ request()->get('select_datas') == 'KK' ? 'selected' : '' }}>Kartu
                            Keluarga
                        </option>
                        <option value="SP" {{ request()->get('select_datas') == 'SP' ? 'selected' : '' }}>Status
                            Perkawinan
                        </option>
                        <option value="Agama" {{ request()->get('select_datas') == 'Agama' ? 'selected' : '' }}>Agama
                        </option>
                    </select>


                </label>


            </div>
        </form>




        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 datatable display border-separate"
            id="datatable">
            <thead class="text-xs text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">


                <tr>
                    <th scope="col" rowspan="2" class="w-10 p-4 text-center border border-slate-300">
                        No
                    </th>
                    <th scope="col" rowspan="2" class="p-4 text-center border border-slate-300">
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
                            <th rowspan="1" class="p-4  bg-red-700 text-black text-center border">L</th>
                            <th rowspan="1" class="p-4  bg-red-700 text-black text-center border">P</th>
                        @endforeach
                    </tr>
                @elseif (request()->get('select_datas') == 'Agama')
                    <tr>

                        @foreach ($datas[0]['agama'] as $agm => $val)
                            <th rowspan="1" class="p-4  bg-gray-300 text-black text-center border">L</th>
                            <th rowspan="1" class="p-4  bg-gray-300 text-black text-center border">P</th>
                        @endforeach
                    </tr>
                @endif




            </thead>
            <tbody class="">

                @foreach ($datas as $data)
                    <tr class="">
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
                            class="font-black text-black text-md text-center border border-slate-300 bg-gray-200 border-top-1">

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
                            <td class="border border-slate-300"></td>
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
                        <td colspan="2"
                            class="font-black text-black text-md text-center border border-slate-300 bg-gray-200 border-top-1">
                            Jumlah
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
                        <td colspan="2"
                            class="font-black text-black text-md text-center border border-slate-300 bg-gray-200 border-top-1">
                            Jumlah
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
                            <td class="border border-slate-300 bg-green-300 text-black font-black">
                                @php
                                    print_r(number_format($sum['perempuan'][$sum_a]));
                                @endphp
                            </td>
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
                        <td colspan="2"
                            class="font-black text-black text-md text-center border border-slate-300 bg-green-300 border-top-1">
                            Jumlah
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
                        <td colspan="2"
                            class="font-black text-black text-md text-center border border-slate-300 bg-gray-200 border-top-1">

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
                            <td class="border border-slate-300"></td>
                            </td>
                        @endforeach
                    </tr>
                </tfoot>
            @endif
        </table>

    </div>

    </div>
    </div>
@endsection

@push('addon-script')
    <script>
        let e = document.getElementById("stat").value;
        let v = document.getElementById("keterangan_kepala_kodim");

        function onstat(selectObject) {
            var value = selectObject.value;

            if (value == "Tidak ACC") {
                v.style.display = "block"
            } else {
                v.style.display = "none"
            }
        }
    </script>
    <script>
        document.getElementById('select_datas').addEventListener("change", function() {
            document.getElementById('myForm').submit();
        });
    </script>
@endpush

@push('addon-style')
    <style>
        [type='radio']:checked {
            background-image: none;
        }

        table.dataTable tfoot th,
        table.dataTable tfoot td {
            border-top: none
        }

        ;
    </style>
@endpush
