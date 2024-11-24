<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;

class TampilanController extends Controller
{
    public function index()
    {
        // Fetch the menu data from the database
        $menus = Menu::all(); // Fetch all menu items from the database
        return view('tampilan.index', compact('menus')); // Pass the $menus variable to the view
    }
}
