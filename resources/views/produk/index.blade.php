@extends('produk.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
        <center> <h2>Daftar Produk Toko Barokah Jaya</h2> </center>
        </div >
        <!-- <div class="row"> -->
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('cetak_pdf') }}"> Cetak PDF </a>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('produk.create') }}"> Input Pembeli</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-error">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>Id Produk</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Foto</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($paginate as $pr)
    <tr>
        <td>{{ $pr ->id }}</td>
        <td>{{ $pr ->nama }}</td>
        <td>{{ $pr ->deskripsi }}</td>
        <td>{{ $pr ->harga }}</td>
        <td>{{ $pr ->stok }}</td>
        <td><img width="150px" src="{{asset('storage/'.$pr->foto)}}"> 
        <!-- <td><img width="50px" src="{{ asset('storage/'.$pr->foto)}}" alt="" srcset=""></td> -->
        <td>
            <form action="{{ route('produk.destroy',['produk'=>$pr->id]) }}" method="POST">
                <a class="btn btn-info" href="{{ route('produk.show',$pr->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('produk.edit',$pr->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
{!! $paginate->links() !!}
 @endsection
