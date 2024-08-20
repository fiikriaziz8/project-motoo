@extends('layouts.admin_main')
@section('container')
<div style="padding-top:20px;margin-left:228px;margin-bottom:25px;"> 
    <a href="/"> Home </a> / <a href="/dashboard">Dashboard </a>/ <span style="color:red"> Aplikasi </span>
</div>
<div class="container">
    <div class="row" style="margin-bottom:25px;">
        <div class="col-md-2">
            <div id="app-review-card">
                <span style="margin-right:8px;border-radius:4px;width:40px;height:40px;float:left;" >
                    <i class="fa fa-star-o fa-3x" aria-hidden="true"></i>
                </span>
                All Apps Review
                <br> <strong> {{ count($review_app_all) }}</strong>
            </div>
        </div>
        <div class="col-md-2" style="margin-left:125px;">
            <div id="app-review-card" style="color:green">
                <span style="margin-right:8px;border-radius:4px;width:40px;height:40px;float:left;" >
                    <i class="fa fa-thumbs-up fa-3x" aria-hidden="true"></i>
                </span>
                Good Review Apps <br>
                <strong> {{ $review_app_all->whereIn('Penilaian', [5, 4])->count() }}</strong>
            </div>
        </div>
        <div class="col-md-2" style="margin-left:125px;">
            <div id="app-review-card" style="color:red">
                <span style="margin-right:8px;border-radius:4px;width:40px;height:40px;float:left;" >
                    <i class="fa fa-thumbs-down fa-3x" aria-hidden="true"></i>
                </span>
                Bad Review Apps <br>
                <strong> {{ $review_app_all->whereIn('Penilaian', [1, 2])->count() }} </strong>
            </div>
        </div>
        <div class="col-md-2" style="margin-left:125px;">
            <div id="app-review-card" style="color:black">
                <span style="padding-top:8px;font-weight:bold;;text-align:center;margin-right:8px;border-radius:4px;width:40px;height:40px;float:left;" >
                    ---
                </span>
                Blank Review Apps <br>
                <strong> {{ $app_blank_review }}</strong>
            </div>
        </div>
    </div>
</div>

<div id="detail_teknisi_box">
    <div>
        <h4>
            Daftar Aplikasi
            <span style="float:right;font-size:14px;border:1px silver solid;padding:4px;border-radius:3px;;color:white">
                <a href="/daftar-aplikasi/tambah">
                    Tambah Aplikasi
                    <i class="fa fa-solid fa-plus"></i>
                </a>
            </span>
        </h4>
        <hr>
        <div class="table-responsive" style="border-radius:5px;">
            <table class="table table-striped table-sm">
              <thead style="color:white;vertical-align:middle;background-color:#BF2C45">
                <tr>
                  <th> No </th>
                  <th scope="col">ID</th>
                  <th scope="col">Nama Aplikasi</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Jenis Login</th>
                  <th scope="col">Jenis Device</th>
                  <th scope="col">Platform</th>
                  <th scope="col">Description</th>
                  <th scope="col">Lihat di Katalog</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <?php 
                $no = 1
              ?>
              <tbody>
                @foreach($apps as $app)
                <tr>
                    <td style="background-color:gray">
                        {{ $no }}.
                    </td>
                    <td>
                        {{ $app->id }}
                    </td>
                    <td>
                        {{ $app->Nama_Aplikasi }}
                    </td>
                    <td>
                        {{ $app->Category }}
                    </td>
                    <td>
                        {{ $app->Login }}
                    </td>
                    <td>
                        {{ $app->Device}}
                    </td>
                    <td>
                        {{ $app->Platform }}
                    </td>
                    <td>
                        {{ $app->Description }}
                    </td>
                    <td>
                        <a href="/detail/{{ $app->id }}"> <i class="fa fa-search-plus"></i> </a>
                    </td>
                    <td style=background-color:#BF2C45>
                        <button class="hapus-data" data-id="{{ $app->id }}" style="border-radius:5px;border:2px solid silver">
                            <i class="fa fa-solid fa-trash"></i> 
                        </button>
                        <button style="border-radius:5px;border:2px solid silver">
                            <a href="/daftar-aplikasi/edit/{{ $app->id }}">
                                <i class="fa fas fa-edit"></i>
                            </a>
                        </button>
                    </td>
                </tr>
                <?php 
                $no = $no + 1
              ?>
                @endforeach
            </tbody>
        </div>
    </table>
    <div class="col-md-2" style="float:right;">
      {{ $apps->links() }}
      <br>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var buttons = document.querySelectorAll('.hapus-data');

        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var confirmation = confirm('Apakah Anda yakin ingin menghapus data?');
                console.log(id)
                if (confirmation) {
                    hapusData(id);
                }
            });
        });

        function hapusData(id) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/daftar-aplikasi/hapus/' + id, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content')); 

            xhr.onload = function() {
                if (xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    console.log(xhr.responseText);
                    window.location.reload();
                    //penambahan kode
                    alert(response.message)
                } else {
                    var response = JSON.parse(xhr.responseText);
                    alert(response.message)
                    console.error('Gagal menghapus data');
                }
            };
            xhr.send();
        };
    });
</script>
{{-- penambahan kode --}}
@if(session('success'))
<script>
    alert('{{ session('success') }}')
</script>
@endif

@endsection