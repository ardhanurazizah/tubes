@extends('profil.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">
            Profil Pembeli
         </div>
         <div class="card-body">
             <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Nama: </b>{{$profil->nama}}</li>
                <li class="list-group-item"><b>Alamat: </b>{{$profil->alamat}}</li>
                <li class="list-group-item"><b>No HP: </b>{{$profil->no}}</li>
                <li class="list-group-item"><b>Foto: </b><img style="width: 100%" src="{{ asset('./storage/'. $profil->foto) }}" alt=""></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection 