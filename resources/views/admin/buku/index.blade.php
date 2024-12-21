<!-- Menghubungkan dengan view template master -->
@extends('back_template')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-12 col-sm-12 col-xs-12">   
            <div class="page-title">
                <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                    <h3>PEMERINTAH DESA SUKARAJA</h3>
                    <h4>KECAMATAN PRAYA TIMUR, LOMBOK TENGAH, NTB</h4>
                </div>
            </div>
        </div>
    </div>

	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
					<h2><?= $title; ?></h2>
					<div class="pull-right">
						<button data-toggle="modal" data-target="#crud-<?= $titleid; ?>" class="add-<?= $titleid; ?> btn btn-success" style="margin-bottom:20px;"><i class="fa fa-plus"></i> Tambah</button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="card-box table-responsive" id="show_data">

						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>


<!-- Modal untuk tambah ubah data -->
<div class="modal fade bs-example-modal-lg all-modal" id="crud-<?= $titleid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title judulmodal" id="myModalLabel">Tambah Admin</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>

			<div class="modal-body">
                <form method="post" id="form-create" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">ID Admin</label>
                            <input type="text" id="idadmin" name="idadmin" class="form-control" readonly />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Admin</label>
                            <input type="text" id="nama" name="nama" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required />
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

<script type="text/javascript">

	function load_data_tabel(){
		$.ajax({
			url: "/admin/admin_data",
			type: 'GET',
			success: function(data){
				$('#show_data').html(data);
			}
		})
	}


	function load_refresh_data(){
        //tampil new id
        $.ajax({
        	url: "/admin/admin_new_id",
        	type: 'GET',
        	success: function(data){
        		$('#idadmin').val(data.idadmin);
        	}

        });

        $('#nama').val('');
        $('#username').val('');
        $('#password').val('');
        $(".judulmodal").html('Tambah Admin');
        $('#btnform').val('Simpan');
    }

    $(document).ready(function(){
    	load_data_tabel();


    	/* tampil tambah data */
    	$(document).on('click', '.add-<?= $titleid; ?>', function(e) {
    		e.preventDefault();
    		load_refresh_data();
    	});


    	/* tampil ubah data */
    	$(document).on('click', '.edit-<?= $titleid; ?>', function(e) {
    		e.preventDefault();
    		$(".modal").modal('hide');
    		$.ajax({
    			type  : 'GET',
    			url: "/admin/admin_get_edit",
    			data:"id="+$(this).attr('data-id'),
    		}).success(function (data) {
    			$('#idadmin').val(data.idadmin);
    			$('#nama').val(data.nama);
    			$('#username').val(data.username);
    			$(".judulmodal").html('Ubah Admin');

                $('#btnform').val('Ubah');
            });
    	});


        /* simpan data */
        $('#form-create').on('submit', function(event){
            event.preventDefault();
            var btnform = $("#crud-<?= $titleid; ?>").find("input[name='btnform']").val();
            var idadmin = $("#crud-<?= $titleid; ?>").find("input[name='idadmin']").val();
            var nama = $("#crud-<?= $titleid; ?>").find("input[name='nama']").val();
            var username = $("#crud-<?= $titleid; ?>").find("input[name='username']").val();
            var password = $("#crud-<?= $titleid; ?>").find("input[name='password']").val();


            var formData = new FormData(this);
            formData.append('idadmin', idadmin);
            formData.append('nama', nama);
            formData.append('username', username);
            formData.append('password', password);

            if (btnform == "Simpan"){
                var urlform = "/admin/admin_save_data";
                var notifform = "Berhasil simpan data";
            }

            if(btnform == "Ubah"){
                var urlform = "/admin/admin_update_data";
                var notifform = "Berhasil ubah data";
            }

            if(nama != '' && username != '' && password != ''){

                $.ajax({
                    url:urlform,
                    method:"POST",
                    data:formData,
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){
                        cekdata = data.jumdtadmin;
                        if(cekdata > 0){
                            notiferror('Username sudah digunakan!!!');
                        }else{
                            load_data_tabel();
                            document.getElementById("form-create").reset();
                            $(".modal").modal('hide');
                            notifsukses(notifform);
                        }
                    }
                })
            }else{
                notiferror('Terdapat data kosong!!!');
            }
        });


    });
</script>
@endsection
