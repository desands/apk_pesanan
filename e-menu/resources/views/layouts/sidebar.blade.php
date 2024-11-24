<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div style="width: 250px; background-color: #181818; padding: 20px; color: white;">
        <h2 style="color: white; margin: 0px; padding-left: 20px; font-size: 20px;">Restoran Apra</h2>
        <ul style="list-style-type: none; padding: 15px; padding-top:5px; ">
            
            <li style="margin: 10px 0; padding: 5px;">
                <a href="{{ route('menu.index') }}" style="color: white; text-decoration: none; font-size: 15px; " >
                    <i class="fas fa-utensils" style="margin-right: 10px;"></i> Menu
                </a>
            </li>
            <li style="margin: 10px 0; padding: 5px;">
                <a href="{{ route('pesanan.index') }}" style="color: white; text-decoration: none; font-size: 15px;">
                    <i class="fas fa-shopping-cart" style="margin-right: 5px;"></i> Pesanan
                </a>
            </li>
            <li style="margin: 10px 0; padding: 5px;">
                <a href="#" style="color: white; text-decoration: none; font-size: 15px;">
                    <i class="fas fa-file-alt" style="margin-right: 12px; padding-left: 3px"></i>Laporan
    
                </a>
            </li>
        </ul>
    </div>
</body>
</html>