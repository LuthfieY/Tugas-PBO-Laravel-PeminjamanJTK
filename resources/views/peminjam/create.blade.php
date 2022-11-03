@extends('adminlte::page')

@section('title', 'Tambah Peminjam')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Peminjam</h1>
@stop

@section('content')
    <form action="{{route('peminjam.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nama">Nama Peminjam</label>
                            <input type ="text" class="form-control" id="nama" placeholder="Nama Peminjam" name="nama" value="{{old('nama')}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">NIM/ NIDN</label>
                            <input type ="text" class="form-control" id="nim_nidn" placeholder="NIM/ NIDN" name="nim_nidn" value="{{old('nim_nidn')}}">
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
