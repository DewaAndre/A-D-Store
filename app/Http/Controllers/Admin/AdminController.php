<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch data untuk bulan dan total checkout
        $checkoutData = DB::table('checkout')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->whereNotNull('created_at')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Siapkan array bulan dan total
        $months = $checkoutData->pluck('month');
        $totals = $checkoutData->pluck('total');

        // Kembalikan view dengan data yang diperlukan
        return view('admin.index', compact('months', 'totals'));
    }
}

