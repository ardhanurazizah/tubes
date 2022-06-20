<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\User;
use App\Models\Detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use Auth;
use Alert;
use Carbon\Carbon;

class RiwayatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$transaksi = Transaksi::where('id_users', Auth::user()->id)->where('status', '!=',0)->get();
    	return view('riwayat', compact('transaksi'));
    }
    public function detail($id)
    {
    	$transaksi = Transaksi::where('id', $id)->first();
    	$details = Detail::where('id_transaksi', $transaksi->id)->get();
     	return view('pesan', compact('transaksi','details'));
    }
}
