<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TambalBan extends Model
{
    //
    public $incrementing = false;
    protected $primaryKey = 'id_tambal_ban';

    protected $fillable = [
        'id_tambal_ban','nama', 'alamat', 'telp', 'foto' ,'deskripsi', 'latitude', 'longitude', 'id_user'
    ]; 
}
