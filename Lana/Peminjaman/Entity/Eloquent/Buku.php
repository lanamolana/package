<?php
namespace Lana\Peminjaman\Entity\Eloquent;
use Illuminate\Database\Eloquent\Model;
Class Buku extends Model
{
	protected $table="buku";
	public $timestamps=false;
	public $guarded=array('id');

	function mahasiswa()
	{
		return $this->belongsToMany("Lana\Peminjaman\Entity\Eloquent\Mahasiswa", "peminjaman");
	}

}