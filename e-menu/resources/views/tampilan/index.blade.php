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
            background-color: #40413A; 
            color: #ffffff; 
            padding-top: 80px; 
        }
        
        .small-popup {
            width: 300px !important; 
            font-size: 0.9em;
        }

        .header {
            position: fixed; 
            top: 0; 
            left: 0;
            right: 0;
            padding: 20px;
            background-color: #000; 
            border-radius: 0;
            z-index: 1000; 
        }

        .header h2 {
            margin: 0;
            color: #f8f9fa; 
            font-weight: bold;
            text-align: center; 
        }

        .form-group {
            border: 1px solid #ffffff; 
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); 
            background-color: rgba(255, 255, 255, 0.1); 
        }

        .card {
            background-color: rgba(255, 255, 255, 0.2); 
            border: none; /
            border-radius: 10px; 
            transition: transform 0.2s; 
        }

        .card:hover {
            transform: scale(1.05); 
        }

        .card-title {
            color: #f8f9fa; 
        }

        .card-text {
            color: #ffffff; 
        }

        .badge {
            margin-top: 5px; 
        }

        .btn-success {
            background-color: #28a745; 
        }

        .btn-success:hover {
            background-color: #218838; 
        }

        
        .form-label {
            color: #ffffff; 
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>DAFTAR MENU</h2>
    </div>

    <div class="container" style="position: relative; min-height: 100vh; padding: 30px;">
        <form id="orderForm">
            <div class="form-group my-3" style="max-width: 230px; text-align: left; position: fixed; top: 80px; right: 20px; z-index: 1000; margin-right: 50px;">
                <label for="customerName" class="me-2">Nama:</label>
                <input type="text" class="form-control form-control-sm" id="customerName" placeholder="Masukkan nama" style="box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
                
                <div class="d-flex align-items-center mt-2">
                    <label for="customerMeja" class="me-2">Meja:</label>
                    <input type="number" class="form-control form-control-sm me-2" id="customerMeja" placeholder="No" style="width: 60px;">
                    <button class="btn btn-success" id="orderButton">Pesan</button>
                </div>
            </div>
            
            <div class="col-md-7">
                <div class="row">
                    @foreach($menus as $menu)
                        <!-- Card Menu -->
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body text-center">
                                    <!-- Gambar Menu -->
                                    @if($menu->image)
                                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->namaMenu }}" class="card-img-top mb-1" style="height: 150px; width: 100%; object-fit: cover;">
                                    @else
                                        <img src="default-image.png" alt="No image available" class="card-img-top mb-1" style="height: 150px; width: 100%; object-fit: cover;">
                                    @endif
                                    
                                    <h5 class="card-title mb-0">{{ $menu->namaMenu }}</h5>
                                    <p class="card-text mb-0" style="color: white;">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>

                                    
                                    <!-- Status Menu -->
                                    <div class="mb-1">
                                        @if($menu->status == 1)
                                            <span class="badge bg-success">Tersedia</span>
                                        @else
                                            <span class="badge bg-danger">Habis</span>
                                        @endif
                                    </div>

                                    <div class="mb-1 mt-2 d-flex align-items-center">
                                        <label for="jumlah{{ $menu->idMenu }}" class="form-label mb-0 me-2" style="min-width: 70px;">Jumlah:</label>
                                        <input type="number" id="jumlah{{ $menu->idMenu }}" name="menus[{{ $menu->idMenu }}][jumlah]" class="form-control" style="width: 60px;" required>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('orderButton').addEventListener('click', function (event) {
            event.preventDefault();
    
            const customerName = document.getElementById('customerName').value;
            const customerMeja = document.getElementById('customerMeja').value;
    
            if (!customerName || !customerMeja) {
                Swal.fire('Error', 'Harap isi semua kolom!', 'error');
                return;
            }
    
            fetch("{{ route('pesanans.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    namaPelanggan: customerName,
                    noMeja: customerMeja,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    Swal.fire('Sukses', data.message, 'success');
                }
            })
            .catch(error => {
                Swal.fire('Error', 'Gagal menyimpan pesanan!', 'error');
                console.error('Error:', error);
            });
        });
    </script>
    
    </body>
</html>
