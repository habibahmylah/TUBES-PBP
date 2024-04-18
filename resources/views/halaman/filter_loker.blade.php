@extends('index')
@section('title', 'Filter Loker')

@section('isihalaman')
<div class="card mt-5">
    <div class="card-header">Filter Loker</div>
    <div class="card-body">
        <form method="GET" action="{{ route('filter-loker') }}">
            <div class="form-group">
                <label for="min_age">Minimum Usia:</label>
                <input type="number" class="form-control" name="min_age" value="{{ request('min_age') }}">
            </div>
            <div class="form-group">
                <label for="max_age">Maximum Usia:</label>
                <input type="number" class="form-control" name="max_age" value="{{ request('max_age') }}">
            </div>
            <div class="form-group">
                <label for="min_salary">Minimum Gaji:</label>
                <input type="number" class="form-control" name="min_salary" value="{{ request('min_salary') }}">
            </div>
            <div class="form-group">
                <label for="max_salary">Maximum Gaji:</label>
                <input type="number" class="form-control" name="max_salary" value="{{ request('max_salary') }}">
            </div><div class="form-group">
                <label for="pendidikan">Pendidikan:</label>
                <input type="text" class="form-control" name="pendidikan" value="{{ request('pendidikan') }}">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a class="btn btn-secondary" href="{{ route('loker-tampil') }}">Kembali ke Tabel Loker</a>
            </div>
        </form>

        <table class="table table-striped mt-4">
            <tr>
                <th class="text-center">Nama</th>
                <th class="text-center">Tipe</th>
                <th class="text-center">Usia Min</th>
                <th class="text-center">Usia Max</th>
                <th class="text-center">Gaji Min</th>
                <th class="text-center">Gaji Max</th>
                <th class="text-center">Nama CP</th>
                <th class="text-center">Email CP</th>
                <th class="text-center">No. Telp CP</th>
                <th class="text-center">Tanggal Update</th>
                <th class="text-center">Status</th>
                <th class="text-center">Jumlah Pelamar</th>
                <th class="text-center">Jumlah Like</th>
                <th class="text-center">Pendidikan</th>
                <th class="text-center">Apply</th>
            </tr>
            @foreach ($filteredLoker as $lok)
                <tr>
                    <td class="text-center">{{ $lok->nama }}</td>
                    <td class="text-center">{{ $lok->tipe }}</td>
                    <td class="text-center">{{ $lok->usia_min }}</td>
                    <td class="text-center">{{ $lok->usia_max }}</td>
                    <td class="text-center">{{ $lok->gaji_min }}</td>
                    <td class="text-center">{{ $lok->gaji_max }}</td>
                    <td class="text-center">{{ $lok->nama_cp }}</td>
                    <td class="text-center">{{ $lok->email_cp }}</td>
                    <td class="text-center">{{ $lok->no_telp_cp }}</td>
                    <td class="text-center">{{ $lok->tgl_update }}</td>
                    <td class="text-center">{{ $lok->status }}</td>
                    <td class="text-center">{{ $lok->jumlah_pelamar }}</td>
                    <td class="text-center">{{ $lok->jumlah_like }}</td>
                    <td class="text-center">{{ $lok->pendidikan }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('apply-loker-view') }}">Apply</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
