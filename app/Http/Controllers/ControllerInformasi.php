<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use DB;
class ControllerInformasi extends Controller
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
            $informasi= DB::table('informasi')
                ->get();
            return view('Informasi',compact('informasi'));
        }

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
    public function edit($id_informasi)
    {
        $Informasi = \App\ModelInformasi::findOrFail($id_informasi);
        return view('InformasiUpdate',compact('Informasi'));
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
        $Catering = \App\ModelInformasi::findOrFail($id_catering);
        if (empty($request->file('logo'))){
            $Catering->logo= $Catering->logo;
        }
        else{
            unlink('assets/images/upload/catering/logo/'.$Catering->logo); //menghapus file lama
            $logo= $request->file('logo');
            $ext = $logo->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $logo->move('assets/images/upload/catering/logo/',$newName);
            $Catering->logo= $newName;
        }
        $nama_perusahaan = $request->input('nama_perusahaan');
        $alamat = $request->input('alamat');
        $telepon = $request->input('telepon');
        $hp = $request->input('hp');
        $website = $request->input('website');
        $email1 = $request->input('email1');
        $email2 = $request->input('email2');
        $alamat2 = $request->input('alamat2');
        $longtitude = $request->input('longtitude');
        $latitude = $request->input('latitude');
        $about = $request->input('about');

        $Catering-> nama_perusahaan = $nama_perusahaan;
        $Catering-> alamat = $alamat;
        $Catering-> telepon = $telepon;
        $Catering-> hp = $hp;
        $Catering-> website = $website;
        $Catering-> email1 = $email1;
        $Catering-> email2 = $email2;
        $Catering-> alamat2 = $alamat2;
        $Catering-> longtitude = $longtitude;
        $Catering-> latitude = $latitude;
        $Catering-> about = $about;
        $Catering->save();
        return redirect()->route('informasi.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_informasi)
    {

    }
}
