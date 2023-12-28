@extends('layouts.app')
@section('title')
    Status Data
@endsection
@section('page-content')
    <div class="data-flash" data-flash="{!! \Session::get('Success') !!}"></div>
    <div class="container px-12 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <div class="relative overflow-x-auto shadow-lg borde bg-white border-gray-200 sm:rounded-lg p-5">
            <div class="title-table grid">

                <div class="grid">
                    <p class="text-lg font-bold">Status Data</p>
                    <p class="text-sm font-light text-gray-400">Data on here, you can add new user, edit or
                        delete.
                    </p>
                </div>

                <hr class="mb-3 mt-2 border-gray-400" />

            </div>
            <div class="pb-4  ">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="searchInput"
                        class="block p-2 pl-10 text-sm text-gray-900 border  border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-gray-900    focus:border-gray-900     "
                        placeholder="Search for items">
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 datatable display" id="datatable">
                <thead class="text-xs text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="p-4 text-center">
                            Tahun
                        </th>
                        <th scope="col" class="p-4">

                        </th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($datas as $year => $value)
                        <tr class="border-2 ">

                            <td class="p-4 text-center">
                                {{ $year }}
                            </td>


                            <td class="p-4 ">
                                <table class="text-grey-700 w-full">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="p-4">Bulan</th>
                                            <th scope="col" class="p-4">Status</th>
                                            <th scope="col" class="p-4 text-end float-right">Action</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($value as $month => $val)
                                            <tr>
                                                <td class="p-4 w-5/12">
                                                    <div class="awal flex gap-2 bg-white">
                                                        <p class="self-center">{{ $month }}</p>

                                                    </div>

                                                </td>

                                                <?php
                                                foreach ($val as $stat => $sta) {
                                                    $st = $sta->status;
                                                }

                                                ?>
                                                <td class="p-4">
                                                    <div
                                                        class="badge @if ($st == 'Input') badge-primary @elseif($st == 'ACC') badge-success @elseif($st == 'Tidak ACC') badge-error @elseif($st == 'Oncheck') badge-warning @endif">
                                                        {{ $st }}
                                                    </div>
                                                </td>
                                                <td class="p-4 text-end">

                                                    <a href="{{ route('status-details', [$year, $month]) }}"
                                                        class="btn btn-sm inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 shadow-sm shadow-gray-400"><span><i
                                                                class="fa-solid fa-eye"></i> Lihat</a>

                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
