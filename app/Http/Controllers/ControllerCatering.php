<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use DB;
class ControllerCatering extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            $catering = DB::table('catering')
                ->orderBy('isAktif','asc')
                ->get();
            return view('Catering',compact('catering'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CateringStore');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:4',
            'gambar' => 'required',
            'deskripsi' => 'required',
            'deskripsi_lengkap' => 'required',
            'foto' => 'required'
        ]);
        $Catering = new \App\ModelCatering();
        $judul = $request->input('judul');
        $gambar =$request->file('gambar');
        $deskripsi = $request->input('deskripsi');
        $deskripsi_lengkap = $request->input('deskripsi_lengkap');
        $foto =$request->file('foto');

        $Catering-> judul = $judul;
        $ext = $gambar->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $gambar->move('assets\images\upload\catering\gambar',$newName);
        $Catering->gambar= $newName;
        $Catering-> deskripsi = $deskripsi;
        $Catering -> deskripsi_lengkap = $deskripsi_lengkap;
        $ext = $foto->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $foto->move('assets\images\upload\catering\foto',$newName);
        $Catering->foto = $newName;
        $Catering->save();
        return redirect()->route('catering.index')->with('alert-success','Berhasil Menambahkan Data!');
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
    public function edit($id_catering)
    {
        $Catering = \App\ModelCatering::findOrFail($id_catering);
        return view('CateringUpdate',compact('Catering'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_catering)
    {
        $Catering = \App\ModelCatering::findOrFail($id_catering);
        $judul = $request->input('judul');
        if (empty($request->file('gambar'))){
            $Catering->gambar = $Catering->gambar;
        }
        else{
            unlink('assets/images/upload/catering/gambar/'.$Catering->gambar); //menghapus file lama
            $gambar= $request->file('gambar');
            $ext = $gambar->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar->move('assets/images/upload/catering/gambar',$newName);
            $Catering->gambar = $newName;
        };
        if (empty($request->file('foto'))){
            $Catering->foto = $Catering->foto;
        }
        else{
            unlink('assets/images/upload/catering/foto'.$Catering->foto); //menghapus file lama
            $foto= $request->file('foto');
            $ext = $foto->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $foto ->move('assets/images/upload/catering/foto',$newName);
            $Catering->foto = $newName;
        };
        $deskripsi = $request->input('deskripsi');
        $deskripsi_lengkap = $request->input('deskripsi_lengkap');

        $Catering-> judul = $judul;
        $Catering-> deskripsi = $deskripsi;
        $Catering -> deskripsi_lengkap = $deskripsi_lengkap;
        $Catering->save();
        return redirect()->route('catering.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id_catering)
    {
        if (Input::get('Aktif'))
        {

            if (DB::table('catering')->where('id_catering',$id_catering)->where('isAktif',1)->update([
                'isAktif' => 2
            ]));
            elseif (DB::table('catering')->where('id_catering',$id_catering)->where('isAktif',2)->update([
                'isAktif' => 1
            ]));
        }
        elseif (Input::get('Hapus'))
        {
            DB::table('catering')->where('id_catering',$id_catering)->update([
                'judul' => '', 'gambar' => 'default.jpg','deskripsi'=>'' , 'deskripsi_lengkap' => '' , 'foto' => 'default.jpg' , 'isAktif' => 2
            ]);
        }
        return redirect()->route('catering.index')->with('alert-success','Berhasil Menambahkan Data!');
    }
}
