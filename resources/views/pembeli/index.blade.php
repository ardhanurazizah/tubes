@extends('pembeli.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
        <center> <h2>Halaman Pembeli Toko Barokah Jaya</h2> </center>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('pembeli.create') }}"> Input Pembeli</a>
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
        <th>Id Pembeli</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Foto</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($pembeli as $pbl)
    <tr>
        <td>{{ $pbl ->id }}</td>
        <td>{{ $pbl ->nama }}</td>
        <td>{{ $pbl ->alamat }}</td>
        <td>{{ $pbl ->no }}</td>
        <td><img width="50px" src="{{ asset('storage/' . $pbl->foto)}}" alt="" srcset=""></td>
        <td>
            <form action="{{ route('pembeli.destroy',['pembeli'=>$pbl->id_users]) }}" method="POST">
                <a class="btn btn-info" href="{{ route('pembeli.show',$pbl->id_users) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('pembeli.edit',$pbl->id_users) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection 