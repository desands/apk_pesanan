<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Dashboard</title>
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <!-- SweetAlert JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/JsBarcode/3.11.0/JsBarcode.all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       body {
        padding-top: 70px; /* Adjust this value to match the new height of the header */
    }
    .fixed-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background-color: rgb(26, 25, 25);
        z-index: 1000; /* Ensure it stays above other content */
        padding: 20px 0; /* Further reduce padding for a smaller header */
    }
   
    .fixed-header h2 {
        margin: 0; 
        font-size: 1.25rem; 
    }

    </style>
</head>

<body class="bg-dark text-light">
    <div class="fixed-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-0"> 
                <div class="flex-grow-1 text-center">
                    <h2 class="text-white py-1 mb-0">DAFTAR MENU</h2> 
                </div>
                <a href="{{ route('menu.create') }}" class="btn btn-primary">Tambah Menu</a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <!-- Daftar Menu -->
            <div class="col-md-8">
                <div class="row">
                    @foreach($menus as $menu)
                        <!-- Card Menu -->
                        <div class="col-md-4 mb-3">
                            <div class="card bg-secondary text-white shadow-sm">
                                <div class="card-body text-center">
                                    <!-- Gambar Menu -->
                                    @if($menu->image)
                                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->namaMenu }}" class="card-img-top mb-1" style="height: 150px; object-fit: cover;">
                                    @else
                                        <img src="default-image.png" alt="No image available" class="card-img-top mb-1" style="height: 150px; object-fit: cover;">
                                    @endif
                                    
                                    <h5 class="card-title mb-0">{{ $menu->namaMenu }}</h5>
                                    <p class="card-text mb-0">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                    
                                    <!-- Status Menu -->
                                    <div class="mb-1">
                                        @if($menu->status == 1)
                                            <span class="badge bg-success">Tersedia</span>
                                        @else
                                            <span class="badge bg-danger">Habis</span>
                                        @endif
                                    </div>
                                    
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('menu.edit', $menu->idMenu) }}" class="btn btn-warning w-45">Edit</a>
                                        
                                        <!-- Form untuk menghapus menu -->
                                        <form id="delete-form-{{ $menu->idMenu }}" action="{{ route('menu.destroy', $menu->idMenu) }}" method="POST" class="w-45">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger w-100" onclick="confirmDelete({{ $menu->idMenu }})">Hapus</button>
                                        </form>
                                        
                                        <script>
                                            function confirmDelete(menuId) {
                                                Swal.fire({
                                                    title: 'Apakah Anda yakin?',
                                                    text: "Menu ini akan dihapus!",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#d33',
                                                    cancelButtonColor: '#3085d6',
                                                    confirmButtonText: 'Ya, hapus!',
                                                    cancelButtonText: 'Batal',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('delete-form-' + menuId).submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        
            <!-- Barcode Section -->
            <div class="col-md-4">
                <div class="card bg-secondary text-white shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">QR Code</h5>
                        <p class="card-text">Scan QR Code ini untuk melihat daftar menu.</p>
                        
                        <!-- Tampilkan QR Code -->
                        <div class="qr-code mb-3">
                            {{-- {!! $qrCode !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-Q3i8eH2gNmo40Fz3CcZf4+/1mWcm4FzMXPgiXbhH/jH7T0RXohioLzvJ4DD0tG9L" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-WXgp5yOG5f34z3CzFZXbH72Mwr6d4Wxr5Wkj0iq3T7K8n5fx0xU68Og3xTHlUy8c" crossorigin="anonymous"></script>
</body>
</html>
