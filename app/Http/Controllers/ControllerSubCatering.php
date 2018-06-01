<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use DB;
class ControllerSubCatering extends Controller
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
            $subcatering = DB::table('subcatering')
                ->orderBy('isAktif','asc')
                ->get();
            return view('SubCatering',compact('subcatering'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcatering = DB::table('catering')
            ->orderBy('isAktif','asc')
            ->get();
        return view('SubCateringStore',compact('subcatering'));
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
            'id_catering' => 'required',
            'judul' => 'required|min:4',
            'gambar' => 'required',
            'deskripsi' => 'required',
        ]);
        $SubCatering = new \App\ModelSubCatering();
        $id_catering = $request->input('id_catering');
        $judul = $request->input('judul');
        $gambar =$request->file('gambar');
        $deskripsi = $request->input('deskripsi');

        $SubCatering -> id_catering = $id_catering;
        $SubCatering-> judul = $judul;
        $ext = $gambar->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $gambar->move('assets\images\upload\catering\gambarsub',$newName);
        $SubCatering->gambar= $newName;
        $SubCatering-> deskripsi = $deskripsi;
        $SubCatering->save();
        return redirect()->route('subcatering.index')->with('alert-success','Berhasil Menambahkan Data!');
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
    public function edit($id_subcatering)
    {
        $SubCatering1 = DB::table('subcatering')->where('id_subcatering',$id_subcatering)
            ->join('catering','subcatering.id_catering', '=', 'catering.id_catering')
            ->select('subcatering.*','catering.id_catering','catering.judul')
            ->get();

        $SubCatering = \App\ModelSubCatering::findOrFail($id_subcatering);
        return view('SubCateringUpdate',compact('SubCatering','SubCatering1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_subcatering)
    {
        $SubCatering = \App\ModelSubCatering::findOrFail($id_subcatering);
        $id_catering = $request->input('id_catering');
        $judul = $request->input('judul');
        if (empty($request->file('gambar'))){
            $SubCatering->gambar = $SubCatering->gambar;
        }
        else{
            unlink('assets/images/upload/catering/gambarsub/'.$SubCatering->gambar); //menghapus file lama
            $gambar= $request->file('gambar');
            $ext = $gambar->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar->move('assets/images/upload/catering/gambarsub',$newName);
            $SubCatering->gambar = $newName;
        };
        $deskripsi = $request->input('deskripsi');

        $SubCatering-> id_catering = $id_catering;
        $SubCatering-> judul = $judul;
        $SubCatering-> deskripsi = $deskripsi;
        $SubCatering->save();
        return redirect()->route('subcatering.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_subcatering)
    {
        if (Input::get('Aktif'))
        {

            if (DB::table('subcatering')->where('id_subcatering',$id_subcatering)->where('isAktif',1)->update([
                'isAktif' => 2
            ]));
            elseif (DB::table('subcatering')->where('id_subcatering',$id_subcatering)->where('isAktif',2)->update([
                'isAktif' => 1
            ]));
        }
        elseif (Input::get('Hapus'))
        {
            DB::table('subcatering')->where('id_subcatering',$id_subcatering)->update([
                'judul' => '', 'gambar' => 'default.jpg','deskripsi'=>'' , 'isAktif' => 2
            ]);
        }
        return redirect()->route('subcatering.index')->with('alert-success','Berhasil Menambahkan Data!');
    }
}
