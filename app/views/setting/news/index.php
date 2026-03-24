
<!-- X-Editables -->
<link href="cdn/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
<script src="cdn/plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 style="margin-top: 0px;">Tambah Data</h3>
                            <table class="table table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>News</th>
                                        <th style="text-align: center; width: 10%;">Aktif</th>
                                        <th style="text-align: center; width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#" class="addNewData" id="add_news" data-name="News" data-type="textarea"></a></td>
                                        <td style="text-align: center;"><a href="#" class="addNewData" id="add_aktif" data-name="Aktif" data-type="select"></a></td>
                                        <td style="text-align: center;">
                                            <button type="button" class="btn btn-primary btn-sm" id="btn_submit"><i class="fa fa-check"></i> Submit</button>
                                            <button type="button" class="btn btn-secondary btn-sm" id="btn_reset"><i class="fa fa-eraser"></i> Reset</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <table id="example" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>News</th>
                                        <th>Aktif</th>
                                        <th style="white-space: nowrap;">Create Date</th>
                                        <th style="white-space: nowrap;">Create By</th>
                                        <th style="white-space: nowrap;">Update Date</th>
                                        <th style="white-space: nowrap;">Update By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $No = 0;
                                        foreach ($data['news'] as $getNews) {
                                            $No++;
                                            $IdNews  = trim($getNews['IdNews']);
                                            $News    = trim($getNews['News']);
                                            $Aktif   = trim($getNews['Aktif']);
                                            $CrtDt   = trim($getNews['CrtDt']);
                                            $CrtBy   = trim($getNews['CrtBy']);
                                            $UpdDt   = trim($getNews['UpdDt']);
                                            $UpdBy   = trim($getNews['UpdBy']);

                                            echo '
                                                <tr>
                                                    <td class="text-center">'.  $No .'.</td>
                                                    <td>
                                                        <a href="#" data-name="news" class="news" data-type="textarea" data-pk="'. $IdNews .'">'.  $News .'</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" data-name="aktif" class="aktif" data-type="select" data-pk="'. $IdNews .'">'.  $Aktif .'</a>
                                                    </td>
                                                    <td>'.  date('Y/m/d H:i', strtotime($CrtDt)) .'</td>
                                                    <td>'.  $CrtBy .'</td>
                                                    <td>'.  date('Y/m/d H:i', strtotime($UpdDt)) .'</td>
                                                    <td>'.  $UpdBy .'</td>
                                                </tr>
                                            ';
                                        }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "scrollX": true,
            "lengthMenu": [
                [25, 50, 100, 200, -1], 
                [25, 50, 100, 200, "All"]
            ]
        });
    });

    $(document).on('click', '.btn-add', function(){
		$.ajax({
			async: true,
			url: "<?=C_NAME?>/add",
			type: "POST",
			data : {
                
            },
			beforeSend: function(){
                $("#ModalLoader").show();
			},
			success: function (ajaxData){
				$("#MainModal").html(ajaxData);
				$("#MainModal").modal('show',{backdrop: 'true'});
			},
			complete: function(){
                $("#ModalLoader").hide();
			}
		});
    });

    $(document).on('click', '.btn-edit', function(){
        var NIK = $(this).attr('id-data');
		$.ajax({
			async: true,
			url: "<?=C_NAME?>/edit",
			type: "POST",
			data : {
                NIK: NIK
            },
			beforeSend: function(){
                $("#ModalLoader").show();
			},
			success: function (ajaxData){
				$("#MainModal").html(ajaxData);
				$("#MainModal").modal('show',{backdrop: 'true'});
			},
			complete: function(){
                $("#ModalLoader").hide();
			}
		});
    });

    $(document).on('click', '.change-status', function(){
        var nik    = $(this).attr('id-data');
        var status = $(this).attr('status');
        var text   = (status == 'Y') ? 'Aktifkan Data?' : 'Non-aktifkan Data?';

        confirmModal().then(function(accept){
            if (accept) {
                $.ajax({
                	async: true,
                	url: "users/ubah_status",
                	type: "POST",
                	data : {
                        NIK: nik,
                        Status: status
                    },
                	beforeSend: function(){
                        $("#ModalLoader").show();
                	},
                	success: function (d){
                		var data = JSON.parse(d);

                        if (data.result = 'success') {
                            window.location.reload();
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title	: "Data gagal diubah",
                            });
                        }
                	},
                	complete: function(){
                        $("#ModalLoader").hide();
                	}
                });
            }
        });
    });

    $('#example').editable({
        container: 'body',
        selector: 'a.news',
        url: '<?=C_NAME?>/setNews',
        title: 'News',
        type: 'POST',
        params: function(params) {
            return params;
        },
        validate:function(value){
            if ($.trim(value) == '') {
                return 'Harus diisi.';
            }
        },
        success: function(response, newValue) {
            var data = JSON.parse(response);

            if (data.result != 'success') {
                alert('Gagal menyimpan');
                return false;
            }
        }
    });

    $('#example').editable({
        container: 'body',
        selector: 'a.aktif',
        url: '<?=C_NAME?>/setNews',
        title: 'Aktif',
        type: 'POST',
        source:[{value: "Y", text: "Y"}, {value: "T", text: "T"}],
        validate:function(value){
            if ($.trim(value) == '') {
                return 'Harus diisi.';
            }
        },
        success: function(response, newValue) {
            var data = JSON.parse(response);

            if (data.result != 'success') {
                alert('Gagal menyimpan');
                return false;
            }
        }
    });

    $('#add_news').editable({
        title: 'News',
        validate:function(value){
            if ($.trim(value) == '') {
                $(this).focus();
                return 'Harus diisi.';
            }
        }
    });

    $('#add_aktif').editable({
        title: 'Aktif',
        source:[{value: "Y", text: "Y"}, {value: "T", text: "T"}],
        validate:function(value){
            if ($.trim(value) == '') {
                return 'Harus diisi.';
            }
        }
    });

    $('#btn_submit').click(function() {
        $('.addNewData').editable('submit', {
            url: '<?=C_NAME?>/push', 
            ajaxOptions: {
                dataType: 'json'
            },
            params: function(params) {
                return params;
            },
            success: function(data, config) {
                if (data.result == 'success') {
                    window.location.reload();
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title	: 'Gagal menambahkan data'
                    });
                }
            },
            error: function(errors) {
                console.log(errors);
            }
        });
    });

    $('#btn_reset').click(function() {
        $('.addNewData').editable('setValue', null)
            .editable('option', 'pk', null)
            .removeClass('editable-unsaved');
    });
</script>