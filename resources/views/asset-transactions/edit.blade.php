<x-app-layout>
    <style>
        @keyframes slideRight {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-slide-right {
            animation: slideRight 0.5s ease-out forwards;
        }
    </style>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8 animate-slide-right">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl shadow-xl p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-extrabold text-white mb-2">Edit Transaksi Aset</h1>
                            <p class="text-blue-100">Perbarui informasi transaksi aset</p>
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

            <!-- Form Container -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-slide-right" style="animation-delay: 0.1s;">
                <form action="{{ route('asset-transactions.update', $transaction->id) }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Grid Layout -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Aset -->
                        <div>
                            <label for="ident_code" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                Aset
                            </label>
                            <select name="ident_code" 
                                    id="ident_code" 
                                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4" 
                                    required>
                                <option value="">Pilih Aset</option>
                                @foreach($assets as $asset)
                                    <option value="{{ $asset->ident_code }}" {{ $transaction->ident_code == $asset->ident_code ? 'selected' : '' }}>{{ $asset->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Lokasi -->
                        <div>
                            <label for="kode_lokasi" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Lokasi
                            </label>
                            <select name="kode_lokasi" 
                                    id="kode_lokasi" 
                                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4" 
                                    required>
                                <option value="">Pilih Lokasi</option>
                            </select>
                        </div>

                        <!-- Jumlah -->
                        <div>
                            <label for="jumlah" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                </svg>
                                Jumlah
                            </label>
                            <input type="number" 
                                   name="jumlah" 
                                   id="jumlah" 
                                   min="1"
                                   value="{{ $transaction->jumlah }}"
                                   class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4" 
                                   placeholder="Masukkan jumlah" 
                                   required>
                            @error('jumlah')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Pengaju -->
                        <div>
                            <label for="pengaju" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Nama Pengaju
                            </label>
                            <input type="text" 
                                   name="pengaju" 
                                   id="pengaju"
                                   value="{{ $transaction->pengaju }}"
                                   class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4" 
                                   placeholder="Masukkan nama pengaju" 
                                   required>
                        </div>

                        <!-- Divisi -->
                        <div>
                            <label for="divisi" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Divisi
                            </label>
                            <input type="text" 
                                   name="divisi" 
                                   id="divisi"
                                   value="{{ $transaction->divisi }}"
                                   class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4" 
                                   placeholder="Masukkan divisi" 
                                   required>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Status
                            </label>
                            <select name="status" 
                                    id="status" 
                                    class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4" 
                                    required>
                                <option value="Belum Dikembalikan" {{ $transaction->status == 'Belum Dikembalikan' ? 'selected' : '' }}>Belum Dikembalikan</option>
                                <option value="Sudah Dikembalikan" {{ $transaction->status == 'Sudah Dikembalikan' ? 'selected' : '' }}>Sudah Dikembalikan</option>
                            </select>
                        </div>

                        <!-- Kondisi Keluar -->
                        <div class="md:col-span-2">
                            <label for="kondisi_keluar" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Kondisi Keluar
                            </label>
                            <textarea name="kondisi_keluar" 
                                      id="kondisi_keluar" 
                                      rows="3"
                                      class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4 resize-none" 
                                      placeholder="Deskripsikan kondisi aset saat keluar..." 
                                      required>{{ $transaction->kondisi_keluar }}</textarea>
                        </div>

                        <!-- Kondisi Masuk -->
                        <div class="md:col-span-2">
                            <label for="kondisi_masuk" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18M13 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V4m10 16v-1a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Kondisi Masuk
                            </label>
                            <textarea name="kondisi_masuk" 
                                      id="kondisi_masuk" 
                                      rows="3"
                                      class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4 resize-none" 
                                      placeholder="Deskripsikan kondisi aset saat masuk (opsional)...">{{ $transaction->kondisi_masuk }}</textarea>
                        </div>
                    </div>

                    <!-- Info Box -->
                    <div class="p-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-xl">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <h4 class="font-bold text-blue-900 mb-1">Informasi</h4>
                                <p class="text-sm text-blue-800">
                                    Ubah status menjadi "Sudah Dikembalikan" jika aset telah dikembalikan. Isi kondisi masuk untuk mendokumentasikan kondisi aset saat dikembalikan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end gap-3 pt-6 border-t-2 border-gray-100">
                        <a href="{{ route('asset-transactions.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 hover:scale-105 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </a>
                        <button type="submit" class="group inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold rounded-xl hover:shadow-xl hover:scale-105 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Update Transaksi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const assetSelect = document.getElementById('ident_code');
            const locationSelect = document.getElementById('kode_lokasi');

            function loadLocations(ident_code) {
                locationSelect.innerHTML = '<option value="">Pilih Lokasi</option>';

                if (ident_code) {
                    fetch(`/asset-transactions/locations/${ident_code}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(location => {
                                const option = document.createElement('option');
                                option.value = location.kode_lokasi;
                                option.textContent = location.name;
                                locationSelect.appendChild(option);
                            });
                            // Set the selected location
                            locationSelect.value = "{{ $transaction->kode_lokasi }}";
                        });
                }
            }

            assetSelect.addEventListener('change', function() {
                loadLocations(this.value);
            });

            // Load locations for the initial asset
            loadLocations(assetSelect.value);
        });
    </script>
</x-app-layout>
