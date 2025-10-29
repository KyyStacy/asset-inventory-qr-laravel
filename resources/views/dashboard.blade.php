<x-app-layout>
    @php
        $totalAssets = \App\Models\LocationAsset::sum('stok');
        $borrowedAssets = \App\Models\AssetTransaction::where('status', 'Belum Dikembalikan')->sum('jumlah');
        $availableAssets = $totalAssets - $borrowedAssets;
        $twelveHoursAgo = \Carbon\Carbon::now()->subHours(12);
        $transactions = \App\Models\AssetTransaction::with(['asset', 'location'])
            ->where('created_at', '>=', $twelveHoursAgo)
            ->orderBy('created_at', 'desc')
            ->get();
        $totalLocations = \App\Models\Location::count();
        $totalCategories = \App\Models\AssetCategory::count();
    @endphp
    
    <style>
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-slideUp {
            animation: slideUp 0.5s ease-out;
        }
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out;
        }
        .stat-card {
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8 animate-slideUp">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-extrabold mb-2">
                            <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Dashboard</span>
                        </h1>
                        <p class="text-gray-600">Selamat datang kembali, {{ Auth::user()->name }}! 👋</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">{{ now()->isoFormat('dddd, D MMMM YYYY') }}</p>
                        <p class="text-lg font-semibold text-gray-700">{{ now()->format('H:i') }} WIB</p>
                    </div>
                </div>
            </div>
            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Aset -->
                <div class="stat-card bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg overflow-hidden animate-slideUp" style="animation-delay: 0.1s;">
                    <div class="p-6 text-white">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                        </div>
                        <h2 class="text-sm font-medium opacity-90 mb-1">Total Aset</h2>
                        <p class="text-4xl font-bold mb-1">{{ number_format($totalAssets) }}</p>
                        <p class="text-xs opacity-75">Unit aset terdaftar</p>
                    </div>
                    <div class="h-2 bg-gradient-to-r from-blue-400 to-blue-300"></div>
                </div>

                <!-- Aset Sedang Digunakan -->
                <div class="stat-card bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl shadow-lg overflow-hidden animate-slideUp" style="animation-delay: 0.2s;">
                    <div class="p-6 text-white">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <h2 class="text-sm font-medium opacity-90 mb-1">Sedang Digunakan</h2>
                        <p class="text-4xl font-bold mb-1">{{ number_format($borrowedAssets) }}</p>
                        <p class="text-xs opacity-75">Unit dipinjam</p>
                    </div>
                    <div class="h-2 bg-gradient-to-r from-amber-400 to-orange-300"></div>
                </div>

                <!-- Aset Tersedia -->
                <div class="stat-card bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-lg overflow-hidden animate-slideUp" style="animation-delay: 0.3s;">
                    <div class="p-6 text-white">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <h2 class="text-sm font-medium opacity-90 mb-1">Aset Tersedia</h2>
                        <p class="text-4xl font-bold mb-1">{{ number_format($availableAssets) }}</p>
                        <p class="text-xs opacity-75">Unit siap digunakan</p>
                    </div>
                    <div class="h-2 bg-gradient-to-r from-green-400 to-emerald-300"></div>
                </div>

                <!-- Total Lokasi -->
                <div class="stat-card bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl shadow-lg overflow-hidden animate-slideUp" style="animation-delay: 0.4s;">
                    <div class="p-6 text-white">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                        </div>
                        <h2 class="text-sm font-medium opacity-90 mb-1">Total Lokasi</h2>
                        <p class="text-4xl font-bold mb-1">{{ number_format($totalLocations) }}</p>
                        <p class="text-xs opacity-75">Area penyimpanan</p>
                    </div>
                    <div class="h-2 bg-gradient-to-r from-purple-400 to-indigo-300"></div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Utilization Rate -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 animate-slideUp" style="animation-delay: 0.5s;">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-gray-700">Tingkat Penggunaan</h3>
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    @php
                        $utilizationRate = $totalAssets > 0 ? ($borrowedAssets / $totalAssets) * 100 : 0;
                    @endphp
                    <div class="mb-2">
                        <div class="flex justify-between items-end mb-1">
                            <span class="text-3xl font-bold text-gray-800">{{ number_format($utilizationRate, 1) }}%</span>
                            <span class="text-sm text-gray-500">dari total</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-3 rounded-full transition-all duration-500" style="width: {{ $utilizationRate }}%"></div>
                        </div>
                    </div>
                </div>

                <!-- Total Kategori -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 animate-slideUp" style="animation-delay: 0.6s;">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-gray-700">Total Kategori</h3>
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <div class="flex items-end justify-between">
                        <span class="text-3xl font-bold text-gray-800">{{ number_format($totalCategories) }}</span>
                        <span class="text-sm text-gray-500">Jenis aset</span>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 animate-slideUp" style="animation-delay: 0.7s;">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-gray-700">Aktivitas Hari Ini</h3>
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div class="flex items-end justify-between">
                        <span class="text-3xl font-bold text-gray-800">{{ $transactions->count() }}</span>
                        <span class="text-sm text-gray-500">Transaksi</span>
                    </div>
                </div>
            </div>

            <!-- Activity Table -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 animate-fadeIn">
                <div class="p-6 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-1">Aktivitas Aset Terbaru</h2>
                            <p class="text-sm text-gray-600">12 jam terakhir</p>
                        </div>
                        <div class="flex gap-2">
                            <div class="relative">
                                <input type="text" placeholder="Cari transaksi..." class="pl-10 pr-4 py-2.5 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <button class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all duration-300">
                                Filter
                            </button>
                        </div>
                    </div>
                </div>
                
                    <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-gray-50 to-gray-100">
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Kode</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Nama Aset</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Petugas</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Pengaju</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Divisi</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Jumlah</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($transactions as $transaction)
                                <tr class="hover:bg-blue-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800">
                                            {{ $transaction->ident_code }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">{{ $transaction->asset->name ?? 'N/A' }}</p>
                                                <p class="text-xs text-gray-500">{{ $transaction->location->name ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-2">
                                                <span class="text-white text-xs font-bold">{{ substr($transaction->petugas, 0, 1) }}</span>
                                            </div>
                                            <span class="text-sm font-medium text-gray-900">{{ $transaction->petugas }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $transaction->pengaju }}</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">
                                            {{ $transaction->divisi }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center text-sm font-bold text-gray-900">
                                            {{ $transaction->jumlah }} Unit
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($transaction->status === 'Belum Dikembalikan')
                                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-amber-100 text-amber-800 border border-amber-200">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                </svg>
                                                Dipinjam
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-green-100 text-green-800 border border-green-200">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                Dikembalikan
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                            </svg>
                                            <p class="text-gray-500 text-lg font-semibold mb-2">Belum Ada Aktivitas</p>
                                            <p class="text-gray-400">Tidak ada transaksi dalam 12 jam terakhir</p>
                                        </div>
                                        </td>
                                    </tr>
                            @endforelse
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>