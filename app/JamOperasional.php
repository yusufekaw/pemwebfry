<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JamOperasional extends Model
{
    //
    public $incrementing = false;
    protected $primaryKey = 'id_jam_operasional';

    protected $fillable = [
        'id_jam_operasional', 'hari', 'jam_buka', 'jam_tutup', 'order', 'id_tambal_ban'
    ]; 
}
