<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\User;
use App\Tugas;
use App\Murid;
class KelasController extends Controller
{
    public function index()
    {
        // 
        $murid = Murid::all();
        $tugas= Tugas::all();
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas')); 
    }
    public function lihat($id)
    {
        // 
        $tugases = Tugas::all();
        $murid = Murid::all();
        $kelas = Kelas::find($id);
        return view('kelas.lihat', compact('kelas', 'tugases', 'murid')); 
    }
    
    public function create()
    {
        //
            $users = User::all();
            return view('kelas.create', compact('users'));
        
    }
  
    public function store(Request $request)
    {
        //
       $kelas = new Kelas();
       $request->validate([
            'nama_kelas' => 'required',
            'jenis_kelas' => 'required',
            'user_id'=> 'required'
            
        ]);

        $kelas->user_id = $request->user_id; 
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->jenis_kelas = $request->jenis_kelas;

        $kelas->save();
        return redirect('kelas');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $kelas = Kelas::find($id);
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        //
            $request->validate([
            'nama_kelas' => 'required',
            'jenis_kelas' => 'required',
            
        ]);
        $kelas = Kelas::find($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->jenis_kelas = $request->jenis_kelas;
        

        $kelas->save();
        return redirect('kelas');
    }

    public function destroy($id)
    {
        //
        $kelas = Kelas::find($id);
        $kelas->delete();

        return redirect('/kelas');
    }
}
