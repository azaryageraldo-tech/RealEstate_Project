<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard untuk Admin.
     */
    public function index()
    {
        // 1. Statistik Properti
        $totalListings = Property::count();
        $soldListings = Property::where('status', 'Terjual')->count();

        // 2. Statistik Pengguna
        $totalUsers = User::count();
        $agentCount = User::where('role', 'agent')->count();
        $userCount = User::where('role', 'user')->count();

        // 3. Statistik Traffic (Total Views)
        $totalViews = DB::table('property_views')->count();

        // 4. Pengguna & Properti Terbaru
        $recentUsers = User::latest()->take(5)->get();
        $recentProperties = Property::with('user')->latest()->take(5)->get();
        
        // Kirim semua data ke view
        return view('admin.dashboard', compact(
            'totalListings',
            'soldListings',
            'totalUsers',
            'agentCount',
            'userCount',
            'totalViews',
            'recentUsers',
            'recentProperties'
        ));
    }
}
