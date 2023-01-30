<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Jurusan;
use App\Models\Waktu;
use App\Models\Jadwal;
use Session;

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
        return view('landing');
    }

    public function jadwal(Request $req)
    {
        $jadwal = jadwal::where('hari','LIKE','%'.$req->hari.'%')->where('status',1)->get();
        $jadwal1['jadwal'] = jadwal::with('jadwals')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal2')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal3')->get();
        return view('jadwals', compact('jadwal','jadwal1'));
    }
    public function print_jadwal(){
        $jadwal = jadwal::all();
        $jadwal1['jadwal'] = jadwal::with('jadwals')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal2')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal3')->get();

        $pdf = PDF::loadview('print_jadwal',['jadwal'=>$jadwal],[ 'jadwal1'=>$jadwal1]);
        return $pdf->download('data_jadwal.pdf');
}
}