@extends('adminlte::page')

@section('title', 'List Barang')

@section('content_header')
    <h1 class="m-0 text-dark">List Barang</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('data_barang.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <!-- <th>No.</th> -->
                            <th>Kode Barang</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Kategori</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data_barangs as $key => $data_barang)
                            <tr>
                                <!-- <td>{{$key+1}}</td> -->
                                <td>{{$data_barang->kode_barang}}</td>
                                <td>{{$data_barang->nama_barang}}</td>
                                <td>{{$data_barang->status}}</td>
                                <td>{{$data_barang->kategori}}</td>
                                <td>
                                    <a href="{{route('data_barang.edit', $data_barang)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('data_barang.destroy', $data_barang)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush