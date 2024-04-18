@extends('index')
@section('title', 'Administration')

@section('isihalaman')
<style type="text/css">
    .title {
        color: #395493;
        text-align: center;
    }
</style>
<h3 class="title">Daftar History Administration</h3>

<style>
    .content {
        max-width: 1750px;
        margin: 0 auto;
        padding: 20px;
    }
</style>

<div class="content">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th align="center"><center><b>No</b></center></th>
                <th align="center"><b>Loker</b></th>
                <th align="center"><b>Tipe</b></th>
                <th align="center"><b>Usia Min</b></th>
                <th align="center"><b>Usia Max</b></th>
                <th align="center"><b>Gaji Min</b></th>
                <th align="center"><b>Gaji Max</b></th>
                <th align="center"><b>Tanggal Seleksi</b></th>
                <th align="center"><b>Status</b></th>
                <th align="center"><center><b>Contact Person</b></center></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($apply_loker as $index => $applok)
                @php
                    $lok = $loker[$index];
                    $thpapply = $tahapan_apply[$index];
                @endphp
                <tr>
                    <td align="center" scope="row">{{ $index + 1 }}</td>
                    <td>{{ $lok->nama }}</td>
                    <td>{{ $lok->tipe }}</td>
                    <td>{{ $lok->usia_min }}</td>
                    <td>{{ $lok->usia_max }}</td>
                    <td>{{ $lok->gaji_min }}</td>
                    <td>{{ $lok->gaji_max }}</td>
                    <td>
                        @foreach ($tahapan_apply as $thpapply)
                            @if ($thpapply->idapply == $applok->idapply)
                                @if ($thpapply->idtahapan == 1)
                                    {{ $thpapply->tgl_update }}
                                @endif
                            @endif
                        @endforeach    
                    </td>
                    <td>
                        @foreach ($tahapan_apply as $thpapply)
                            @if ($thpapply->idapply == $applok->idapply)
                                @if ($thpapply->idtahapan == 1)
                                    @if ($thpapply->idnilai == 1)
                                        Lolos
                                    @elseif ($thpapply->idnilai == 0)
                                        Gagal
                                    @endif
                                @endif
                            @endif
                        @endforeach
                    </td>
                    <td align="center">
                        <button id="set_detail" type="button" class="btn btn-link" data-toggle="modal" data-target="#modalDetail"
                            data-nama_cp="{{ $lok->nama_cp }}"
                            data-email_cp="{{ $lok->email_cp }}"
                            data-no_telp_cp="{{ $lok->no_telp_cp }}"> 
                            Show Details
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalDetail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">CP Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td><span id="nama"></span></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><span id="email"></span></td>
                        </tr>
                        <tr>
                            <th>No Telepon</th>
                            <td><span id="notel"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#set_detail', function() {
            var nama = $(this).data('nama_cp');
            var email = $(this).data('email_cp');
            var notel = $(this).data('no_telp_cp');
            $('#nama').text(nama);
            $('#email').text(email);
            $('#notel').text(notel);
        })
    })
</script>

@endsection