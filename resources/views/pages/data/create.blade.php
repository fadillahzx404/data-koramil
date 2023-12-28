@extends('layouts.app')
@section('title')
    Input Data
@endsection
@section('page-content')
    <div class="data-error" data-error="{!! \Session::get('error') !!}"></div>
    <div class="container px-12 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">
        <section class="user-created card card-compact bg-white shadow-xl rounded-md">
            <div class="card-body">

                <div class="grid title gap-2">
                    <p class="text-lg font-medium">Tambah Data</p>
                    <hr class="mb-3 border-gray-300" />
                </div>
                <form action="{{ route('datas.store') }}" method="POST" class="grid gap-3" enctype="multipart/form-data">
                    @csrf


                    <div class="flex justify-around  items-center mb-3">


                        <div class="month">
                            <div class="label font-medium">
                                <span class="label-text">Bulan</span>

                            </div>

                            <div class="join join-horizontal">
                                <input class="join-item btn w-full " type="radio" name="month"
                                    aria-label="Janurari - Juni" checked value="Janurari-Juni" />
                                <input class="join-item btn w-full" type="radio" name="month"
                                    aria-label="Juli - Desember" value="Juli-Desember" />

                            </div>
                        </div>
                        <div class="year">
                            <div class="label font-medium">
                                <span class="label-text">Tahun</span>

                            </div>

                            <div class="relative max-w-sm">

                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>

                                <input id="datepickerId" type="text" name="year"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date" required>


                            </div>
                        </div>


                    </div>
                    <div class="kelurahaan">
                        <label class="form-control w-full ">
                            <div class="label">
                                <span class="label-text">Pilih Kelurahaan</span>

                            </div>
                            <select class="select select-bordered" name="kelurahaan_id">
                                @foreach ($kelurahaan as $kel)
                                    <option value="{{ $kel->id }}">{{ $kel->nama_kelurahaan }}</option>
                                @endforeach

                            </select>

                        </label>
                    </div>
                    <div class="jumlah-penduduk mt-3">
                        <p class="text-lg font-bold">Jumlah Penduduk</p>
                        <div class="grid grid-cols-2 gap-4">


                            <label class="form-control w-full ">
                                <div class="label">
                                    <span class="label-text">Laki Laki</span>
                                </div>
                                <input type="number" class="input input-bordered w-full " name="penduduk_laki_laki"required />
                            </label>

                            <label class="form-control w-full ">
                                <div class="label">
                                    <span class="label-text">Perempuan</span>
                                </div>
                                <input type="number" class="input input-bordered w-full " name="penduduk_perempuan" required />
                            </label>

                        </div>
                    </div>

                    <div class="jumlah-wajib-ktp mt-3">
                        <p class="text-lg font-bold">Jumlah Wajib KTP </p>
                        <div class="grid grid-cols-2 gap-4">


                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text">Laki Laki</span>
                                </div>
                                <input type="number" class="input input-bordered w-full"
                                    name="wajib_ktp_laki_laki"required />
                            </label>

                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text">Perempuan</span>
                                </div>
                                <input type="number" class="input input-bordered w-full" name="wajib_ktp_perempuan"
                                    required />
                            </label>

                        </div>
                    </div>

                    <div class="jumlah-kk mt-3">
                        <p class="text-lg font-bold">Jumlah KK </p>
                        <div class="grid grid-cols-2 gap-4">


                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text">Laki Laki</span>
                                </div>
                                <input type="number" class="input input-bordered w-full" name="kk_laki_laki"required />
                            </label>

                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text">Perempuan</span>
                                </div>
                                <input type="number" class="input input-bordered w-full" name="kk_perempuan" required />
                            </label>

                        </div>
                    </div>

                    <div class="status-perkawinan mt-3 mb-8">
                        <p class="text-lg font-bold">Status Perkawinan</p>
                        <?php $stat_kawin = ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']; ?>
                        @foreach ($stat_kawin as $skw)
                            <div class="grid grid-cols-3 gap-4">


                                <label class="form-control w-full ">
                                    <div class="label">
                                        <span class="label-text">Status kawin</span>

                                    </div>

                                    <input type="text" class="input input-bordered w-full" name="status_perkawinan[]"
                                        value="{{ $skw }}" readonly />
                                </label>

                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Laki Laki</span>
                                    </div>
                                    <input type="number" class="input input-bordered w-full"
                                        name="jumlah_status_laki_laki[]"required />
                                </label>

                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Perempuan</span>
                                    </div>
                                    <input type="number" class="input input-bordered w-full"
                                        name="jumlah_status_perempuan[]" required />
                                </label>

                            </div>
                        @endforeach

                    </div>
                    <div class="agama mt-3 mb-8">
                        <p class="text-lg font-bold">Agama</p>

                        <?php $agama = ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Budha', 'Konghuchu', 'Lainya']; ?>

                        @foreach ($agama as $agm)
                            <div class="grid grid-cols-3 gap-4">


                                <label class="form-control w-full ">
                                    <div class="label">
                                        <span class="label-text">Agama</span>

                                    </div>

                                    <input type="text" class="input input-bordered w-full" name="agama[]"
                                        value="{{ $agm }}" readonly />
                                </label>

                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Laki Laki</span>
                                    </div>
                                    <input type="number" class="input input-bordered w-full"
                                        name="jumlah_agama_laki_laki[]"required />
                                </label>

                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Perempuan</span>
                                    </div>
                                    <input type="number" class="input input-bordered w-full"
                                        name="jumlah_agama_perempuan[]" required />
                                </label>

                            </div>
                        @endforeach


                    </div>

                    <label class="form-control mx-12">
                        <div class="label">
                            <span class="label-text">Keterangan</span>

                        </div>
                        <textarea class="textarea textarea-bordered h-24" placeholder="Keterangan" name="keterangan"></textarea>

                    </label>




                    <div class="flex flex-row gap-2 mt-10 justify-end">
                        <a href="{{ route('datas.index') }}"
                            class="btn btn-sm btn-error transition duration-300 hover:scale-90">Cancel</a>
                        <button class="btn btn-sm px-5 btn-success text-white transition duration-300 hover:scale-90"
                            type="submit">Save</button>
                    </div>

                </form>
            </div>
        </section>


    </div>
@endsection

@push('addon-style')
    <style>
        [type='radio']:checked {
            background-image: none;
        }
    </style>
@endpush
