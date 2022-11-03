@extends('adminlte::page')

@section('title', 'Tambah Barang')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Barang</h1>
@stop

@section('content')
    <form action="{{route('data_barang.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type ="text" class="form-control" id="nama_barang" placeholder="Nama Barang" name="nama_barang" value="{{old('nama')}}">
                        </div>
                        <label for="nama">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Hilang">Hilang</option>
                        </select >
                        <div class="form-group mt-3">
                            <label for="nama">Kategori</label>
                            <input type ="text" class="form-control" id="kategori" placeholder="Kategori" name="kategori" value="{{old('kategori')}}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('data_barang.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
@stop