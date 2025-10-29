<div class="w-64 h-full bg-gradient-to-b from-slate-900 to-slate-800 text-white shadow-2xl flex flex-col">
    <!-- Logo Section -->
    <div class="p-6 border-b border-slate-700">
        <div class="flex items-center space-x-3">
            <svg class="h-12 w-12" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="40" height="40" rx="8" fill="url(#gradient-sidebar)"/>
                <path d="M12 14h16M12 20h16M12 26h10" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                <defs>
                    <linearGradient id="gradient-sidebar" x1="0" y1="0" x2="40" y2="40">
                        <stop offset="0%" style="stop-color:#3B82F6"/>
                        <stop offset="100%" style="stop-color:#6366F1"/>
                    </linearGradient>
                </defs>
            </svg>
            <div>
                <div class="text-lg font-bold bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent">
                    Reed Code
                </div>
                <div class="text-xs text-slate-400">by Kyy Stacy</div>
            </div>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav class="mt-4 flex-grow px-3 space-y-1 overflow-y-auto">
        @php
            $routeName = Route::currentRouteName();
        @endphp
        
        <a href="{{ route('dashboard') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ $routeName === 'dashboard' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
            <svg class="mr-3 h-5 w-5 {{ $routeName === 'dashboard' ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span>Dashboard</span>
            @if($routeName === 'dashboard')
                <div class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></div>
            @endif
        </a>
        
        @role('admin')
            <a href="{{ route('user-management.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ $routeName === 'user-management.index' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
                <svg class="mr-3 h-5 w-5 {{ $routeName === 'user-management.index' ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <span>Pengguna</span>
                @if($routeName === 'user-management.index')
                    <div class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></div>
                @endif
            </a>
        @endrole
        
        <a href="{{ route('assets.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs(['assets.index', 'assets.create', 'assets.edit', 'assets.show']) ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
            <svg class="mr-3 h-5 w-5 {{ request()->routeIs(['assets.index', 'assets.create', 'assets.edit', 'assets.show']) ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
            <span>Aset</span>
            @if(request()->routeIs(['assets.index', 'assets.create', 'assets.edit', 'assets.show']))
                <div class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></div>
            @endif
        </a>
        
        <a href="{{ route('asset-categories.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs(['asset-categories.index', 'asset-categories.create', 'asset-categories.edit']) ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
            <svg class="mr-3 h-5 w-5 {{ request()->routeIs(['asset-categories.index', 'asset-categories.create', 'asset-categories.edit']) ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
            </svg>
            <span>Kategori</span>
            @if(request()->routeIs(['asset-categories.index', 'asset-categories.create', 'asset-categories.edit']))
                <div class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></div>
            @endif
        </a>
        
        <a href="{{ route('locations.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs(['locations.index', 'locations.create', 'locations.edit']) ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
            <svg class="mr-3 h-5 w-5 {{ request()->routeIs(['locations.index', 'locations.create', 'locations.edit']) ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span>Lokasi</span>
            @if(request()->routeIs(['locations.index', 'locations.create', 'locations.edit']))
                <div class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></div>
            @endif
        </a>
        
        <a href="{{ route('asset-transactions.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs(['asset-transactions.index', 'asset-transactions.create', 'asset-transactions.edit', 'asset-transactions.show']) ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
            <svg class="mr-3 h-5 w-5 {{ request()->routeIs(['asset-transactions.index', 'asset-transactions.create', 'asset-transactions.edit', 'asset-transactions.show']) ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
            </svg>
            <span>Transaksi</span>
            @if(request()->routeIs(['asset-transactions.index', 'asset-transactions.create', 'asset-transactions.edit', 'asset-transactions.show']))
                <div class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></div>
            @endif
        </a>
    </nav>
    
    <!-- User Profile Section -->
    <div class="mt-auto border-t border-slate-700">
        <div class="p-4">
            <div class="flex items-center space-x-3 mb-3">
                <div class="relative">
                    <img class="w-10 h-10 object-cover rounded-lg ring-2 ring-blue-500/30" src="{{ Auth::user()->foto_profil ? Storage::url(Auth::user()->foto_profil) : asset('images/default-photo.png') }}" alt="User Avatar">
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-slate-900 rounded-full"></div>
                </div>
                <div class="flex-grow min-w-0">
                    <p class="text-sm font-semibold text-white truncate">{{ ucwords(Auth::user()->name) }}</p>
                    <p class="text-xs text-slate-400 truncate">{{ ucwords(Auth::user()->role) }}</p>
                </div>
                <a href="{{ route('profile.edit') }}" class="text-slate-400 hover:text-blue-400 transition-colors">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </a>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-red-600 to-red-700 rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-200 shadow-lg hover:shadow-xl">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>