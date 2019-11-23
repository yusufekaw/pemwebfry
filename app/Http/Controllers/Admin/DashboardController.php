<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\TambalBan;

use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use File;
use Auth;
use Day;

class DashboardController extends Controller
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
        //
        $data['rata_latitude'] = 0;
        $data['rata_longitude'] = 0;
        //cari id user login
        $id_user = Auth::user()->id_user;
        //cari hak akses user login
        $role = Auth::user()->role;
        //judul halaman
        $data['judul'] = 'Dashboard Admin';
        //inisialisasi awal data tambalban
        $data['tambalban'] = null;
        //hak akses view tambal ban
        //jika user login = tambalban
        if($role=='tambalban')
        {
            //data tambal ban berdasarkan relasi user
            $tambalban_cari = TambalBan::where('id_user',$id_user);
            $tambalban_hasil = $tambalban_cari->get();
            $tambalban_hitung = $tambalban_cari->count('id_user');
            $jumlah_latitude = $tambalban_cari->sum('latitude');
            $jumlah_longitude = $tambalban_cari->sum('longitude');
            $data['rata_latitude'] = $jumlah_latitude / $tambalban_hitung;
            $data['rata_longitude'] = $jumlah_longitude / $tambalban_hitung;
            $data['tambalban'] = json_encode($tambalban_hasil);
        }
        else
        {            
            //user admin dan superadmin manmpilkan semua data tambal ban
            $tambalban_cari = TambalBan::all();
            $tambalban_hitung = $tambalban_cari->count('id_user');
            $jumlah_latitude = $tambalban_cari->sum('latitude');
            $jumlah_longitude = $tambalban_cari->sum('longitude');
            $data['rata_latitude'] = $jumlah_latitude / $tambalban_hitung;
            $data['rata_longitude'] = $jumlah_longitude / $tambalban_hitung;
            $data['tambalban'] = json_encode($tambalban_cari);
        }
        return view('admin.index', compact('data'));
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
