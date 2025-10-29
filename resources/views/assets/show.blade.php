<x-app-layout>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .qr-glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }
    </style>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8 animate-fade-in">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl shadow-xl p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-extrabold text-white mb-2">Detail Aset</h1>
                            <p class="text-blue-100">Informasi lengkap tentang aset</p>
                        </div>
                        <a href="@auth {{ route('assets.index') }} @else {{ route('public-assets') }} @endauth" class="group inline-flex items-center gap-2 px-6 py-3 bg-white text-blue-600 font-bold rounded-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column - Asset Info -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Main Info Card -->
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fade-in" style="animation-delay: 0.1s;">
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6">
                            <h2 class="text-2xl font-bold text-white flex items-center">
                                <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                Informasi Aset
                            </h2>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border-2 border-blue-100">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                        </svg>
                                        <span class="text-sm font-semibold text-gray-600">Ident Code</span>
                                    </div>
                                    <p class="text-xl font-bold text-gray-900">{{ $locationAsset->ident_code }}</p>
                                </div>

                                <div class="p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl border-2 border-purple-100">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 mr-2 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                                        </svg>
                                        <span class="text-sm font-semibold text-gray-600">Kategori</span>
                                    </div>
                                    <p class="text-xl font-bold text-gray-900">{{ $locationAsset->asset->category->name }}</p>
                                </div>

                                <div class="p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border-2 border-green-100">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                        </svg>
                                        <span class="text-sm font-semibold text-gray-600">Stok Tersedia</span>
                                    </div>
                                    @php
                                        $usedStock = \App\Models\AssetTransaction::where('ident_code', $locationAsset->ident_code)
                                                    ->where('kode_lokasi', $locationAsset->kode_lokasi)
                                                    ->where('status', '!=', 'Sudah Dikembalikan')
                                                    ->sum('jumlah');
                                        $availableStock = $locationAsset->stok - $usedStock;
                                    @endphp
                                    <p class="text-xl font-bold {{ $availableStock > 10 ? 'text-green-600' : ($availableStock > 0 ? 'text-yellow-600' : 'text-red-600') }}">
                                        {{ $availableStock }} Unit
                                    </p>
                                </div>

                                <div class="p-4 bg-gradient-to-r from-orange-50 to-amber-50 rounded-xl border-2 border-orange-100">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="text-sm font-semibold text-gray-600">Petugas Terakhir</span>
                                    </div>
                                    <p class="text-lg font-bold text-gray-900">{{ $locationAsset->petugas ?? 'Belum ada update' }}</p>
                                </div>
                            </div>

                            <div class="p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border-2 border-blue-100">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    <span class="text-sm font-semibold text-gray-600">Nama Aset</span>
                                </div>
                                <p class="text-2xl font-bold text-gray-900">{{ $locationAsset->asset->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Location Card -->
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fade-in" style="animation-delay: 0.2s;">
                        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6">
                            <h2 class="text-2xl font-bold text-white flex items-center">
                                <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Informasi Lokasi
                            </h2>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="p-4 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl border-2 border-indigo-100">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    <span class="text-sm font-semibold text-gray-600">Nama Lokasi</span>
                                </div>
                                <p class="text-xl font-bold text-gray-900">{{ $locationAsset->location->name }}</p>
                            </div>

                            <div class="p-4 bg-gray-50 rounded-xl border-2 border-gray-200">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <span class="text-sm font-semibold text-gray-600">Detail Lokasi</span>
                                </div>
                                <p class="text-base text-gray-900">{{ $locationAsset->location->detail_lokasi }}</p>
                            </div>

                            @if($locationAsset->location->koordinat_x && $locationAsset->location->koordinat_y)
                                <a href="https://www.google.com/maps/search/?api=1&query={{ $locationAsset->location->koordinat_x }},{{ $locationAsset->location->koordinat_y }}" 
                                   target="_blank" 
                                   class="group inline-flex items-center gap-2 w-full justify-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold rounded-xl hover:shadow-xl hover:scale-105 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Navigasi ke Lokasi
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Description Card -->
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fade-in" style="animation-delay: 0.3s;">
                        <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-6">
                            <h2 class="text-2xl font-bold text-white flex items-center">
                                <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                                </svg>
                                Deskripsi
                            </h2>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-700 text-base leading-relaxed">{{ $locationAsset->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column - QR Code -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fade-in sticky top-8" style="animation-delay: 0.4s;">
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6">
                            <h2 class="text-2xl font-bold text-white text-center flex items-center justify-center">
                                <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                                </svg>
                                QR Code
                            </h2>
                        </div>
                        <div class="p-6 flex flex-col items-center space-y-6">
                            <div class="bg-white p-4 rounded-2xl qr-glow">
                                {!! QrCode::size(250)->generate($assetUrl) !!}
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-semibold text-gray-600 mb-1">Scan untuk melihat detail aset</p>
                                <p class="text-xl font-bold text-blue-800">{{ $locationAsset->ident_code }}</p>
                            </div>
                            @auth
                                <a href="{{ route('assets.print-qr', $locationAsset->id) }}" target="_blank" class="group inline-flex items-center gap-2 w-full justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl hover:shadow-xl hover:scale-105 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                                    </svg>
                                    Print QR Code
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
