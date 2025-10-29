<section class="space-y-6">
    <header>
        <p class="text-sm text-gray-600">
            Perbarui foto profil akun Anda dengan gambar yang jelas dan profesional.
        </p>
    </header>

    <form method="post" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex flex-col md:flex-row items-center gap-6 p-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border-2 border-blue-200">
            <div class="shrink-0">
                <div class="relative group">
                    <img id="preview_photo" 
                         class="h-40 w-40 object-cover rounded-2xl border-4 border-blue-300 shadow-lg transition-all duration-300 group-hover:shadow-2xl group-hover:scale-105" 
                         src="{{ $user->foto_profil ? asset('storage/' . $user->foto_profil) : asset('images/default-photo.png') }}" 
                         alt="Foto Profil">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/50 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
            </div>
            
            <div class="flex-1 w-full">
                <label class="block">
                    <span class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Pilih foto profil baru
                    </span>
                    <input type="file" 
                           name="photo" 
                           id="photo" 
                           accept="image/*" 
                           class="block w-full text-sm text-gray-700
                                  file:mr-4 file:py-3 file:px-6
                                  file:rounded-xl file:border-0
                                  file:text-sm file:font-bold
                                  file:bg-gradient-to-r file:from-blue-600 file:to-indigo-600
                                  file:text-white
                                  hover:file:shadow-lg hover:file:scale-105
                                  file:transition-all file:duration-300
                                  file:cursor-pointer
                                  cursor-pointer
                                  border-2 border-gray-200 rounded-xl
                                  focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                                  transition-all duration-200 p-2"/>
                </label>
                <p class="mt-3 text-xs text-gray-500 flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    Format: JPG, PNG, GIF (Max: 2MB)
                </p>
            </div>
        </div>

        <div class="mt-6 flex items-center gap-4">
            <button type="submit" class="inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl hover:shadow-xl hover:scale-105 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Simpan Foto
            </button>

            @if (session('status') === 'profile-photo-updated')
                <p x-data="{ show: true }" 
                   x-show="show" 
                   x-transition 
                   x-init="setTimeout(() => show = false, 3000)" 
                   class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-800 rounded-lg font-semibold border border-green-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Foto berhasil diperbarui!
                </p>
            @endif
        </div>
    </form>
</section>

<script>
document.getElementById('photo').onchange = function(evt) {
    const [file] = this.files;
    if (file) {
        document.getElementById('preview_photo').src = URL.createObjectURL(file);
    }
}
</script>
