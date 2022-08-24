<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Silsilah extends Model
{

    public $timestamps = false;

	protected $table = 'silsilah';
	
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'jenis_kelamin', 'id_orang_tua'
    ];
}