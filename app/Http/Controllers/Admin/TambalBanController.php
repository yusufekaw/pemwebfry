<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TambalBan;
use Illuminate\Http\Request;

class TambalBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $data = [
            'tambalban' => TambalBan::all(), 
            'judul' => 'Semua Tambal Ban', 
        ];

        return view('admin.tambalban.index', compact('data'));
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
        $id_tambal_ban = 'tb'.crc32(date('ymdhis'));

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'deskripsi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        TambalBan::create([
            'id_tambal_ban' => $id_tambal_ban,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'deskripsi' => $request->deskripsi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return redirect()->route('admin/tambalban')->with('sukses', 'Berhasil menambahkan data baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TambalBan  $tambalBan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tambalban = TambalBan::find($id);
        $data = [
            'tambalban' => $tambalban,
            'judul' => 'Detail '.$tambalban->nama
        ];
        return view('admin/tambalban/detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TambalBan  $tambalBan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tambalban = TambalBan::find($id);
        $data = [
            'tambalban' => $tambalban,
            'judul' => 'Sunting '.$tambalban->id_tambal_ban
        ];
        return view('admin/tambalban/sunting', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TambalBan  $tambalBan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $tambalban = TambalBan::find($id);
        $tambalban->update($request->all());
        return redirect()->route('admin/tambalban')->with('sukses', 'Berhasil meperbarui data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TambalBan  $tambalBan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tambalban = TambalBan::find($id);
        $tambalban->delete();
        return redirect()->route('admin/tambalban')->with('sukses', 'Berhasil menghapus data!'); 
    }
}
