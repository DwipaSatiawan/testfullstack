@extends('layouts.app')

@section('content')
<div class="right_col" role="main">
    <div align="center">
        <h3>Data Buku</h3>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data</h2>
                    <div class="pull-right">
                        <button data-toggle="modal" data-target="#crud-data" class="add-data btn btn-success" style="margin-bottom:20px;"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="card-box table-responsive">
                            <table id="datatable-all" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul Buku</th>
                                        <th>Kategori</th>
                                        <th>Pengarang</th>
                                        <th>Tahun</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($buku as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->kategori->nama ?? 'Tidak Ada Kategori' }}</td>
                                        <td>{{ $item->pengarang->nama ?? 'Tidak Ada Pengarang' }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#crud-data" data-id="{{ $item->id }}" class="edit-data btn btn-info btn-sm" title="Ubah Data"><i class="fa fa-pencil"></i> Ubah</a>
                                            <a href="#" data-toggle="modal" data-target="#delete-data" data-id="{{ $item->id }}" class="delete-data btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-center">
                                {!! $buku->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal untuk tambah ubah data -->
<div class="modal fade bs-example-modal-lg all-modal" id="crud-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title judulmodal" id="myModalLabel">Tambah Kategori</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>

			<div class="modal-body">
                <form method="post" id="form-create" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input type="hidden" id="id" name="id" class="form-control" readonly />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Judul Buku</label>
                            <input type="text" id="judul" name="judul" class="form-control" required />
                        </div>
                        <div class="form-group ktg-select">
                            <label class="control-label">Kategori</label>
                            <select class="select2_single_1 form-control" id="kategori_id" name="kategori_id" style="width: 100% !important;">
                                <option value="0">-- Pilih Kategori --</option>
                                @foreach($kategori as $itemkategori)
                                <option value="{{ $itemkategori->kategori_id }}">{{ $itemkategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pgr-select">
                            <label class="control-label">Pengarang</label>
                            <select class="select2_single_2 form-control" id="pengarang_id" name="pengarang_id" style="width: 100% !important;">
                                <option value="0">-- Pilih Pengarang --</option>
                                @foreach($pengarang as $itempengarang)
                                <option value="{{ $itempengarang->pengarang_id }}">{{ $itempengarang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group thn-select">
                            <label class="control-label">Tahun</label>
                            <select class="select2_single_3 form-control" id="tahun" name="tahun" style="width: 100% !important;">
                                <option value="0">-- Pilih Tahun --</option>
                                @for($year = 1970; $year <= date('Y'); $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" id="btnform" name="btnform" class="btn btn-success" value="Simpan">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal konfirmasi delete data -->
<div class="modal fade bs-example-modal-lg" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <form data-toggle="validator" method="POST" id="form-delete">
                    {{ csrf_field() }}
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <input type="hidden" id="iddel" name="iddel" class="form-control" readonly />
                        <h3 align="center">Are you sure to delete this data???</h3>
                        <div class="form-group" align="center" style="margin-top: 20px;">
                            <button type="submit" class="btn delete-submit btn-success">Yes</button>
                            <button data-dismiss="modal" class="btn btn-danger">No</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    /* tampil notif ketika selesai simpan */
    window.onload = function() {
        var notif = sessionStorage.getItem('notifSukses');
        if (notif) {
            notifsukses(notif); 
            sessionStorage.removeItem('notifSukses');
        }
    }

    $(document).ready(function(){

        //tampil select kategori
        $(".select2_single_1").select2({
            placeholder: "",
            allowClear: false,
            dropdownParent: $(".ktg-select")
        });

        //tampil select pengarang
        $(".select2_single_2").select2({
            placeholder: "",
            allowClear: false,
            dropdownParent: $(".pgr-select")
        });

        //tampil select tahun
        $(".select2_single_3").select2({
            placeholder: "",
            allowClear: false,
            dropdownParent: $(".thn-select")
        });

        /* tampil tambah data */
        $(document).on('click', '.add-data', function(e) {
            e.preventDefault();
            $('#judul').val('');
            $('#kategori_id').val('0').trigger("change");
            $('#pengarang_id').val('0').trigger("change");
            $('#tahun').val('0').trigger("change");
            
            $(".judulmodal").html('Tambah Data');
            $('#btnform').val('Simpan');
        });

        /* tampil ubah data */
        $(document).on('click', '.edit-data', function(e) {
            e.preventDefault();
            var bukuId = $(this).attr('data-id');
            $.ajax({
                type: 'GET',
                url: '/buku_get_edit/' + bukuId,
                success: function(data) {
                    $('#id').val(bukuId);
                    $('#judul').val(data.judul);
                    $('#kategori_id').val(data.kategori_id).trigger("change");
                    $('#pengarang_id').val(data.pengarang_id).trigger("change");
                    $('#tahun').val(data.tahun).trigger("change");
                    $(".judulmodal").html('Ubah Data');
                    $('#btnform').val('Ubah');
                },
                error: function(error) {
                    console.log('Error:', error);
                    alert('Gagal memuat data.');
                }
            });
        });

        /* tampil modal delete */
        $(document).on('click', '.delete-data', function(e) {
            e.preventDefault();
            $('#iddel').val($(this).attr('data-id'));
        });

        /* simpan & update data */
        $('#form-create').on('submit', function(event) {
            event.preventDefault();

            var btnform = $("#crud-data").find("input[name='btnform']").val();
            var bukuid = $("#crud-data").find("input[name='id']").val();
            var judul = $("#crud-data").find("input[name='judul']").val();
            var kategori_id = $("#crud-data").find("select[name='kategori_id']").val();
            var pengarang_id = $("#crud-data").find("select[name='pengarang_id']").val();
            var tahun = $("#crud-data").find("select[name='tahun']").val();

            var formData = new FormData(this);
            formData.append('bukuid', bukuid);
            formData.append('judul', judul); 
            formData.append('kategori_id', kategori_id);
            formData.append('pengarang_id', pengarang_id);
            formData.append('tahun', tahun);

            if (btnform == "Simpan") {
                var urlform = "/buku_save";  // URL untuk menyimpan data
                var notifform = "Berhasil simpan data";
            }

            if (btnform == "Ubah") {
                var urlform = "/buku_update/";  // URL untuk update data
                var notifform = "Berhasil ubah data";
            }

            if (judul != '' && kategori_id != '0' && pengarang_id != '0' && tahun != '0'){
                $.ajax({
                    url: urlform,
                    method:"POST",
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function(request) {
                        request.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                    },
                    success: function(data) {
                        document.getElementById("form-create").reset();  // Reset form
                        sessionStorage.setItem('notifSukses', notifform);  // Menyimpan pesan sukses di sessionStorage
                        window.location.reload();  // Refresh halaman untuk melihat perubahan
                    },
                    error: function(error) {
                        console.log(error);
                        notiferror('Terjadi kesalahan saat menyimpan data');
                    }
                });
            } else {
                notiferror('Terdapat data kosong!!!');  // Menampilkan alert jika nama kosong
            }
        });

        $('#form-delete').on('submit', function(event) {
            event.preventDefault();

            var iddel = $("#delete-data").find("input[name='iddel']").val();  // Ambil id yang akan dihapus

            $.ajax({
                url: "/buku_delete/" + iddel,  // URL endpoint untuk menghapus
                method: "DELETE",  // Menggunakan metode DELETE
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),  // Kirimkan CSRF token
                },
                success: function(data) {
                    // Jika berhasil, beri notifikasi atau perbarui halaman
                    sessionStorage.setItem('notifSukses', 'buku berhasil dihapus');  // Menyimpan pesan sukses di sessionStorage
                    window.location.reload();  // Refresh halaman untuk menampilkan data terbaru
                },
                error: function(xhr) {
                    // Jika terjadi kesalahan
                    notiferror('Terjadi kesalahan saat menghapus buku');
                }
            });
        });

    });

</script>

@endsection