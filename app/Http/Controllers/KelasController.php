<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\User;
use App\Tugas;
use App\Murid;
use App\post;

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
        $tugases = Tugas::orderBy('created_at','desc')->get()->all();
        $murid = Murid::all();
        $post = post::all();
        $kelass = Kelas::all();
        $kelas = Kelas::find($id);
        return view('kelas/lihat', compact('kelas','kelass', 'tugases', 'murid', 'post')); 
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
    public function post( Request $request){
        $post = new Tugas();
        // $request->validate([
        //     'user_id' => 'required',
        //     'kelas_id' => 'required',
        //     'deskripsi' => 'required'
        // ]);
        $post->user_id=$request->user_id;
        $post->kelas_id=$request->kelas_id;
        $post->deskripsi=$request->deskripsi;
        $post->save();
        return redirect('kelas/lihat/' .$request->kelas_id);
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