<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;
use Illuminate\Support\Carbon;
use DB;

class LaporanController extends Controller
{
    public function laporan(Request $request)
    {
        return view('laporan.index');
    }

    public function searchByDate(Request $request)
    {
        // Ambil tanggal yang dipilih dari request
        $selectedDate = $request->input('selected_date');
    
        // Konversi format tanggal jika diperlukan
        $selectedDate = Carbon::createFromFormat('Y-m-d', $selectedDate);
        $formattedDate = $selectedDate->format('d M Y');
        // Lakukan operasi pencarian berdasarkan tanggal
        // $results = Production::whereDate('created_at', $selectedDate)->get();

        $results = Production::select('kode_produksi','qty_product','product_id','created_at', DB::raw('MIN(id) as id'))
            ->whereDate('created_at', $selectedDate)    
            ->groupBy('kode_produksi','qty_product','product_id','created_at')
            ->get();
    
        // Atau, jika Anda ingin mencari data dalam rentang tanggal tertentu, gunakan whereBetween
        // $startDate = $selectedDate->startOfDay();
        // $endDate = $selectedDate->endOfDay();
        // $performances = PerformanceAssessment::whereBetween('created_at', [$startDate, $endDate])->get();
    
        // Kembalikan atau tampilkan hasil pencarian
        return view('laporan.result', compact('results', 'formattedDate'));
    }
}
