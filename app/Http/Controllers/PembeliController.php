<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $pembeli = Pembeli::all(); // Mengambil semua isi tabel
        $paginate = Pembeli::orderBy('id_users', 'asc')->paginate(5);
        return view('pembeli.index', ['pembeli' => $pembeli,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembeli.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'id_users' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no' => 'required',
            'foto' => 'required'
        ]);

        //fungsi eloquent untuk menambah data
        Pembeli::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('pembeli.index')
        ->with('success', 'Pembeli Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_users)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Id Pembeli
        $pembeli = Pembeli::where('id_users', $id_users)->first();
        return view('pembeli.detail', compact('pembeli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_users)
    {
        //menampilkan detail data dengan menemukan berdasarkan Id Pembeli untuk diedit
        $pembeli = DB::table('pembeli')->where('id_users', $id_users)->first();
        return view('pembeli.edit', compact('pembeli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_users)
    {
        //melakukan validasi data
        $request->validate([
            'id_users' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no' => 'required',
            'foto' => 'required'
        ]);

    //fungsi eloquent untuk mengupdate data inputan kita
    Pembeli::where('id_users', $id_users)
        ->update([
            'id_users' =>$request->Id,
            'nama'=>$request->Nama,
            'alamat'=>$request->Alamat,
            'no'=>$request->Nohp,
            'foto' =>$request->Foto,
        ]);

    //jika data berhasil diupdate, akan kembali ke halaman utama
    return redirect()->route('pembeli.index')
    ->with('success', 'Pembeli Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_users)
    {
         //fungsi eloquent untuk menghapus data
         Pembeli::where('id_users', $id_users)->delete();
         return redirect()->route('pembeli.index')
         -> with('success', 'Pembeli Berhasil Dihapus');
    }
}
