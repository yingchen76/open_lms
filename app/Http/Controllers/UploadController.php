<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugas;
use App\Kelas;
use App\User;
use App\Upload;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $tugas= Tugas::find($id);
        return view('tugas.upload',compact('tugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
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
        //$user= User::all();
        // $tugas= Tugas::find($id);
        $tugas = new Upload();
        // $request->validate([
        //     'tugas_id'=> 'required',
        //     'user_id' => 'required',
        // ]);
        $tempat_upload = public_path('/uploadx');
        $file = $request->file('file_tugas');
        $ext = $file->getClientOriginalExtension();
        $namafile= $file->getClientOriginalName();

        $file->move($tempat_upload, $namafile);
        

        $tugas->tugas_id = $request->tugas_id; 
        $tugas->user_id = $request->user_id;
        $tugas->file_tugas = $namafile;
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
