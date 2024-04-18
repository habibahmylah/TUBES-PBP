@extends('index')
@section('title', 'Apply for Job')

@section('isihalaman')
<div class="container">
    <h2>Apply for Job</h2>
    <form action="{{route('apply-loker-view')}}" method="GET">
        <div class="form-group">
            <label for="noktp">Nomor KTP:</label>
            <input type="text" name="noktp" id="noktp" class="form-control" value="{{ $pencaker->noktp }}" readonly>
        </div>

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $pencaker->nama }}" readonly>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $pencaker->email }}" readonly>
        </div>
    </form>
    
    <form action="{{ route('apply-loker') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kota">Kota:</label>
            <input type="text" name="kota" id="kota" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="no_telp">No. Telp:</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="foto">Upload Foto:</label>
            <input type="file" name="foto" id="foto" class="form-control-file" required>
        </div>
        <div class="form-group">
            <label for="tgl_daftar">Tgl Daftar:</label>
            <input type="date" name="tgl_daftar" id="tgl_daftar" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="file_ktp">Upload KTP:</label>
            <input type="file" name="file_ktp" id="file_ktp" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>
</div>
@endsection
