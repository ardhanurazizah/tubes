@extends('pembeli.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">
            Detail Pembeli
         </div>
         <div class="card-body">
             <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Id Pembeli: </b>{{$pembeli->id}}</li>
                <li class="list-group-item"><b>Nama: </b>{{$pembeli->nama}}</li>
                <li class="list-group-item"><b>Alamat: </b>{{$pembeli->alamat}}</li>
                <li class="list-group-item"><b>No HP: </b>{{$pembeli->no}}</li>
                <li class="list-group-item"><b>Foto: </b><img style="width: 100%" src="{{ asset('./storage/'. $pembeli->foto) }}" alt=""></li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('pembeli.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection 