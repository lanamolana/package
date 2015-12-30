<?php

namespace Lana\Peminjaman\Entity\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{	
	protected $table = "mahasiswa";
    public $timestamps = false;
	protected $guarded = array("id");

	public function buku()
	{
		return $this->belongsToMany("Lana\Peminjaman\Entity\Eloquent\Buku", "peminjaman");
	}

}
