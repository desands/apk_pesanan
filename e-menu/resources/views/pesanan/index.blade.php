<!-- resources/views/pesanan/index.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            padding-top: 20px;
        }
        .card {
            margin: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Daftar Pesanan</h2>
        
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>No Meja</th>
                            <th>Tanggal</th>
                            <th>Menu Pesanan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesanans as $index => $pesanan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pesanan->namaPelanggan }}</td>
                            <td>{{ $pesanan->noMeja }}</td>
                            <td>{{ $pesanan->tanggal }}</td>
                            <td>
                                <ul>
                                    @foreach($pesanan->detailPesanans as $detail)
                                        <li>{{ $detail->namaMenu }} - Jumlah: {{ $detail->jumlah }} - Total: Rp {{ number_format($detail->total, 0, ',', '.') }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <strong>Total Pesanan:</strong><br>
                                Rp {{ number_format($pesanan->detailPesanans->sum('total'), 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
