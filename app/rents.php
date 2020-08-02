<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class rents extends Model
{
    use Notifiable;
    protected $fillable = [
        'nama', 'telp', 'jenis', 'harga', 'tglbayar', 'jam', 'tglpesan'
    ];
}
