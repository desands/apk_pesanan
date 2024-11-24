<!-- resources/views/qrcode.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        h1 {
            color: #333;
            font-size: 24px;
        }
        .qr-code {
            margin: 20px 0;
        }
        .instruction {
            font-size: 16px;
            color: #666;
        }
        .print-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .print-button:hover {
            background-color: #0056b3;
        }

        /* Styling for Print */
        @media print {
            .print-button {
                display: none;
            }
            body, .container {
                background: #fff;
                color: #000;
                box-shadow: none;
            }
            .container {
                width: 100%;
                padding: 0;
                border-radius: 0;
                margin: 0;
            }
            h1 {
                font-size: 18px;
            }
            .instruction {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        
        <h1> Daftar Menu</h1>
        <div class="qr-code">
            {!! $qrCode !!}
        </div>
        <p class="instruction"> Scane QR Code ini untuk melihat daftar menu.</p>
    </div>
    
 
        
</body>
</html>
