<?php

namespace App\Http\Controllers;

use App\TambalBan;
use App\SaranTambalBan;
use Illuminate\Http\Request;
use Haversine;
use DB;
use Captcha;

class WebController extends Controller
{
    public function depan()
    {
        
        return view('web.index');
    }

    public function peta(Request $request)
    {
        $latitude_user = $data['latitude_user'] = $request->latitude;
        $longitude_user = $data['longitude_user'] = $request->longitude;
        $data['tambalban'] = Tambalban::select(DB::raw("tambal_bans.*,( 6371 * acos( cos( radians($latitude_user) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($longitude_user) ) + sin( radians($latitude_user) ) * sin( radians( latitude ) ) ) ) AS jarak, latitude, longitude, nama, deskripsi, telp, foto"))
                ->orderBy('jarak', 'asc')
                ->get();
        return view('web.peta', compact('data'));

    }

    public function test(Request $request)
    {
        $latitude_user = $data['latitude_user'] = $request->latitude;
        $longitude_user = $data['longitude_user'] = $request->longitude;
        $data['tambalban'] = Tambalban::select(DB::raw("tambal_bans.*,( 6371 * acos( cos( radians($latitude_user) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($longitude_user) ) + sin( radians($latitude_user) ) * sin( radians( latitude ) ) ) ) AS jarak, latitude, longitude, nama, deskripsi, telp, foto"))
                ->orderBy('jarak', 'asc')
                ->get();
        return view('web.peta', compact('data'));
    }
    public function daftarlokasi(Request $request)
    {
        $latitude_user = $data['latitude_user'] = $request->latitude;
        $longitude_user = $data['longitude_user'] = $request->longitude;
        $data['tambalban'] = Tambalban::select(DB::raw("tambal_bans.*,( 6371 * acos( cos( radians($latitude_user) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($longitude_user) ) + sin( radians($latitude_user) ) * sin( radians( latitude ) ) ) ) AS jarak, latitude, longitude, nama, deskripsi, telp, foto"))
                ->orderBy('jarak', 'asc')
                ->get();
        return view('web.daftarlokasi', compact('data'));
    }

    public function cari(Request $request)
    {
	// menangkap data pencarian
	   $cari = $request->keyword;
       $latitude_user = $data['latitude_user'] = $request->latitude;
       $longitude_user = $data['longitude_user'] = $request->longitude;
       $data['tambalban'] = TambalBan::where('nama','like',"%".$cari."%")
       ->orwhere('alamat','like',"%".$cari."%")
       ->get();
    	// mengirim data peta ke view pencarian
	   return view('web.daftarlokasi',compact('data'));
    }  

    public function saran(Request $request)
    {
        $latitude_user = $data['latitude_user'] = $request->latitude;
        $longitude_user = $data['longitude_user'] = $request->longitude;
        return view('web.saranlokasi',compact('data'));
    }

    public function simpansaran(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'captcha' => 'required|captcha'
        ]);
        SaranTambalBan::create([
            'id_tambal_ban' => 'tb'.crc32(date('ymdhis')),
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        return redirect('saran-lokasi?latitude='.$request->latitude_user.'&longitude='.$request->latitude_user)->with('sukses', 'saran kamu kami terima, sesegera mungkin petugas tambal ban kami akan memverifikasi lokasimu');
    }

    public function refreshcaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }   

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TambalBan  $tambalBan
     * @return \Illuminate\Http\Response
     */
    public function show(TambalBan $tambalBan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TambalBan  $tambalBan
     * @return \Illuminate\Http\Response
     */
    public function edit(TambalBan $tambalBan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TambalBan  $tambalBan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TambalBan $tambalBan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TambalBan  $tambalBan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TambalBan $tambalBan)
    {
        //
    }
}
