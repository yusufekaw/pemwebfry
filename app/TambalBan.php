<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TambalBan extends Model
{
    //
    public $incrementing = false;
    protected $primaryKey = 'id_tambal_ban';

    protected $fillable = [
        'nama', 'alamat', 'telp', 'deskripsi', 'latitude', 'longitude'
    ]; 
}
