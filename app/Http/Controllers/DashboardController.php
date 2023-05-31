<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Index
    public function index(){
        $users = User::count();
        $category = Kategori::count();
        $product = Barang::count();
        $user = Auth::user()->picture;

        return view('dashboard.home', compact('users', 'user', 'category', 'product'));
    }
}
