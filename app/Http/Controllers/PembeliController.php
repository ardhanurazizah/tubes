<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $paginate = Pembeli::orderBy('id', 'asc')->paginate(5);
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
        $pembeli = new Pembeli;
        $pembeli->id = $request->get('id');
        $pembeli->nama = $request->get('nama');
        $pembeli->alamat = $request->get('alamat');
        $pembeli->no = $request->get('no');

        if ($request->file('foto')) {
            $image_name = $request->file('foto')->store('fotos', 'public');
        } else {
            $image_name = 'default.jpg';
        }

        //melakukan validasi data
        // $request->validate([
        //    // 'id' => 'required',
        //     'nama' => 'required',
        //     'alamat' => 'required',
        //     'no' => 'required',
        //     'foto' => 'required'
        // ]);

        // $pembeli = new Pembeli;
        // // $pembeli->id = $request->get('id');
        // $pembeli->nama = $request->get('nama');
        // $pembeli->alamat = $request->get('alamat');
        // $pembeli->no = $request->get('no');
        // $pembeli->foto = $image_name;
        $pembeli->save();

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
    public function show($id)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Id Pembeli
        $pembeli = Pembeli::where('id_users', $id)->first();
        return view('pembeli.detail', compact('pembeli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan Id Pembeli untuk diedit
        $pembeli = Pembeli::find($id);
        return view('pembeli.edit', compact('pembeli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // //melakukan validasi data
        // $request->validate([
        //    // 'id_users' => 'required',
        //     'nama' => 'required',
        //     'alamat' => 'required',
        //     'no' => 'required',
        //     'foto' => 'required'
        // ]);

        $pembeli = Pembeli::find($id);

        $pembeli->id = $request->get('id');
        $pembeli->nama = $request->get('nama');
        $pembeli->alamat = $request->get('alamat');
        $pembeli->no = $request->get('no');
       
        if ($pembeli->foto && file_exists(storage_path('app/public/' . $pembeli->foto))) {
            Storage::delete('public/' . $pembeli->foto);
        }
        $image_name = $request->file('foto')->store('foto', 'public');
        $pembeli->foto = $image_name;


    //fungsi eloquent untuk mengupdate data inputan kita
    // Pembeli::where('id_users', $id)
    //     ->update([
    //         //'id_users' =>$request->Id,
    //         'nama'=>$request->NamaPembeli,
    //         'alamat'=>$request->Alamat,
    //         'no'=>$request->Nohp,
    //         'foto' =>$request->Foto,
    //     ]);

        //jika data berhasil diupdate, akan kembali ke halaman utama
        $pembeli->save();
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
