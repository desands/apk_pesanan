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
    .small-popup {
    width: 300px !important; /* Sesuaikan ukuran sesuai kebutuhan */
    font-size: 0.9em; /* Sesuaikan ukuran font untuk memperkecil teks */
    padding: 1.5em; /* Atur padding agar proporsional */
}

</style>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <div style="width: 90%; margin: auto; padding: 10px; background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%); box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin-top: 30px;">
        <div style="text-align: center;">
            <h2 style="display: inline-block; color: #fff;color: #000; padding:10px; margin-top:50px; border-radius: 5px; font-weight: bold;">DAFTAR MENU</h2>
        </div>
       
        <div class="container" style="position: relative; min-height: 100vh; text-align: right; padding-right: 30px; text-size-adjust: 30px; padding-top: 30px;">
            <a href="{{ route("menu.create") }}" class="btn btn-primary" style="background-color:#008ba0;">Tambah Menu</a>
            
            {{-- <div class="container my-2">
                 <div class="container my-2"> --}}
                    <div class="container my-4">
                        <div class="row">
                            <!-- Daftar Menu -->
                            <div class="col-md-8">
                                <div class="row">
                                    @foreach($menus as $menu)
                                        <!-- Card Menu -->
                                        <div class="col-md-4 mb-0">
                                            <div class="card shadow-sm mb-2">
                                                <div class="card-body text-center">
                                                    <!-- Gambar Menu -->
                                                    @if($menu->image)
                                                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->namaMenu }}" class="card-img-top mb-1" style="height: 150px; width: 100%; object-fit: cover; overflow: hidden;">
                                                    @else
                                                        <img src="default-image.png" alt="No image available" class="card-img-top mb-1" style="height: 150px; width: 100%; object-fit: cover; overflow: hidden;">
                                                    @endif
                                                    
                                                    <h5 class="card-title mb-0">{{ $menu->namaMenu }}</h5>
                                                    <p class="card-text text-muted mb-0">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                                    
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
                                                                    customClass: {
                                                                        popup: 'small-popup' // Kelas khusus untuk memperkecil pop-up
                                                                    }
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        document.getElementById('delete-form-' + menuId).submit();
                                                                    }
                                                                });
                                                            }

                                                            // edit
                                                     
    
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
                                <div class="card shadow-sm">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">QR Code</h5>
                                        <p class="card-text">Scan QR Code ini untuk melihat daftar menu.</p>
                                        
                                        <!-- Tampilkan QR Code -->
                                        <div class="qr-code mb-3">
                                            {{-- {!! $qrCode !!} --}}
                                        </div>
                                        
                                        {{-- <button class="btn btn-primary" onclick="printQrCode()">Print QR Code</button> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                

            </div>
            
            
        </div>
    </div>
   
</body>
</html>
