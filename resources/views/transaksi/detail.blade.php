@extends('transaksi.layout')
@section('content')
    <div class="row my-3">
        <div class="col">
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2 class="col-12 text-center" >TRANSAKSI PEMBELIAN DI TOKO PRuTa</h2>
        </div>
        <div class="col-12 text-center">
            <h3><strong>Keranjang Belanja</strong></h3>
        </div>


        <a style="float: right"class="btn btn-success mt-3" href="/transaksi/{{ $transaksi->id }}/pdf">Cetak Nota</a>


        <b>Id Transaksi:</b> {{ $transaksi->id }}<br>
        <b>Id Pembeli: </b>{{ $transaksi->id_pembeli }}<br>
        <b>Tanggal: </b> {{ $transaksi->tanggal }}<br><br>
        <b>Total Harga Belanja: </b> {{ $transaksi->total }}<br><br>
        <div class="col-12">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>@Harga</th>
                </tr>

                @foreach ($transaksi as $dt)
                    <tr>
                        <td>{{ $dt->detail_transaksi->id }}</td>
                        <td>{{ $dt->detail_transaksi->jumlah }}</td>
                        <td>{{ $dt->detail_transaksi->harga }}</td>
                    </tr>
                @endforeach


            </table>
        </div>
    
@endsection