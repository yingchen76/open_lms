<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Murid;
use App\Kelas;
use App\Tugas;
use App\User;
use Session;
use DB;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $murid= Murid::all();
        return view('murid.index',compact('murid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        // Session::put('kls_id',$id);
        $murid=Murid::all();
        $kelas = Kelas::find($id);
        return view ('murid.create', compact('kelas','murid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function valdation (Request $request, $id){
        Session::put('kls_id',$id);
        $kelas = Kelas::find($id);
        $email = $request->email;
        $user = User::all();
        return view('murid.validation', compact('user','kelas'));
    }
    public function store(Request $request, $id)
    {
        $m = new Murid();
        $ids = Session::get('kls_id',$id);
        $user = User::all();
        $user_id = User::select('id')->where('email', $request->email);
        $request->validate([
            'kelas_id' => 'required',
            'user_id' => 'required'            
        ]);
                  
            $m->kelas_id = $request->kelas_id; 
            $m->user_id = $user_id; 
            $m->save();
            
            return redirect('kelas/$ids');
        
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
