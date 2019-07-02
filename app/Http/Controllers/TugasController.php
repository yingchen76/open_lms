<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugas;
use App\Kelas;
use App\User;
use App\Upload;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $kelas= Kelas::find($id);
        return view('tugas.index',compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        $kelas = User::all();
        return view('tugas.index', compact('kelas'));
    }

    public function daftar($id)
    {
        $uploads = Upload::select('tugas_id','file_tugas','user_id')->where('tugas_id',$id)->get(); 
        // return $uploads;
        return view('tugas.daftar', compact('uploads'));
    }

    public function lihat($id){

        $kelas=Kelas::find($id);
        $tugas=Tugas::all();
        return view('tugas.lihat',compact('tugas', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //
        $user = User::find($id);
        $kelas= Kelas::find($id);
        $tugas = new Tugas();
        // $request->validate([
        //     'kelas_id'=> 'required',
        //     'nama_tugas' => 'required',
        //     'deskripsi' => 'required',
        //     //'file_tugas' => 'file|image|mimes: doc,docx,jpeg,pdf,JPG,png,svg',
        //     'deadline'=> 'required'    
        // ]); 
        if ($request->file('file_tugas') != null ){
            $tempat_upload = public_path('/file');
            $file = $request->file('file_tugas');
            $ext = $file->getClientOriginalExtension();
            $namafile= $file->getClientOriginalName();
            $filename = $namafile;
            $file->move($tempat_upload, $filename);
            $tugas->file_tugas = $filename;
        }
        

        $tugas->kelas_id = $request->kelas_id; 
        $tugas->nama_tugas = $request->nama_tugas;
        $tugas->deskripsi = $request->deskripsi;
      
        $tugas->deadline = $request->deadline;
        $tugas->save();
        return redirect('/kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
