<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunting Item Menu</title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="font-family: Arial, sans-serif; background-color: #ddd; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 300px;">
        <h1 style="text-align: center; margin-bottom: 20px;">Sunting Item Menu</h1>
        <form id="editMenuForm" action="{{ route('menu.update', $menu->idMenu) }}" method="post" enctype="multipart/form-data">
            @csrf <!-- Tambahkan token CSRF untuk keamanan -->
            @method('PUT') <!-- Mengatakan bahwa ini adalah permintaan PUT -->
            <div style="margin-bottom: 15px;">
                <label for="menuImage" style="display: block; margin-bottom: 5px; font-weight: bold;">Gambar Menu</label>
                <input type="file" id="menuImage" name="menuImage" accept="image/*" style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
                <!-- Jika ingin menampilkan gambar yang sudah ada, tambahkan ini -->
                @if($menu->image)
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->namaMenu }}" style="width: 100%; height: auto; margin-top: 10px;">
                @endif
            </div>
            <div style="margin-bottom: 15px;">
                <label for="menuName" style="display: block; margin-bottom: 5px; font-weight: bold;">Nama Menu</label>
                <input type="text" id="menuName" name="menuName" value="{{ $menu->namaMenu }}" required style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="menuPrice" style="display: block; margin-bottom: 5px; font-weight: bold;">Harga Menu</label>
                <input type="number" id="menuPrice" name="menuPrice" value="{{ $menu->harga }}" step="0.01" required style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="menuStatus" style="display: block; margin-bottom: 5px; font-weight: bold;">Status</label>
                <select id="menuStatus" name="menuStatus" required style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="available" {{ $menu->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="unavailable" {{ $menu->status == 'unavailable' ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
            </div>
            <button type="submit" style="width: 100%; padding: 10px; background-color: #5cb85c; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">Perbarui Menu</button>
        </form>
    </div>

    <script>
        // Menangkap event submit pada form
        document.getElementById('editMenuForm').onsubmit = function(event) {
            event.preventDefault(); // Mencegah pengiriman form secara langsung
            
            // Menggunakan Fetch API untuk mengirim data secara asinkron
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Menyertakan token CSRF
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Jika edit berhasil
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Item menu berhasil diperbarui.',
                        icon: 'success',
                        width: '300px', // Menentukan lebar pop-up
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = "{{ route('menu.index') }}"; // Kembali ke daftar menu setelah konfirmasi
                    });
                } else {
                    // Jika ada kesalahan
                    Swal.fire({
                        title: 'Gagal!',
                        text: data.message || 'Terjadi kesalahan saat memperbarui item menu.',
                        icon: 'error',
                        width: '300px', // Menentukan lebar pop-up
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                // Jika terjadi error pada Fetch API
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan pada server.',
                    icon: 'error',
                    width: '300px', // Menentukan lebar pop-up
                    confirmButtonText: 'OK'
                });
            });
        };
    </script>
    
</body>
</html>
