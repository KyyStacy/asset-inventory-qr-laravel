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
    </style>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8 animate-fade-in">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl shadow-xl p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-extrabold text-white mb-2">Detail Transaksi Aset</h1>
                            <p class="text-blue-100">Informasi lengkap tentang transaksi</p>
                        </div>
                        <a href="{{ route('asset-transactions.index') }}" class="group inline-flex items-center gap-2 px-6 py-3 bg-white text-blue-600 font-bold rounded-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column - Informasi Transaksi -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fade-in" style="animation-delay: 0.1s;">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6">
                        <h2 class="text-2xl font-bold text-white flex items-center">
                            <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Informasi Transaksi
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border-2 border-blue-100">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                <span class="text-sm font-semibold text-gray-600">Ident Code</span>
                            </div>
                            <p class="text-xl font-bold text-gray-900">{{ $transaction->ident_code }}</p>
                        </div>

                        <div class="p-4 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl border-2 border-indigo-100">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-sm font-semibold text-gray-600">Lokasi</span>
                            </div>
                            <p class="text-xl font-bold text-gray-900">{{ $transaction->location->name }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 bg-purple-50 rounded-xl border-2 border-purple-100">
                                <div class="flex items-center mb-2">
                                    <svg class="w-4 h-4 mr-2 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                    </svg>
                                    <span class="text-xs font-semibold text-gray-600">Jumlah</span>
                                </div>
                                <p class="text-2xl font-bold text-purple-800">{{ $transaction->jumlah }}</p>
                            </div>

                            <div class="p-4 bg-gray-50 rounded-xl border-2 border-gray-100">
                                <div class="flex items-center mb-2">
                                    <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-xs font-semibold text-gray-600">Status</span>
                                </div>
                                @if($transaction->status === 'Belum Dikembalikan')
                                    <span class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-bold bg-yellow-100 text-yellow-800">
                                        {{ $transaction->status }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-bold bg-green-100 text-green-800">
                                        {{ $transaction->status }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="p-4 bg-blue-50 rounded-xl border-2 border-blue-100">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="text-sm font-semibold text-gray-600">Petugas</span>
                            </div>
                            <p class="text-lg font-bold text-gray-900">{{ $transaction->petugas }}</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Detail Tambahan -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fade-in" style="animation-delay: 0.2s;">
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6">
                        <h2 class="text-2xl font-bold text-white flex items-center">
                            <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Detail Tambahan
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="p-4 bg-gray-50 rounded-xl border-2 border-gray-200">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="text-sm font-semibold text-gray-600">Pengaju</span>
                            </div>
                            <p class="text-lg font-bold text-gray-900">{{ $transaction->pengaju }}</p>
                        </div>

                        <div class="p-4 bg-gray-50 rounded-xl border-2 border-gray-200">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span class="text-sm font-semibold text-gray-600">Divisi</span>
                            </div>
                            <p class="text-lg font-bold text-gray-900">{{ $transaction->divisi }}</p>
                        </div>

                        <div class="p-4 bg-gradient-to-r from-orange-50 to-amber-50 rounded-xl border-2 border-orange-100">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                <span class="text-sm font-semibold text-gray-600">Kondisi Keluar</span>
                            </div>
                            <p class="text-base text-gray-900">{{ $transaction->kondisi_keluar }}</p>
                        </div>

                        <div class="p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border-2 border-green-100">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18M13 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V4m10 16v-1a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                <span class="text-sm font-semibold text-gray-600">Kondisi Masuk</span>
                            </div>
                            <p class="text-base text-gray-900">{{ $transaction->kondisi_masuk ?? 'Belum dikembalikan' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex items-center justify-end gap-3 animate-fade-in" style="animation-delay: 0.3s;">
                <a href="{{ route('asset-transactions.edit', $transaction->id) }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl hover:shadow-xl hover:scale-105 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Transaksi
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
