<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Jurusan;
use App\Models\Waktu;
use App\Models\Jadwal;
use Session;
use PDF;

use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\approveNotification;
use App\Notifications\disApproveNotification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class KepsekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data1 = guru::count();
        $data2 = kelas::count();
        $data3 = mapel::count();
        $data4 = jurusan::count();
        $user = Auth::user();
        return view('kepsek.home', compact( 'user','data1','data2','data3','data4'));
    }

    public function kelas()
    {
        $user = Auth::user();
        $kelas = kelas::all();
        return view('kepsek.kelas', compact('user', 'kelas'));
    }

    public function mapel()
    {
        $user = Auth::user();
        $mapel = mapel::all();
        $jurusan = jurusan::all();
        $mapel1['mapel'] = mapel::with('jurusans')->get();
        return view('kepsek.mapel', compact('user', 'mapel1','mapel','jurusan'));
    }

    public function waktu()
    {
        $user = Auth::user();
        $waktu = waktu::all();
        return view('kepsek.waktu', compact('user', 'waktu'));
    }

    public function guru()
    {
        $user = Auth::user();
        $guru = guru::all();
        return view('kepsek.guru', compact('user', 'guru'));
    }

    public function jurusan()
    {
        $user = Auth::user();
        $jurusan = jurusan::all();
        return view('kepsek.jurusan', compact('user', 'jurusan'));
    }

    public function jadwal(Request $req)
    {
        $user = Auth::user();
        $jadwal = jadwal::where('hari','LIKE','%'.$req->hari.'%')->where('status',1)->get();
        $jadwal1['jadwal'] = jadwal::with('jadwals')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal2')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal3')->get();
        return view('kepsek.jadwal', compact('user',
        'jadwal','jadwal1'));
    }

    public function approve(Request $req)
    {
        $user = Auth::user();
        $jadwal = jadwal::where('hari','LIKE','%'.$req->hari.'%')->where('status',0)->get();
        $jadwal1['jadwal'] = jadwal::with('jadwals')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal2')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal3')->get();
        return view('kepsek.approve', compact('user','jadwal','jadwal1'));
    }
    public function approve_submit()
    {
        $jadwal = jadwal::all();
        jadwal::query()->update(['status' => 1]);
        
        $user = User::find(1);
        $admin = User::where('roles_id', 1)->get();
        Notification::send($admin, new approveNotification($user));

        Session::flash('status', 'Data Jadwal Berhasil Disetujui!!!');
        return redirect()->route('kepsek.jadwal.jadwal1');
    }
    public function approve_destroy()
    {
        
        $pengguna = User::find(1);
        $admin = User::where('roles_id', 1)->get();
        Notification::send($admin, new disApproveNotification($pengguna));

        Session::flash('status', 'Data Jadwal Berhasil Ditolak!!!');
        return redirect()->route('kepsek.jadwal.jadwal1');
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
