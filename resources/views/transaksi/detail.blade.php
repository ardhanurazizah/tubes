

@extends('transaksi.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">
            Detail Produk
         </div>
         <div class="card-body">
             <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Id Produk: </b>{{$detail->id_transaksi}}</li>
                <li class="list-group-item"><b>Jumlah: </b>{{$detail->jumlah}}</li>
                <li class="list-group-item"><b>Harga: </b>{{$detail->harga}}</li>
                
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('transaksi.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection 