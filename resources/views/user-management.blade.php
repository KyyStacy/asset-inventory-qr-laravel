<x-app-layout>
    <style>
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slideIn {
            animation: slideIn 0.5s ease-out;
        }
    </style>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8 animate-slideIn">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h1 class="text-4xl font-extrabold mb-2">
                            <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Manajemen Pengguna</span>
                        </h1>
                        <p class="text-gray-600">Kelola pengguna dan hak akses sistem</p>
                    </div>
                    <button id="createUserButton" class="group inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl hover:shadow-xl hover:scale-105 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Tambah Pengguna
                    </button>
                </div>
            </div>

            <!-- Search Box -->
            <div class="mb-8 animate-slideIn">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" id="emailSearch" placeholder="Cari berdasarkan email, nama, atau nomor HP..." class="w-full pl-12 pr-32 py-4 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 shadow-sm hover:shadow-md">
                    <button id="searchButton" class="absolute right-2 top-1/2 -translate-y-1/2 px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg hover:shadow-lg hover:scale-105 transition-all duration-300">
                        Cari
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 animate-slideIn">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Pengguna</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">No HP</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Role</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody" class="divide-y divide-gray-200">
                            <!-- Table body will be populated dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Popup -->
    <div id="userModal" class="hidden fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 sm:p-0">
            <div class="fixed inset-0 bg-gray-900 bg-opacity-75 backdrop-blur-sm transition-opacity" aria-hidden="true"></div>
            <div class="relative inline-block align-middle bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full border border-gray-200">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                    <h3 class="text-2xl font-bold text-white" id="modalTitle">Tambah Pengguna</h3>
                </div>
                <div class="bg-white px-6 py-6">
                    <div class="w-full">
                        <div>
                            <form id="userForm" class="space-y-5">
                                    @csrf
                                    <input type="hidden" name="_method" id="formMethod" value="POST">
                                    <input type="hidden" name="id" id="userId">
                                    
                                    <div>
                                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                        <input type="text" name="name" id="name" class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Masukkan nama lengkap" required>
                                    </div>
                                    
                                    <div>
                                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                        <input type="email" name="email" id="email" class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="nama@email.com" required>
                                    </div>
                                    
                                    <div>
                                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                                        <input type="password" name="password" id="password" class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Minimal 8 karakter">
                                    </div>
                                    
                                    <div>
                                        <label for="no_hp" class="block text-sm font-semibold text-gray-700 mb-2">No HP</label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-600 font-medium text-sm">
                                                +62
                                            </span>
                                            <input type="text" name="no_hp" id="no_hp" class="w-full pl-14 pr-4 py-2.5 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="8123456789" required pattern="[0-9]*">
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
                                        <select name="role" id="role" class="w-full px-4 py-2.5 border-2 border-gray-200 bg-white rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" required>
                                            <option value="">Pilih Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="karyawan">Karyawan</option>
                                        </select>
                                    </div>
                                    
                                    <div class="flex gap-3 pt-4">
                                        <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all duration-300">
                                            Simpan
                                        </button>
                                        <button type="button" id="closeModalButton" class="px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-all duration-300">
                                            Batal
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateUserTable(users) {
            const tableBody = document.getElementById('userTableBody');
            tableBody.innerHTML = '';
            
            if (users.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                <p class="text-gray-500 text-lg font-semibold mb-2">Tidak Ada Pengguna Ditemukan</p>
                                <p class="text-gray-400">Coba ubah kata kunci pencarian Anda</p>
                            </div>
                        </td>
                    </tr>
                `;
                return;
            }
            
            users.forEach(user => {
                const row = document.createElement('tr');
                row.className = 'hover:bg-blue-50 transition-colors duration-200';
                row.innerHTML = `
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-${user.role === 'admin' ? 'purple' : 'blue'}-500 to-${user.role === 'admin' ? 'pink' : 'indigo'}-600 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white text-sm font-bold">${user.name.charAt(0).toUpperCase()}</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">${user.name}</p>
                                <p class="text-xs text-gray-500">${user.role.charAt(0).toUpperCase() + user.role.slice(1)}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">${user.email}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center text-sm font-medium text-gray-700">
                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            +${user.no_hp}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold ${user.role === 'admin' ? 'bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800 border border-purple-200' : 'bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-800 border border-blue-200'}">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                ${user.role === 'admin' 
                                    ? '<path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>' 
                                    : '<path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>'}
                            </svg>
                            ${user.role.charAt(0).toUpperCase() + user.role.slice(1)}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold ${user.is_online ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-gray-100 text-gray-700 border border-gray-200'}">
                            <span class="w-2 h-2 rounded-full ${user.is_online ? 'bg-green-500' : 'bg-gray-400'} mr-2"></span>
                            ${user.is_online ? 'Online' : 'Offline'}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <button class="editButton inline-flex items-center gap-1 px-3 py-1.5 bg-blue-100 text-blue-700 font-semibold rounded-lg hover:bg-blue-200 transition-all duration-200" data-id="${user.id}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit
                            </button>
                            <button class="deleteButton inline-flex items-center gap-1 px-3 py-1.5 bg-red-100 text-red-700 font-semibold rounded-lg hover:bg-red-200 transition-all duration-200" data-id="${user.id}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Hapus
                            </button>
                        </div>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            attachEventListeners();
        }

        function fetchUsers(searchTerm = '') {
            fetch(`/get-users?search=${searchTerm}`)
                .then(response => response.json())
                .then(data => {
                    updateUserTable(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data pengguna. Silakan coba lagi.');
                });
        }

        function attachEventListeners() {
            document.querySelectorAll('.editButton').forEach(button => {
                button.addEventListener('click', function() {
                    let userId = this.getAttribute('data-id');
                    fetch(`/user-management/${userId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success && data.data) {
                                document.getElementById('modalTitle').innerText = 'Edit Pengguna';
                                document.getElementById('formMethod').value = 'PUT';
                                document.getElementById('userId').value = data.data.id;
                                document.getElementById('name').value = data.data.name;
                                document.getElementById('email').value = data.data.email;
                                document.getElementById('no_hp').value = data.data.no_hp.toString().replace(/^62/, '');
                                document.getElementById('role').value = data.data.role;
                                document.getElementById('password').required = false;
                                document.getElementById('userModal').classList.remove('hidden');
                            } else {
                                alert(data.message || 'Terjadi kesalahan saat mengambil data pengguna.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat mengambil data pengguna. Silakan coba lagi.');
                        });
                });
            });

            document.querySelectorAll('.deleteButton').forEach(button => {
                button.addEventListener('click', function() {
                    if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
                        let userId = this.getAttribute('data-id');
                        fetch(`/user-management/${userId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                fetchUsers();
                                alert(data.message);
                            } else {
                                alert('Gagal menghapus pengguna: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat menghapus pengguna. Silakan coba lagi.');
                        });
                    }
                });
            });
        }

        document.getElementById('createUserButton').addEventListener('click', function() {
            document.getElementById('userForm').reset();
            document.getElementById('modalTitle').innerText = 'Tambah Pengguna';
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('userId').value = '';
            document.getElementById('password').required = true;
            document.getElementById('userModal').classList.remove('hidden');
        });

        document.getElementById('closeModalButton').addEventListener('click', function() {
            document.getElementById('userModal').classList.add('hidden');
        });

        document.getElementById('userForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const method = document.getElementById('formMethod').value;
            const userId = document.getElementById('userId').value;
            const url = method === 'PUT' 
                ? `/user-management/${userId}`
                : '/user-management';

            if (method === 'PUT') {
                formData.append('_method', 'PUT');
            }

            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('userModal').classList.add('hidden');
                    fetchUsers();
                    alert(data.message);
                } else {
                    let errorMessage = 'Terjadi kesalahan:\n';
                    if (data.errors) {
                        for (let field in data.errors) {
                            errorMessage += `${field}: ${data.errors[field].join(', ')}\n`;
                        }
                    } else {
                        errorMessage += data.message || 'Unknown error';
                    }
                    alert(errorMessage);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            });
        });

        document.getElementById('searchButton').addEventListener('click', function() {
            const searchTerm = document.getElementById('emailSearch').value;
            fetchUsers(searchTerm);
        });

        document.getElementById('emailSearch').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                document.getElementById('searchButton').click();
            }
        });

        document.addEventListener('DOMContentLoaded', () => fetchUsers());
        setInterval(() => fetchUsers(document.getElementById('emailSearch').value), 5000);
    </script>
</x-app-layout>