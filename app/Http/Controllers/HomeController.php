<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Sale;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pembeliMember = 9;
        $pembeliNonMember = 15;

        $pembeliJumlah = Member::all()->count();
        $memberKondisi = Member::where('member_code', 'MBR-0001')->count();
        $salesToday = Sale::where('created_at', Carbon::today())->get();

        $salesTodayCount = $salesToday->count();

        

        return view('home', compact('salesTodayCount'));
    }

    public function blank()
    {
        return view('layouts.blank-page');
    }
}
