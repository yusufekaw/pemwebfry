<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\JamOperasional;
use Illuminate\Http\Request;

use Day;

class JamOperasionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $id_jam_operasional = 'jo'.crc32(date('ymdhis'));

        $this->validate($request, [
            'hari' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'id_tambal_ban' => 'required'
        ]);

        JamOperasional::create([
            'id_jam_operasional' => $id_jam_operasional,
            'hari' => $request->hari,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'order' => Day::day_order($request->hari),
            'id_tambal_ban' => $request->id_tambal_ban,
        ]);

        return redirect('admin/tambalban/detail/'.$request->id_tambal_ban)->with('sukses', 'Jam Operasional berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JamOperasional  $jamOperasional
     * @return \Illuminate\Http\Response
     */
    public function show(JamOperasional $jamOperasional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JamOperasional  $jamOperasional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [
            'judul' => 'Sunting jam operasional ',
            'jam_operasional' => JamOperasional::where('id_tambal_ban',$id)->get()
        ];
        return view('admin.tambalban.jam_operasional.sunting', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JamOperasional  $jamOperasional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id_tambal_ban_redirect = $request->id_tambal_ban;
        $data = $request->all(); 
        foreach ($request->id_tambal_ban as $key => $value)
        {
            $id_jam_operasional = $data['id_jam_operasional'][$key];
            $id_tambal_ban = $data['id_tambal_ban'][$key];
            $hari = $data['hari'][$key];
            $jam_buka = $data['jam_buka'][$key];
            $jam_tutup = $data['jam_tutup'][$key];
            $jam_operasional = JamOperasional::find($id_jam_operasional);
            $jam_operasional->update([
                'hari' => $hari,
                'jam_buka' => $jam_buka,  
                'jam_tutup' => $jam_tutup,  
            ]);    
        }
        /*foreach ($request->id_tambal_ban as $key => $value)
        {
            echo $data['id_jam_operasional'][$key];
        }*/

        //return $request->all();
        return redirect('admin/tambalban/detail/'.$id_tambal_ban)->with('sukses', 'Jam Operasional berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JamOperasional  $jamOperasional
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $jamoperasional = JamOperasional::find($id);
        $jamoperasional->delete();
        return back()->with('sukses', 'Jam Operasional berhasil dihapus');
    }
}
