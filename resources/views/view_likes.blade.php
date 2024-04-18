@extends('index')
@section('title', 'Likes')

@section('isihalaman')
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
    .title {
        color: #395493;
        text-align: center;
    }

    .card {
        background-color: #f7f7f7;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin: 10px;
        transition: all 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
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
        padding: 1px
    }
    
    .like-icon {
        font-size: 20px;
    }

    .fit-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

</style>

<h3 class="title">Daftar Likes</h3>

<div class="content">
    <div class="row mx-5">
        @foreach ($loker as $index => $lok)
        <div class="card mx-2" style="max-width: 458px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('pictures') }}/hiring.jpg" class="img-fluid rounded-start fit-img" alt="">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $lok->nama }}  
                    </h5>
                    <p class="card-text">
                        <li><strong>Tipe:</strong> {{ $lok->tipe }}</li>
                        <li><strong>Usia:</strong> {{ $lok->usia_min }}-{{ $lok->usia_max }} tahun</li>
                        <li><strong>Gaji:</strong> {{ $lok->gaji_min }}-{{ $lok->gaji_max }}</li>
                        <li><strong>Status:</strong> {{ $lok->status }}</li>
                        <li><strong>End:</strong> {{ $lok->tgl_tutup }}</li>
                    </p>

                    {{-- Show Details --}}
                    {{-- <i class="fas fa-heart like-icon"></i> --}}
                    <div class="card-footer">
                    <button id="set_detail" type="button" class="btn btn-link ml-auto" data-toggle="modal" data-target="#modalDetail"
                        data-lok-nama-cp="{{ $lok->nama_cp }}"
                        data-lok-email-cp="{{ $lok->email_cp }}"
                        data-lok-no-telp-cp="{{ $lok->no_telp_cp }}"
                        data-lok-jumlah-pelamar="{{ $lok->jumlah_pelamar }}"
                        data-lok-jumlah-like="{{ $lok->jumlah_like }}"
                        data-lok-pendidikan="{{ $lok->pendidikan }}"
                        >Show Details
                    </button>
                    </div>
                </div>
              </div>
            </div>
          </div>

        
        @endforeach
    </div>
</div>

{{-- Detail --}}
<div class="modal fade" id="modalDetail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Lowongan Pekerjaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Nama Contact Person</th>
                            <td><span id="lok-nama-cp"></span></td>
                        </tr>
                        <tr>
                            <th>Email Contact Person</th>
                            <td><span id="lok-email-cp"></span></td>
                        </tr>
                        <tr>
                            <th>No Telepon Contact Person</th>
                            <td><span id="lok-no-telp-cp"></span></td>
                        </tr>
                        <tr>
                            <th>Jumlah Like</th>
                            <td><span id="lok-jumlah-like"></span></td>
                        </tr>
                        <tr>
                            <th>Jumlah Pelamar</th>
                            <td><span id="lok-jumlah-pelamar"></span></td>
                        </tr>
                        <tr>
                            <th>Jumlah Pendidikan</th>
                            <td><span id="lok-pendidikan"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#modalDetail').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button yang dipicu modal
            $('#lok-nama-cp').text(button.data('lok-nama-cp'));
            $('#lok-email-cp').text(button.data('lok-email-cp'));
            $('#lok-no-telp-cp').text(button.data('lok-no-telp-cp'));
            $('#lok-jumlah-pelamar').text(button.data('lok-jumlah-pelamar'));
            $('#lok-jumlah-like').text(button.data('lok-jumlah-like'));
            $('#lok-pendidikan').text(button.data('lok-pendidikan'));
        });
    });
</script>
</body>
</html>

{{-- <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
</nav> --}}

@endsection