@extends('siswa.partials.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h1>Data Buku</h1>
                                    <a type="button" href=" {{ route('buku.index') }} " class="btn btn-info">
                                        Kembali</a>
                                    <br>
                
                                    <label for="">Judul Buku</label>
                                    <input type="text" name="judul_buku" class="form-control">
                                    <label for="">Tahun Terbit</label>
                                    <input type="date" name="tahun_terbit" class="form-control">
                                    <label for="">ISBN</label>
                                    <input type="text" name="isbn" class="form-control">
                                    <label for="">Penulis</label>
                                    <select name="id_penulis" id="id_penulis" class="form-control">
                                        <option value="">Penulis</option>
                                        @foreach ($penulis as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    <label for="">Genre</label>
                                    <input type="text" name="genre" class="form-control">
                                    <label for="">Tempat Terbit</label>
                                    <input type="text" name="tempat_terbit" class="form-control">
                                    <label for="">Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control">
                                    <label for="">Sampul</label>
                                    <input type="file" name="photo" class="form-control">
                                    <button type="submit" class="btn btn-warning  mt-2">Simpan</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
