@extends('index')
@section('title', 'Loker')

@section('isihalaman')
<style type="text/css">
    .title {
        color: #395493;
        text-align: center;
    }

    .logo {
        width: 45px;
        height: 45px;
        border-radius: 50%;
    }

    .card {
        background-color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin: 10px;
    }

    .card-header {
        background-color: #395493;
        color: white;
        text-align: center;
    }

    .card-footer {
        background-color: #f7f7f7;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-title {
        text-align: center;
    }

    .card-body {
        text-align: center;
    }

    .like-icon {
        font-size: 20px;
    }

    .search-container {
        text-align: right;
        width: 25%;
    }

    .navbar {
        background-color: #fff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Menambahkan shadow */
    }

</style>

<h3 class="title">Lowongan Kerja</h3>

<!-- Tambahkan input untuk pencarian -->
<nav class="navbar mr-auto ml-auto mb-4 mt-4">
    <div class="search-container ml-auto mr-1">
        <form class="d-flex input-group w-auto">
            <input type="search" class="form-control rounded" id="searchInput" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon">
        </form>
    </div>
    <!-- Filter button -->
    <a href="{{ route('filter-loker') }}" class="btn btn-primary">Filter</a>
</nav>


<div class="content">
    <div class="row ml-4 mr-4">
        @foreach ($loker as $index => $lok)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <br>{{ $lok->nama }}
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $lok->deskripsi }}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-outline-danger">
                            Like
                        </button>
                        <i class="fas fa-user ml-2"></i>
                        <span>{{ $lok->jumlah_pelamar }}</span>
                    </div>
                    <button id="set_detail" type="button" class="btn btn-link" data-toggle="modal" data-target="#modalDetail"
                        data-lok-nama="{{ $lok->nama }}"
                        data-lok-tipe="{{ $lok->tipe }}"
                        data-lok-usia-min="{{ $lok->usia_min }}"
                        data-lok-usia-max="{{ $lok->usia_max }}"
                        data-lok-gaji-min="{{ $lok->gaji_min }}"
                        data-lok-gaji-max="{{ $lok->gaji_max }}"
                        data-lok-tgl-update="{{ $lok->tgl_update }}"
                        data-lok-status="{{ $lok->status }}"
                        data-lok-nama-cp="{{ $lok->nama_cp }}"
                        data-lok-email-cp="{{ $lok->email_cp }}"
                        data-lok-no-telp-cp="{{ $lok->no_telp_cp }}"
                        data-lok-jumlah-pelamar="{{ $lok->jumlah_pelamar }}"
                        data-lok-jumlah-like="{{ $lok->jumlah_like }}"
                        data-lok-pendidikan="{{ $lok->pendidikan }}">
                        Show Details
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel">Detail Loker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li><strong>Nama Loker:</strong> <span id="lok-nama"></span></li>
                    <li><strong>Tipe:</strong> <span id="lok-tipe"></span></li>
                    <li><strong>Usia Min:</strong> <span id="lok-usia-min"></span></li>
                    <li><strong>Usia Max:</strong> <span id="lok-usia-max"></span></li>
                    <li><strong>Gaji Min:</strong> <span id="lok-gaji-min"></span></li>
                    <li><strong>Gaji Max:</strong> <span id="lok-gaji-max"></span></li>
                    <li><strong>Tanggal Seleksi:</strong> <span id="lok-tgl-update"></span></li>
                    <li><strong>Status:</strong> <span id="lok-status"></span></li>
                    <li><strong>Nama CP:</strong> <span id="lok-nama-cp"></span></li>
                    <li><strong>Email CP:</strong> <span id="lok-email-cp"></span></li>
                    <li><strong>No. Telp CP:</strong> <span id="lok-no-telp-cp"></span></li>
                    <li><strong>Jumlah Pelamar:</strong> <span id="lok-jumlah-pelamar"></span></li>
                    <li><strong>Jumlah Like:</strong> <span id="lok-jumlah-like"></span></li>
                    <li><strong>Pendidikan:</strong> <span id="lok-pendidikan"></span></li>
                </ul>
                <div class="text-right">
                    <a id="applyButton" href="{{route('apply-loker-view')}}" type="button" class="btn btn-primary text-white">Apply</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#modalDetail').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button yang dipicu modal
            $('#lok-nama').text(button.data('lok-nama'));
            $('#lok-tipe').text(button.data('lok-tipe'));
            $('#lok-usia-min').text(button.data('lok-usia-min'));
            $('#lok-usia-max').text(button.data('lok-usia-max'));
            $('#lok-gaji-min').text(button.data('lok-gaji-min'));
            $('#lok-gaji-max').text(button.data('lok-gaji-max'));
            $('#lok-tgl-update').text(button.data('lok-tgl-update'));
            $('#lok-status').text(button.data('lok-status'));
            $('#lok-nama-cp').text(button.data('lok-nama-cp'));
            $('#lok-email-cp').text(button.data('lok-email-cp'));
            $('#lok-no-telp-cp').text(button.data('lok-no-telp-cp'));
            $('#lok-jumlah-pelamar').text(button.data('lok-jumlah-pelamar'));
            $('#lok-jumlah-like').text(button.data('lok-jumlah-like'));
            $('#lok-pendidikan').text(button.data('lok-pendidikan'));
        });
    });
    
    $(document).ready(function () {
        // Fungsi untuk melakukan pencarian
        $('#searchInput').on('keyup', function () {
            var searchValue = $(this).val().toLowerCase();
            $(".card").each(function () {
                var cardTitle = $(this).find(".card-title").text().toLowerCase();
                if (cardTitle.includes(searchValue)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
</body>
</html>
@endsection
