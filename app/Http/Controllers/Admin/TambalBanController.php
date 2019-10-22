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
        $tambal_ban_all = TambalBan::all(); 
        $title = "test";
        return view('admin.tambalban.index', compact('tambal_ban_all','title'));
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
