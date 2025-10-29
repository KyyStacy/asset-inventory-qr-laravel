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

        .step-indicator {
            transition: all 0.3s ease;
        }

        .step-indicator.active {
            background: linear-gradient(to right, #3B82F6, #6366F1);
            color: white;
            transform: scale(1.1);
        }

        .step-indicator.completed {
            background: linear-gradient(to right, #10B981, #059669);
            color: white;
        }
    </style>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8 animate-slide-right">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl shadow-xl p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-extrabold text-white mb-2">Tambah Aset Baru</h1>
                            <p class="text-blue-100">Isi form berikut untuk menambahkan aset ke sistem</p>
                        </div>
                        <a href="{{ route('assets.index') }}" class="group inline-flex items-center gap-2 px-6 py-3 bg-white text-blue-600 font-bold rounded-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <!-- Step Indicator -->
            <div class="mb-8 animate-slide-right" style="animation-delay: 0.1s;">
                <div class="flex items-center justify-center">
                    <div id="step1Indicator" class="step-indicator active flex items-center justify-center w-12 h-12 rounded-full font-bold text-lg shadow-lg">
                        1
                    </div>
                    <div class="w-24 h-1 bg-gray-300 mx-2"></div>
                    <div id="step2Indicator" class="step-indicator flex items-center justify-center w-12 h-12 rounded-full bg-gray-200 font-bold text-lg text-gray-500 shadow-lg">
                        2
                    </div>
                </div>
                <div class="flex items-center justify-center mt-3">
                    <span id="step1Label" class="text-blue-600 font-semibold text-sm">Informasi Aset</span>
                    <span class="mx-12"></span>
                    <span id="step2Label" class="text-gray-400 font-semibold text-sm">Detail Lokasi</span>
                </div>
            </div>

            <!-- Form Container -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-slide-right" style="animation-delay: 0.2s;">
                <div class="p-8">
                    <form id="assetForm" action="{{ route('assets.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div id="step1">
                            <div class="mb-6">
                                <label for="ident_code" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    Ident Code
                                </label>
                                <select name="ident_code" id="ident_code" class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4" required>
                                    <option value="">Pilih atau tambah ident code baru</option>
                                    @foreach($existingAssets->sortBy('ident_code') as $asset)
                                        <option value="{{ $asset->ident_code }}">{{ $asset->ident_code }}</option>
                                    @endforeach
                                    <option value="new">+ Tambah ident code baru</option>
                                </select>
                                <input type="text" id="new_ident_code" name="new_ident_code" class="mt-3 w-full rounded-xl border-2 border-blue-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4 hidden" placeholder="Masukkan ident code baru">
                                <p id="ident_code_error" class="mt-2 text-sm text-red-600 font-semibold hidden">
                                    <svg class="w-4 h-4 mr-1 inline-block" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span id="ident_code_error_text"></span>
                                </p>
                            </div>
                            <div id="assetDetails" class="hidden space-y-6">
                                <div class="mb-6">
                                    <label for="name" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                        Nama Aset
                                    </label>
                                    <input type="text" name="name" id="name" class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4" placeholder="Masukkan nama aset" required>
                                </div>
                                <div class="mb-6">
                                    <label for="asset_category_id" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                                        </svg>
                                        Kategori Aset
                                    </label>
                                    <select name="asset_category_id" id="asset_category_id" class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4" required>
                                        <option value="">Pilih kategori</option>
                                        @foreach($categories->sortBy('name') as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex justify-end mt-8">
                                <button type="button" id="nextBtn" class="group inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl hover:shadow-xl hover:scale-105 transition-all duration-300">
                                    Lanjut
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div id="step2" class="hidden">
                            <div class="mb-6">
                                <label for="kode_lokasi" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Lokasi
                                </label>
                                <select name="kode_lokasi" id="kode_lokasi" class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4" required>
                                    <option value="">Pilih lokasi</option>
                                    @foreach($locations->sortBy('name') as $location)
                                        <option value="{{ $location->kode_lokasi }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                                <p id="kode_lokasi_error" class="mt-2 text-sm text-red-600 font-semibold hidden">
                                    <svg class="w-4 h-4 mr-1 inline-block" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Harap pilih lokasi.
                                </p>
                            </div>

                            <div id="locationDetails" class="mb-6 p-6 bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-xl hidden">
                                <!-- Detail lokasi akan ditampilkan di sini -->
                            </div>

                            <div class="mb-6">
                                <label for="stok" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                    </svg>
                                    Stok
                                </label>
                                <input type="number" name="stok" id="stok" class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4" placeholder="Masukkan jumlah stok" min="0" required>
                            </div>

                            <div class="mb-6">
                                <label for="deskripsi" class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                                    </svg>
                                    Deskripsi
                                </label>
                                <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 py-3 px-4 resize-none" placeholder="Masukkan deskripsi aset" required></textarea>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button type="button" id="prevBtn" class="group inline-flex items-center gap-2 px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 hover:scale-105 transition-all duration-300">
                                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                                    </svg>
                                    Kembali
                                </button>
                                <button type="submit" id="submitBtn" class="group inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold rounded-xl hover:shadow-xl hover:scale-105 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Simpan Aset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');
            const step1Indicator = document.getElementById('step1Indicator');
            const step2Indicator = document.getElementById('step2Indicator');
            const step1Label = document.getElementById('step1Label');
            const step2Label = document.getElementById('step2Label');
            const nextBtn = document.getElementById('nextBtn');
            const prevBtn = document.getElementById('prevBtn');
            const submitBtn = document.getElementById('submitBtn');
            const identCodeSelect = document.getElementById('ident_code');
            const newIdentCodeInput = document.getElementById('new_ident_code');
            const assetDetails = document.getElementById('assetDetails');
            const nameInput = document.getElementById('name');
            const categorySelect = document.getElementById('asset_category_id');
            const kodeLokasiSelect = document.getElementById('kode_lokasi');
            const identCodeError = document.getElementById('ident_code_error');
            const identCodeErrorText = document.getElementById('ident_code_error_text');
            const kodeLokasiError = document.getElementById('kode_lokasi_error');

            // Inisialisasi Tom Select untuk dropdown dengan scrollbar
            const dropdownConfig = {
                create: false,
                sortField: { field: "text", direction: "asc" },
                maxOptions: null,
                maxItems: 1,
                plugins: ['dropdown_input'],
                dropdownParent: 'body',
                render: {
                    dropdown: function() {
                        return '<div class="ts-dropdown" style="max-height: 200px; overflow-y: auto;"></div>';
                    }
                }
            };

            const identCodeTomSelect = new TomSelect('#ident_code', dropdownConfig);
            const kodeLokasiTomSelect = new TomSelect('#kode_lokasi', dropdownConfig);

            identCodeSelect.addEventListener('change', function() {
                if (this.value === 'new') {
                    newIdentCodeInput.classList.remove('hidden');
                    newIdentCodeInput.required = true;
                    assetDetails.classList.remove('hidden');
                    nameInput.value = '';
                    nameInput.readOnly = false;
                    categorySelect.value = '';
                    categorySelect.disabled = false;
                    identCodeError.classList.add('hidden');
                    resetLocationOptions();
                } else if (this.value) {
                    newIdentCodeInput.classList.add('hidden');
                    newIdentCodeInput.required = false;
                    assetDetails.classList.remove('hidden');
                    fetch(`/get-asset-details/${this.value}`)
                        .then(response => response.json())
                        .then(data => {
                            nameInput.value = data.name;
                            nameInput.readOnly = true;
                            categorySelect.value = data.asset_category_id;
                            categorySelect.disabled = true;
                            updateLocationOptions(this.value);
                        });
                } else {
                    newIdentCodeInput.classList.add('hidden');
                    newIdentCodeInput.required = false;
                    assetDetails.classList.add('hidden');
                    resetLocationOptions();
                }
            });

            newIdentCodeInput.addEventListener('blur', function() {
                if (this.value) {
                    fetch(`/check-ident-code/${this.value}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.exists) {
                                identCodeErrorText.textContent = 'Ident Code ini sudah ada.';
                                identCodeError.classList.remove('hidden');
                            } else {
                                identCodeError.classList.add('hidden');
                            }
                        });
                }
            });

            function updateLocationOptions(identCode) {
                fetch(`/get-available-locations/${identCode}`)
                    .then(response => response.json())
                    .then(data => {
                        kodeLokasiTomSelect.clear();
                        kodeLokasiTomSelect.clearOptions();
                        kodeLokasiTomSelect.addOption({value: '', text: 'Pilih lokasi'});
                        data.forEach(location => {
                            kodeLokasiTomSelect.addOption({value: location.kode_lokasi, text: location.name});
                        });
                        kodeLokasiTomSelect.refreshOptions(false);
                    });
            }

            function resetLocationOptions() {
                kodeLokasiTomSelect.clear();
                kodeLokasiTomSelect.clearOptions();
                kodeLokasiTomSelect.addOption({value: '', text: 'Pilih lokasi'});
                @foreach($locations->sortBy('name') as $location)
                    kodeLokasiTomSelect.addOption({value: '{{ $location->kode_lokasi }}', text: '{{ $location->name }}'});
                @endforeach
                kodeLokasiTomSelect.refreshOptions(false);
            }

            nextBtn.addEventListener('click', function() {
                if ((identCodeSelect.value && identCodeSelect.value !== 'new') || 
                    (identCodeSelect.value === 'new' && newIdentCodeInput.value && identCodeError.classList.contains('hidden'))) {
                    if (nameInput.value && categorySelect.value) {
                        step1.classList.add('hidden');
                        step2.classList.remove('hidden');
                        
                        // Update step indicators
                        step1Indicator.classList.remove('active');
                        step1Indicator.classList.add('completed');
                        step2Indicator.classList.remove('bg-gray-200', 'text-gray-500');
                        step2Indicator.classList.add('active');
                        step1Label.classList.remove('text-blue-600');
                        step1Label.classList.add('text-green-600');
                        step2Label.classList.remove('text-gray-400');
                        step2Label.classList.add('text-blue-600');
                    } else {
                        alert('Harap isi semua field pada Step 1.');
                    }
                } else {
                    alert('Harap pilih atau masukkan ident code yang valid.');
                }
            });

            prevBtn.addEventListener('click', function() {
                step2.classList.add('hidden');
                step1.classList.remove('hidden');
                
                // Update step indicators
                step1Indicator.classList.add('active');
                step1Indicator.classList.remove('completed');
                step2Indicator.classList.add('bg-gray-200', 'text-gray-500');
                step2Indicator.classList.remove('active');
                step1Label.classList.add('text-blue-600');
                step1Label.classList.remove('text-green-600');
                step2Label.classList.add('text-gray-400');
                step2Label.classList.remove('text-blue-600');
            });

            submitBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (validateForm()) {
                    document.getElementById('assetForm').submit();
                }
            });

            function validateForm() {
                let isValid = true;

                if (!kodeLokasiSelect.value) {
                    kodeLokasiError.classList.remove('hidden');
                    isValid = false;
                } else {
                    kodeLokasiError.classList.add('hidden');
                }

                // Add more validations for other fields if needed

                return isValid;
            }

            kodeLokasiSelect.addEventListener('change', function() {
                let kode_lokasi = this.value;
                if (kode_lokasi) {
                    kodeLokasiError.classList.add('hidden');
                    fetch(`/get-location-details/${kode_lokasi}`)
                        .then(response => response.json())
                        .then(data => {
                            let detailsDiv = document.getElementById('locationDetails');
                            detailsDiv.innerHTML = `
                                <div class="space-y-3">
                                    <h4 class="text-lg font-bold text-blue-800 mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Detail Lokasi
                                    </h4>
                                    <div class="grid grid-cols-1 gap-3">
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 mr-2 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-700">Nama Lokasi</p>
                                                <p class="text-base font-bold text-gray-900">${data.name}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 mr-2 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-700">Detail</p>
                                                <p class="text-base text-gray-900">${data.detail_lokasi}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 mr-2 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                                            </svg>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-700">Koordinat</p>
                                                <p class="text-base text-gray-900">${data.koordinat_x}, ${data.koordinat_y}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            detailsDiv.classList.remove('hidden');
                        });
                } else {
                    document.getElementById('locationDetails').classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>