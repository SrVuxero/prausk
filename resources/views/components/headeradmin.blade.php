<header class="bg-gradient-to-r from-blue-800 to-blue-600 sticky top-0 z-50">
    <div class="container mx-auto lg:px-12 py-4 px-8 flex items-center justify-between">
        <div class="title-search flex items-center gap-4">
            <a href="{{ route('home') }}" class="header-title">
                @if (request()->routeIs('kantin.index') || request()->routeIs('kantin.addproduct'))
                    <h1 class="font-bold text-xl text-white">Kharaa Admin Kantin</h1>
                @elseif(request()->routeIs('bank') || request()->routeIs('topuprequest'))
                    <h1 class="font-bold text-xl text-white">Kharaa Admin Bank</h1>
                @endif
            </a>
        </div>
        <div class="flex">
            <div class="header-menu flex items-center gap-2 mx-4 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
                    class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                <p>{{ Auth::user()->name }}</p>
            </div>
        </div>

    </div>
</header>
