<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaranTambalBan extends Model
{
    //
    public $incrementing = false;
    protected $primaryKey = 'id_tambal_ban';

    protected $fillable = [
        'id_tambal_ban',  'alamat', 'latitude', 'longitude', 'id_user'
    ]; 
}
