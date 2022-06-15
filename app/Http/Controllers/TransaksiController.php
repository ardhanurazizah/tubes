<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')) {
            $paginate = Transaksi::where('id', 'like', '%' . request('search') . '%')
                                    ->orwhere('id_pembeli', 'like', '%' . request('search') . '%')
                                    ->paginate(5); // Mengambil semua isi tabel
                                    return view('transaksi.index', ['paginate'=>$paginate]);
        }else{
            //fungsi eloquent menampilkan data menggunakan pagination
            // $mahasiswa = Mahasiswa::all(); // Mengambil semua isi tabel
            // $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->paginate(5);
            // return view('mahasiswa.index', ['mahasiswa' => $mahasiswa,'paginate'=>$paginate]);
            $transaksi = Transaksi::all();
            $paginate = Transaksi::orderBy('id', 'asc')->paginate(5);
            return view('transaksi.index', ['transaksi' => $transaksi,'paginate'=>$paginate]);


        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::with('DetailTransaksi')->where('id', $id)->first();
		return view('transaksi.detail', ['transaksi' => $transaksi]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksi.edit', ['transaksi' => $transaksi]);
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
        $transaksi = Transaksi::find($id);

        $transaksi->id_pembeli = $request->id_pembeli;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->total = $request->total;
        
        $transaksi->save();
        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::where('id', $id)->delete();
         return redirect()->route('transaksi.index')
         -> with('success', 'Transaksi Berhasil Dihapus');
    }
    public function detail($id)
    {
        $transaksi = Transaksi::with('detail_transaksi')->where('id', $id)->get();
        return view('transaksi.detail', ['transaksi' => $transaksi]);
    }
}
