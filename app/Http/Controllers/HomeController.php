<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $purchases = DB::table('sales')
            ->selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->get();

        $monthLabels = [];
        $totals = [];

        foreach ($purchases as $purchase) {
            $monthLabels[] = Carbon::create()->month($purchase->month)->format('F');
            $totals[] = $purchase->total;
        }

        return view('home', [
            'months' => $monthLabels,
            'totals' => $totals
        ]);
    }
}
