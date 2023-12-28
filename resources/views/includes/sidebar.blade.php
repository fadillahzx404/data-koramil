<ul class="min-h-full space-y-2">
    @if (AUTH::user()->roles == 'MASTER ADMIN')
        <li><a href="{{ route('dashboard') }}"
                class=" hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('dashboard*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-house"></i>Dashboard</a>
        </li>

        <li><a href="{{ route('kelurahaan.index') }}"
                class="hover:font-semibold hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('kelurahaan*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-tree-city"></i>Kelurahaan</a>
        </li>
        <li><a href="{{ route('datas.index') }}"
                class="hover:font-semibold hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('datas*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-file-signature"></i>Data</a>
        </li>
        <li><a href="{{ route('status.index') }}"
                class="hover:font-semibold hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('status*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-check-to-slot"></i>Status Data</a>
        </li>
        <li><a href="{{ route('report.index') }}"
                class="hover:font-semibold hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('report*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-file pr-1.5"></i>Laporan</a>
        </li>
        <li><a href="{{ route('users.index') }}"
                class="hover:font-semibold hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('users*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-users"></i>User</a>
        </li>
    @elseif (AUTH::user()->roles == 'KEPALA KORAMIL')
        <li><a href="{{ route('dashboard') }}"
                class=" hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('dashboard*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-house"></i>Dashboard</a>
        </li>



        <li><a href="{{ route('status.index') }}"
                class="hover:font-semibold hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('status*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-check-to-slot"></i>Data</a>
        </li>
        <li><a href="{{ route('report.index') }}"
                class="hover:font-semibold hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('report*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-file pr-1.5"></i>Laporan</a>
        </li>
    @elseif (AUTH::user()->roles == 'ADMIN KORAMIL')
        <li><a href="{{ route('dashboard') }}"
                class=" hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('dashboard*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-house"></i>Dashboard</a>
        </li>

        <li><a href="{{ route('kelurahaan.index') }}"
                class="hover:font-semibold hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('kelurahaan*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-tree-city"></i>Kelurahaan</a>
        </li>
        <li><a href="{{ route('datas.index') }}"
                class="hover:font-semibold hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('datas*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-file-signature"></i>Data</a>
        </li>
        <li><a href="{{ route('status.index') }}"
                class="hover:font-semibold hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('status*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-check-to-slot"></i>Status Data</a>
        </li>
    @elseif (AUTH::user()->roles == 'KODIM')
        <li><a href="{{ route('dashboard') }}"
                class=" hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('dashboard*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-house"></i>Dashboard</a>
        </li>

        <li><a href="{{ route('report.index') }}"
                class="hover:font-semibold hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('report*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-file pr-1.5"></i>Laporan</a>
        </li>
    @endif

</ul>
