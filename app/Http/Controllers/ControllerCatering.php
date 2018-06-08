<?php

namespace App\Http\Controllers;

use App\ModelCatering;
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
        ]);
        $Catering = new \App\ModelCatering();
        $judul = $request->input('judul');
        $gambar =$request->file('gambar');
        $deskripsi = $request->input('deskripsi');
        $deskripsi_lengkap = $request->input('deskripsi_lengkap');

        $Catering-> judul = $judul;
        $ext = $gambar->getClientOriginalExtension();
        $newName = date('Ymd_his').Session::get('id_admin').".".$ext;
        $gambar->move('dtc_profile/uploads/catering',$newName);
        $Catering->gambar= $newName;
        $Catering-> deskripsi = $deskripsi;
        $Catering -> deskripsi_lengkap = $deskripsi_lengkap;
        $Catering->save();
        return redirect()->route('catering.index')->with('alert-success','Success insert data!');
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
            unlink('dtc_profile/uploads/catering/'.$Catering->gambar); //menghapus file lama
            $gambar= $request->file('gambar');
            $ext = $gambar->getClientOriginalExtension();
            $newName = date('Ymd_his').Session::get('id_admin').".".$ext;
            $gambar->move('dtc_profile/uploads/catering/',$newName);
            $Catering->gambar = $newName;
        };
        $deskripsi = $request->input('deskripsi');
        $deskripsi_lengkap = $request->input('deskripsi_lengkap');
        $Catering-> judul = $judul;
        $Catering-> deskripsi = $deskripsi;
        $Catering -> deskripsi_lengkap = $deskripsi_lengkap;
        $Catering->save();
        return redirect()->route('catering.index')->with('alert-success','Success update data!');
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

		try
            {
                $data = ModelCatering::where('id_catering',$id_catering)->first();
            		$data->delete();
            		unlink('dtc_profile/uploads/catering/'.$data->gambar);
                return redirect()->route('catering.index')->with('alert-success','Success delete data!');
            }
            catch (\Exception $e)
            {
                return redirect()->route('catering.index')->with('alert-warning','Delete SubCatering first');
            }
            
        }
	        return redirect()->route('catering.index')->with('alert-success','Success delete data!');
    }
}
