<?php

namespace App\Http\Controllers;

use App\TambalBan;
use Illuminate\Http\Request;
use Haversine;
use DB;


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
        /*$datass = [];
        $datas = array();
        $datas['nama'] = [];
        $datas['jarak'] = [];
        $lat = $data['latitude'] = $request->latitude;
        $lon = $data['longitude'] = $request->longitude;

        $tambalban = $data['tambalban'] = Tambalban::select(DB::raw("tambal_bans.*,( 6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS jarak"))
                ->orderBy('jarak', 'asc')
                ->get();
        return $tambalban;
        //$tambalban = TambalBan::all();

        /*foreach($tambalban as $tambalban)
        {
            $datas['nama'][] = $tambalban->nama;
            $datas['jarak'][] = Haversine::distance($lat,$lon, $tambalban->latitude, $tambalban->longitude);
            $datass[] = Tambalban::select(DB::Raw('nama', Haversine::distance($lat,$lon, $tambalban->latitude, $tambalban->longitude).' as jarak'))->get();
        }*/

        /*$tambalban = Tambalban::all();
        $count = $tambalban->count();

        return $count;

        //$tambalbans = $data['tambalban'] = json_encode($datas);
        //print_r( $tambalbans);

        /*$tambalban_cari = TambalBan::all();
        $tambalban_hitung = $tambalban_cari->count('id_user');
        $jumlah_latitude = $tambalban_cari->sum('latitude');
        $jumlah_longitude = $tambalban_cari->sum('longitude');
        
        $data['rata_latitude'] = $jumlah_latitude / $tambalban_hitung;
        $data['rata_longitude'] = $jumlah_longitude / $tambalban_hitung;*/

        //$tambalban = TambalBan::select('nama',Haversine::distance($lat, $lon, .'latitude'., .'longitude'.).' as jarak')
                                //->orderBy('jarak')->get();

        //$tambalban = TambalBan::select(DB::Raw('nama Haversine::distance($lat, $lon, latitude, longitude) as jarak'))->get();

        /*$tambalban = DB::select("nama, $lat, $lon, latitude, longitude) as jarak");
        $data['tambalban'] = json_encode($tambalban);*/

        /*echo $lat*0.0174532925;
        echo "<br>";
        echo $lon*0.0174532925;
        echo "<br>";
        echo Haversine::lat_radian($lat);
        echo "<br>";
        echo Haversine::lon_radian($lon);
        echo "<br>";
        echo Haversine::lat_radian(0.1028352);
        echo "<br>";
        echo Haversine::lon_radian(111.5386324);
        echo "<br>";
        echo Haversine::distance(-7.2810505,112.811995, $lat, $lon); */
        //return $jarak;
        //return $data['tambalban'];
        //return view('web.peta', compact('data'));
    }

    public function test(Request $request)
    {
        //return $request->all();
        $latitude_user = $data['latitude_user'] = $request->latitude;
        $longitude_user = $data['longitude_user'] = $request->longitude;
        $data['tambalban'] = Tambalban::select(DB::raw("tambal_bans.*,( 6371 * acos( cos( radians($latitude_user) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($longitude_user) ) + sin( radians($latitude_user) ) * sin( radians( latitude ) ) ) ) AS jarak, latitude, longitude, nama, deskripsi, telp, foto"))
                ->orderBy('jarak', 'asc')
                ->get();
        return view('web.peta', compact('data'));
    }
    public function daftarlokasi(Request $request)
    {
        // $peta= TambalBan::all();
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
	$cari = $request->cari;
 	
	$peta = DB::table('tambal_bans')
    ->where('nama','like',"%".$cari."%")
    ->orwhere('alamat','like',"%".$cari."%")
	->paginate();
    	// mengirim data peta ke view pencarian
	return view('web.daftarpeta',['peta' => $peta]);
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
