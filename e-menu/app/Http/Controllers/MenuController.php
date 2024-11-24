<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;




class MenuController extends Controller
{
    // Tampilkan halaman daftar menu
    public function index()
    {
        $menus = Menu::all(); // Mengambil semua menu dari database
        return view('menu.index', compact('menus'));
    }

    // Tampilkan form tambah menu
    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'menuImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'menuName' => 'required|string|max:50',
            'menuPrice' => 'required|numeric|min:0',
            'menuStatus' => 'required|in:available,unavailable',
        ]);

        // Mengupload gambar ke storage dan mendapatkan path-nya
        if ($request->hasFile('menuImage')) {
            $imagePath = $request->file('menuImage')->store('menu_images', 'public');
        }

        // Menyimpan data menu ke database
        Menu::create([
            'image' => $imagePath,
            'namaMenu' => $request->menuName,
            'harga' => $request->menuPrice,
            'status' => $request->menuStatus == 'available' ? 1 : 0,
            // 'jumlahMakanan' => 0, // Set default jika diperlukan
            // 'mejaid' => 1, // Bisa disesuaikan dengan input jika ada
            'KasiridKasir' => 1, // Bisa disesuaikan dengan input jika ada
            'User_idUser' => auth()->id(), // Menyimpan ID user yang membuat menu
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu created successfully.');
    }
    
    public function destroy($id)
    {
        // Cari menu berdasarkan ID
        $menu = Menu::findOrFail($id);
        
        // Hapus menu
        $menu->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }
    
    // metode edit
    public function edit($id)
{
    $menu = Menu::findOrFail($id);
    return view('menu.edit', compact('menu'));
}
    // metode update
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'menuImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'menuName' => 'required|string|max:255',
            'menuPrice' => 'required|numeric',
            'menuStatus' => 'required|in:available,unavailable',
        ]);
    
        $menu = Menu::findOrFail($id); // Mengambil menu berdasarkan ID
    
        // Cek jika ada gambar baru yang diupload
        if ($request->hasFile('menuImage')) {
            // Hapus gambar lama jika ada
            if ($menu->image) {
                Storage::delete('public/' . $menu->image);
            }
            // Simpan gambar baru
            $path = $request->file('menuImage')->store('menu_images', 'public');
            $menu->image = $path;
        }
    
        // Perbarui informasi menu
        $menu->namaMenu = $request->menuName;
        $menu->harga = $request->menuPrice;
        $menu->status = $request->menuStatus === 'available' ? 1 : 0; // Asumsikan status disimpan sebagai integer (1 untuk tersedia, 0 untuk tidak tersedia)
        $menu->save(); // Simpan perubahan
    
        return response()->json(['success' => true, 'message' => 'Item berhasil diperbarui.']);

    }



    public function qrcode()
    {
        $qrCode = Qrcode::size(180)->generate(route('menu.index'));

        return view('qrcode', compact( 'qrCode'));
    }
    
 

}




