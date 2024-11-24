<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function generateMenuQRCode()
    {
        // URL yang mengarah ke halaman daftar menu
        $url = route('menu.index'); 

        // Membuat QR code dengan URL daftar menu
        $qrCode = QrCode::size(300)->generate($url);

        return view('qrcode', compact('qrCode'));
    }
}
