@extends('adminlte::page')

@section('title', 'Edit Peminjam')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Peminjam</h1>
@stop

@section('content')
    <form action="{{route('peminjam.update', $peminjam)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nama">Nama Peminjam</label>
                            <input type ="text" class="form-control" id="nama" placeholder="Nama Peminjam" name="nama" value="{{$peminjam->nama ?? old}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">NIM/ NIDN</label>
                            <input type ="text" class="form-control" id="nim_nidn" placeholder="NIM/ NIDN" name="nim_nidn" value="{{$peminjam->nim_nidn ?? old}}">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('peminjam.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
@stop
