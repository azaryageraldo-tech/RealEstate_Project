<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $agentId = Auth::id();

        // 1. Hitung jumlah listing yang statusnya 'Tersedia'
        $activeListingsCount = Property::where('user_id', $agentId)
                                       ->where('status', 'Tersedia')
                                       ->count();

        // 2. Hitung total view dari semua properti milik agen
        $totalViews = Property::where('user_id', $agentId)
                                ->withCount('views')
                                ->get()
                                ->sum('views_count');

        // 3. Ambil 5 properti terbaru untuk ditampilkan di tabel
        $recentProperties = Property::where('user_id', $agentId)
                                    ->latest()
                                    ->take(5)
                                    ->get();
        
        // Data dummy untuk Leads, karena kita belum membangun fiturnya
        $newLeadsCount = 0; // Ganti dengan logika leads nanti

        // Kirim semua data ke view
        return view('agent.dashboard', compact(
            'activeListingsCount',
            'totalViews',
            'newLeadsCount',
            'recentProperties'
        ));
    }
}