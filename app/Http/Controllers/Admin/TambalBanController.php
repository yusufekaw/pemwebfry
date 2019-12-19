<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TambalBan;
use App\SaranTambalBan;
use App\JamOperasional;
use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;
use File;
use Auth;

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
        $sarantambalban = SaranTambalBan::all();
        $data['sarantambalban'] = $sarantambalban;
        $data['sarantambalbanhitung'] = $sarantambalban->count('id_tambal_ban');
        //cari id user login
        $id_user = Auth::user()->id_user;
        //cari hak akses user login
        $role = Auth::user()->role;
        //judul halaman
        $data['judul'] = 'semua tambal ban';
        //inisialisasi awal data tambalban
        $data['tambalban'] = null;
        //hak akses view tambal ban
        //jika user login = tambalban
        if($role=='tambalban')
        {
            //data tambal ban berdasarkan relasi user
            $data['tambalban'] = TambalBan::where('id_user',$id_user)->get();
        }
        else
        {            
            //user admin dan superadmin manmpilkan semua data tambal ban
            $data['tambalban'] = TambalBan::all();
        }

        return view('admin.tambalban.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //]
        $sarantambalban = SaranTambalBan::all();
       
        $data = [
            'sarantambalban' => $sarantambalban,
            'sarantambalbanhitung' => $sarantambalban->count('id_tambal_ban'),
            'tambalban' => TambalBan::all(), 
            'judul' => 'Tambah Tambal Ban', 
        ];

        return view('admin.tambalban.tambah', compact('data'));
    }

    public function create2($id)
    {
        //]
        $sarantambalban = SaranTambalBan::all();
       
        $data = [
            'sarantambalban' => $sarantambalban,
            'sarantambalbanverifikasi' => SaranTambalBan::find($id),
            'sarantambalbanhitung' => $sarantambalban->count('id_tambal_ban'),
            'tambalban' => TambalBan::all(), 
            'judul' => 'Tambah Tambal Ban', 
        ];

        return view('admin.tambalban.tambah2', compact('data'));
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

        File::makeDirectory('img/tambalban/'.$id_tambal_ban.'/', 0777, true, true);

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'foto' => 'required|file|image|max:3000',
            'deskripsi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        //file upload
        $img = $request->file('foto');
        $extension = $img->getClientOriginalExtension();  
        $destinationpath = 'img/tambalban/'.$id_tambal_ban.'/';
        $img_name = $id_tambal_ban.'.'.$extension;
        //resize gambar
        $image_resize = Image::make($img->getRealPath());              
        $image_resize->resize(300, 300);
        $image_resize->save(public_path($destinationpath.''.$img_name));

        TambalBan::create([
            'id_tambal_ban' => $id_tambal_ban,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'foto' => $destinationpath.''.$img_name,
            'deskripsi' => $request->deskripsi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'id_user' => Auth::user()->id_user
        ]);

        return redirect()->route('admin/tambalban')->with('sukses', 'Berhasil menambahkan data baru!');
    }

    public function store2(Request $request)
    {
        //
        $id_tambal_ban = 'tb'.crc32(date('ymdhis'));

        File::makeDirectory('img/tambalban/'.$id_tambal_ban.'/', 0777, true, true);

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'foto' => 'required|file|image|max:3000',
            'deskripsi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        //file upload
        $img = $request->file('foto');
        $extension = $img->getClientOriginalExtension();  
        $destinationpath = 'img/tambalban/'.$id_tambal_ban.'/';
        $img_name = $id_tambal_ban.'.'.$extension;
        //resize gambar
        $image_resize = Image::make($img->getRealPath());              
        $image_resize->resize(300, 300);
        $image_resize->save(public_path($destinationpath.''.$img_name));

        TambalBan::create([
            'id_tambal_ban' => $id_tambal_ban,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'foto' => $destinationpath.''.$img_name,
            'deskripsi' => $request->deskripsi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'id_user' => Auth::user()->id_user
        ]);

        $sarantambalban = SaranTambalBan::find($request->id_saran_tambal_ban);
        $sarantambalban->delete();

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
        $sarantambalban = SaranTambalBan::all();
        $tambalban = TambalBan::find($id);
        $tambalbanall = TambalBan::all();
        $data = [
            'tambalban' => $tambalban,
            'sarantambalban' => $sarantambalban,
            'sarantambalbanhitung' => $sarantambalban->count('id_tambal_ban'),
            'tambalbanall' => json_encode($tambalbanall),
            'judul' => 'Detail '.$tambalban->nama,
            'jam_operasional' => JamOperasional::where('id_tambal_ban',$id)->orderBy('order', 'asc')->orderBy('jam_buka','asc')->get(),
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
        $sarantambalban = SaranTambalBan::all();
        $tambalban = TambalBan::find($id);
        $data = [
            $sarantambalban => $sarantambalban,
            $sarantambalbanhitung => $sarantambalban->count('id_tambal_ban'),
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
        
         $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'deskripsi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $tambalban->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'deskripsi' => $request->deskripsi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        $links = session()->has('links') ? session('links') : [];
        $currentLink = request()->path(); // Getting current URI like 'category/books/'
        array_unshift($links, $currentLink); // Putting it in the beginning of links array
        session(['links' => $links]);
        
        return redirect('admin/tambalban')->with('sukses', 'Berhasil meperbarui data!');
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

    public function update_foto(Request $request)
    {
        $id_tambal_ban = $request->id_tambal_ban;

        File::makeDirectory('img/tambalban/'.$id_tambal_ban.'/', 0777, true, true);

        //file upload
        $img = $request->file('foto');
        $extension = $img->getClientOriginalExtension();  
        $destinationpath = 'img/tambalban/'.$id_tambal_ban.'/';
        $img_name = $id_tambal_ban.'.'.$extension;
        //resize gambar
        $image_resize = Image::make($img->getRealPath());              
        $image_resize->resize(300, 300);
        $image_resize->save(public_path($destinationpath.''.$img_name));

        $tambalban = TambalBan::find($id_tambal_ban);
        $tambalban->update([
            'foto' => $destinationpath.''.$img_name,
        ]);

        return redirect('admin/tambalban/detail/'.$id_tambal_ban)->with('sukses', 'Foto Berhasil diganti');
    }
}
