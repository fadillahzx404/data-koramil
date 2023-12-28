<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
    style="background: rgb(107,138,149);
background: radial-gradient(circle, rgba(107,138,149,1) 0%, rgba(148,187,233,1) 81%);">


    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg ">

        <div class="my-10 flex justify-center">
            {{ $logo }}
        </div>
        {{ $slot }}
    </div>

</div>
