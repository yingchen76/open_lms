<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugas;
use App\Kelas;
use App\User;

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
        $s = User::all();
        return view('tugas.index', compact('kelas'));
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
        $request->validate([
            'id_kelas'=> 'required',
            'nama_tugas' => 'required',
            'deskripsi' => 'required',
            // 'file_tugas' => 'image|mimes: docx, doc, jpg, png, rtf, zip, rar, pdf',
            'deadline'=> 'required'
            
        ]);

        $tempat_upload = public_path("/file");
        $file = $request->file('file_tugas');
        $ext = $file->getClientOriginalExtension();
        $timestamp = now()->timestamp;
        $filename = $timestamp . "_" . $tugas->id_kelas . "." . $ext;
        $file->move($tempat_upload, $filename);
        

        $tugas->kelas_id=$request->id_kelas; 
        $tugas->nama_tugas=$request->nama_tugas;
        $tugas->deskripsi=$request->deskripsi;
        $tugas->file_tugas=$filename;
        $tugas->deadline=$request->deadline;
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
