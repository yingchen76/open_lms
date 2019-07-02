<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kelas;

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
     *m
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kelas = Kelas::all();
        $user = User::all();
       
        return view('home', compact('kelas', 'user'));
    }


     public function cari(Request $request)
    {   
      
        $kelas = Kelas::where('nama_kelas', 'LIKE', '%'.$request->cari.'%')->get();       
          return view('home', compact('kelas'));
    }
    
}
