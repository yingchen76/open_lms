<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Kelas;
use Session;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $kelas = Kelas::all();
        $profile = User::all();
        return view('profile.index',compact('profile', 'kelas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexlihat($id){
        $user = User::find($id);
        return view('Profile.lihat', compact('user'));

    }
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
    public function store(Request $request)
    {
        //
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
        $user= User::find($id);
        return view('profile.edit', compact('user'));
    }
    public function editakun($id)
    {
        $user = User::find($id);
        return view('Profile.editakun', compact('user'));
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
        $user = User::find($id);
        if($request->hasFile('profile_picture')){
            if ($request->file('profile_picture') != null){
                $tempat_upload = public_path('/user_picture');
                $file = $request->file('profile_picture');
                $ext = $file->getClientOriginalExtension();
                $namafile= $file->getClientOriginalName();
                $filename = $namafile;
                $file->move($tempat_upload, $filename);
                $user->profile_picture = $filename;
            }
        }

        $user->name = $request->name;
        $user->nickname = $request->nickname;
        $user->telepon = $request->telepon;
        $user->deskripsi = $request->deskripsi;
        $user->lokasi = $request->lokasi;
        $user->save();
        return redirect('/profile');
    }
    public function updateakun(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/profile');

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
