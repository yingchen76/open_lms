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
        $tugases = Tugas::orderBy('created_at','desc')->get()->all();
        // $murid = Murid::all();
        $murids = Murid::where('kelas_id',$id)->get();

        // $kelass = Kelas::all();
        $user = User::all();
        $kelas = Kelas::find($id);
        return view('kelas/lihat', compact('murids','kelas', 'tugases', 'post', 'user')); 
    }
    public function create()
    {
        //
            $users = User::all();
            return view('kelas.create', compact('users'));
        
    }
    // public function cari(Request $request)
    // {
    //     // menangkap data pencarian
    //     $cari = $request->cari;
 
    //         // mengambil data dari table pegawai sesuai pencarian data
    //     $kelas = Kelas::select('nama_kelas','user_id')->where('nama_kelas','like',"%".$cari."%");
 
    //         // mengirim data pegawai ke view index
    //     return view('/kelas/cari', compact('kelas'));
    // }
  
    public function store(Request $request)
    {
        //
       $kelas = new Kelas();
       $request->validate([
            'nama_kelas' => 'required',
            'jenis_kelas' => 'required',
            'user_id'=> 'required',
            'deskripsi' => 'required'
            
        ]);

        $kelas->user_id = $request->user_id; 
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->jenis_kelas = $request->jenis_kelas;
        $kelas->deskripsi = $request->deskripsi;

        $kelas->save();
        return redirect('kelas');
    }
    public function post( Request $request){
        $post = new Tugas();
        
        if ($request->file('file_tugas') != null ){
            $tempat_upload = public_path('/file');
            $file = $request->file('file_tugas');
            $ext = $file->getClientOriginalExtension();
            $namafile= $file->getClientOriginalName();
            $file->move($tempat_upload, $namafile);
            $request->file_tugas = $namafile;
        }
        
        $post->user_id=$request->user_id;
        $post->kelas_id=$request->kelas_id;
        $post->deskripsi=$request->deskripsi;
        $post->file_tugas=$request->file_tugas;;
        // return $request->deskripsi;
        $post->save();

        return redirect('kelas/lihat/' .$request->kelas_id);
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
        $murid = Murid::where('kelas_id',$id);   
        $murid->delete();   
        $tugas = Tugas::where('kelas_id',$id);
        $tugas->delete();  
        // return $murid;
        return redirect('kelas');
    }

    public function rating(Request $request){
        
        $murid_kelas = Murid::where('kelas_id',$request->kelas_id)
                        ->where('user_id',$request->user_id)->first(); 

        $rating = Murid::find($murid_kelas->id);
        $murid_kelas->kelas_id =  $request->kelas_id;
        $murid_kelas->user_id = $request->user_id;
        $murid_kelas->id = $murid_kelas->id;
        $murid_kelas->rating = $request->rating;
        $murid_kelas->save(); 

        return view('kelas/lihat/'.$request->kelas_id);   
    }
}