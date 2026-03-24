<style type="text/css">
    td ul{
        padding-left: 20px;
    }
</style>

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
                                <th>Nama Lengkap</th>
                                <th>NIK</th>
                                <th>Groups</th>
                                <th>Kode Sales</th>
                                <th>Aktif</th>
                                <th>Menu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $No = 0;
                                foreach ($data['users'] as $Users) {
                                    $No++;
                                    $IdUser     = trim($Users['IdUser']);
                                    $nik 	    = trim($Users['nik']);
                                    $Karyawan   = trim($Users['karyawan']);
                                    $NmGroups   = trim($Users['NmGroups']);
                                    $KdSales    = trim($Users['kdsales']);
                                    $Aktif      = trim($Users['Aktif']);

                                    if ($Aktif == 'Y') {
                                        $BtnStatus = '<button type="button" class="btn btn-xs btn-default change-status" id-data="'. $nik .'" title="Non-Aktif" data-toggle="tooltip" data-placement="left" status="T"><i class="far fa-window-close"></i></button>';
                                    }
                                    else {
                                        $BtnStatus = '<button type="button" class="btn btn-xs btn-success change-status" id-data="'. $nik .'" title="Aktif" data-toggle="tooltip" data-placement="left" status="Y"><i class="far fa-check-square"></i></button>';
                                    }

                                    $listMenu = '';
                                    if ($data['users_menu'][$IdUser]['ListParentId']) {
                                        foreach ($data['users_menu'][$IdUser]['ListParentId'] as $key => $value) {
                                            $listMenu .= '<div style="font-weight: bold;">'. $value .'</div>';

                                            $listMenu .= "<ul>";
                                            foreach ($data['users_menu'][$IdUser][$key] as $value1) {
                                                $IdMenu = trim($value1['IdMenu']);
                                                $NmMenu = trim($value1['NmMenu']);

                                                if ($key == $IdMenu) continue;
                                                
                                                $listMenu .= "<li>$NmMenu</li>";
                                            }
                                            $listMenu .= "</ul>";
                                        }
                                    }

                                    echo '
                                        <tr>
                                            <td>'.  $No .'.</td>
                                            <td>'.  $Karyawan .'</td>
                                            <td>'.  $nik .'</td>
                                            <td>'.  $NmGroups .'</td>
                                            <td>'.  $KdSales .'</td>
                                            <td class="text-center">'.  $Aktif .'</td>
                                            <td>
                                                '. $listMenu .'
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-xs btn-warning btn-edit" id-data="'. $nik .'" title="Edit" data-toggle="tooltip" data-placement="left"><i class="far fa-pencil"></i></button>
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
            "columnDefs": [
                  // {"targets": 5, "orderable": false}
            ],
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
        var NIK = $(this).attr('id-data');
		$.ajax({
			async: true,
			url: "<?=C_NAME?>/edit",
			type: "POST",
			data : {
                NIK: NIK
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
        var nik    = $(this).attr('id-data');
        var status = $(this).attr('status');
        var text   = (status == 'Y') ? 'Aktifkan User?' : 'Non-aktifkan User?';

        confirmModal({title: text}).then(()=>{
            $.ajax({
            	async: true,
            	url: "<?=C_NAME?>/ubah_status",
            	type: "POST",
            	data : {
                    NIK: nik,
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
                            title: "Data gagal diubah",
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