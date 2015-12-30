<?php
namespace Lana\Peminjaman\Http\Controllers;
use Lana\Peminjaman\Entity\Eloquent\Mahasiswa;
use Lana\Peminjaman\Entity\Eloquent\Buku;

use Illuminate\Http\Request;
use Lana\Peminjaman\Http\Requests\RegisterMhsRequest;
use Lana\Peminjaman\Http\Requests\EditMhsRequest;
use App\Http\Controllers\Controller;

class MhsController extends Controller
{
    public function create()
    {
        $mahasiswa= new Mahasiswa;
        return view("LanaPeminjaman::mahasiswa/form-regMhs")
        ->with("url",url("/mhs/store"))
        ->with("mahasiswa",$mahasiswa)
        ;
    }

    public function store(RegisterMhsRequest $request)
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nama      =$_POST['nama'];
        $mahasiswa->nim       =$_POST['nim'];
        $mahasiswa->tgl_lahir =$_POST['tgl_lahir'];
        $mahasiswa->alamat    =$_POST['alamat'];
        $mahasiswa->fakultas  =$_POST['fakultas'];
        $mahasiswa->prodi     =$_POST['prodi'];
        $mahasiswa->email     =$_POST['email'];
        $mahasiswa->telp      =$_POST['telp'];
        $mahasiswa->save();
        return redirect(url("/registered"));
    }

    public function index()
    {   
        return view("LanaPeminjaman::mahasiswa.index", ['mahasiswa'=>Mahasiswa::all()]);
    }

    public function show($id)
    {
       $mahasiswa=Mahasiswa::find($id);
        return view("LanaPeminjaman::mahasiswa.show", array("mahasiswa"=>$mahasiswa));
    }

     public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view("LanaPeminjaman::mahasiswa/form-edit")
        ->with("url",url("/members/$id/update"))
        ->with("mahasiswa",$mahasiswa)
        ;
    }

    public function update(EditMhsRequest $request,$id)
    {
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->nama      =$_POST['nama'];
        $mahasiswa->tgl_lahir =$_POST['tgl_lahir'];
        $mahasiswa->alamat    =$_POST['alamat'];
        $mahasiswa->fakultas  =$_POST['fakultas'];
        $mahasiswa->prodi     =$_POST['prodi'];
        $mahasiswa->email     =$_POST['email'];
        $mahasiswa->telp      =$_POST['telp'];
        $mahasiswa->save();
        return redirect(url("/members"));
    }

    public function delete($id)
    {
        mahasiswa::destroy($id);
        return redirect(url("/members"));
    }

    public function pinjam($id){
        $mahasiswa = Mahasiswa::find($id);
        $list_buku = Buku::all();
        return view("LanaPeminjaman::mahasiswa/form-pinjam")
        ->with("url",url("/members/$id/prosespinjam"))
        ->with("mahasiswa",$mahasiswa)
        ->with("list_buku", $list_buku)
        ;
    }

    public function prosesPinjam($id) {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->wkt_pinjam=new \DateTime;
        $mahasiswa->tgl_balik=$_POST['tgl_balik'];
        $mahasiswa->save();
        if(isset($_POST['buku']))
            $mahasiswa->buku()->sync($_POST['buku']);
        else
            $mahasiswa->buku()->sync(array());
        return redirect(url("/members"));
    }

    public function __construct() {
        $this->middleware('guest', array(
            'only'=>array('create', 'store')
            ));
    } 
}