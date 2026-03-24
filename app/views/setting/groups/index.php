
<!-- X-Editables -->
<link href="cdn/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
<script src="cdn/plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="text-right">
                        <button type="button" class="btn btn-sm btn-primary text-right btn-add"><i class="fa fa-plus-square"></i> Tambah Data</button>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Group</th>
                                <th>Dashboard</th>
                                <th>Modify</th>
                                <th>Menu</th>
                                <th>Aktif</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $No = 0;
                                foreach ($data['groups'] as $groups) {
                                    $No++;
                                    $IdGroups 	= trim($groups['IdGroups']);
                                    $NmGroups 	= trim($groups['NmGroups']);
                                    $Dashboard 	= trim($groups['Dashboard']);
                                    $Aktif 	    = trim($groups['Aktif']);

                                    if ($Aktif == 'Y') {
                                        $BtnStatus = '<button type="button" class="btn btn-xs btn-default change-status" id-data="'. $IdGroups .'" title="Non-Aktif" data-toggle="tooltip" data-placement="left" status="T"><i class="far fa-window-close"></i></button>';
                                    }
                                    else {
                                        $BtnStatus = '<button type="button" class="btn btn-xs btn-success change-status" id-data="'. $IdGroups .'" title="Aktif" data-toggle="tooltip" data-placement="left" status="Y"><i class="far fa-check-square"></i></button>';
                                    }

                                    echo '
                                        <tr style="font-weight: bold;">
                                            <td>'. $No .'.</td>
                                            <td>'. $NmGroups .'</td>
                                            <td>'. $Dashboard .'</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center"></td>
                                            <td class="text-center">'. $Aktif .'</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-xs btn-warning btn-edit" id-data="'. $IdGroups .'" title="Edit" data-toggle="tooltip" data-placement="left"><i class="far fa-pencil"></i></button>
                                                '. $BtnStatus .'
                                            </td>
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
</section>
<!-- /.content -->

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "scrollX": true,
            "order": [ 1, 'asc' ],
            "columnDefs": [
                {"targets": 6, "orderable": false}
            ],
            "lengthMenu": [
                [25, 50, 100, 200, -1], 
                [25, 50, 100, 200, "All"]
            ]
        });
    });

    $('#example').editable({
        container: 'body',
        selector: 'a.isModify',
        url: '<?=C_NAME?>/setModify',
        title: 'Modify',
        type: 'POST',
        source:[{value: "Y", text: "Y"}, {value: "N", text: "N"}],
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

    $(document).on('click', '.btn-add', function(){
		$.ajax({
			async: true,
			url: "<?=C_NAME?>/add",
			type: "POST",
			data : {
                
            },
			beforeSend: function(){
                $("#custom-loader1").show();
			},
			success: function (ajaxData){
				$("#MainModal").html(ajaxData);
				$("#MainModal").modal('show',{backdrop: 'true'});
			},
			complete: function(){
                $("#custom-loader1").hide();
			}
		});
    });

    $(document).on('click', '.btn-edit', function(){
        var IdGroups = $(this).attr('id-data');
		$.ajax({
			async: true,
			url: "<?=C_NAME?>/edit",
			type: "POST",
			data : {
                IdGroups: IdGroups
            },
			beforeSend: function(){
                $("#custom-loader1").show();
			},
			success: function (ajaxData){
				$("#MainModal").html(ajaxData);
				$("#MainModal").modal('show',{backdrop: 'true'});
			},
			complete: function(){
                $("#custom-loader1").hide();
			}
		});
    });

    $(document).on('click', '.change-status', function(){
        var id     = $(this).attr('id-data');
        var status = $(this).attr('status');
        var text   = (status == 'Y') ? 'Aktifkan data?' : 'Non-aktifkan data?';
        
        confirmModal({title: text}).then(()=>{
            $.ajax({
                async: true,
                url: "<?=C_NAME?>/ubah_status",
                type: "POST",
                data : {
                    Id: id,
                    Status: status
                },
                beforeSend: function(){
                    $("#custom-loader1").show();
                },
                success: function (d){
                    var data = JSON.parse(d);

                    if (data.result = 'success') {
                        window.location.reload();
                    }
                    else {
                        Swal.fire({
                            icon: 'error',
                            title   : "Data gagal diubah",
                        });
                    }
                },
                complete: function(){
                    $("#custom-loader1").hide();
                }
            });
        });
    });

    $(document).on('click', '.btn-delete', function(){
        var self  = $(this);
        var id    = $(this).attr('id-data');

        confirmModal({title: 'Hapus data?'}).then(()=>{
            $.ajax({
                async: true,
                url: "<?=C_NAME?>/hapus_menu",
                type: "POST",
                data : {
                    Id: id
                },
                beforeSend: function(){
                    $("#custom-loader1").show();
                },
                success: function (d){
                    var data = JSON.parse(d);

                    if (data.result = 'success') {
                        self.closest('tr').remove();
                    }
                    else {
                        Swal.fire({
                            icon: 'error',
                            title: "Data gagal dihapus",
                        });
                    }
                },
                complete: function(){
                    $("#custom-loader1").hide();
                }
            });
        });
    });
</script>