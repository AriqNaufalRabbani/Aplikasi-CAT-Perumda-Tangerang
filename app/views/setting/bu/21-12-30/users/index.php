
<!-- Content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Users</h1>
		<ol class="breadcrumb">
			<li><a href="<?=BASE_URL?>"><i class="fa fa-chart-line"></i> Dashboard</a></li>
			<li class="">Setting</li>
			<li class="active">Users</li>
		</ol>
	</section>

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
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Groups</th>
                                    <th>Aktif</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $No = 0;
                                    foreach ($data['users'] as $Users) {
                                        $No++;
                                        $nik 	    = trim($Users['nik']);
                                        $Karyawan   = trim($Users['karyawan']);
                                        $NmGroups   = trim($Users['NmGroups']);
                                        $Aktif      = trim($Users['Aktif']);

                                        if ($Aktif == 'Y') {
                                            $BtnStatus = '<button type="button" class="btn btn-xs btn-default change-status" id-data="'. $nik .'" title="Non-Aktif" data-toggle="tooltip" data-placement="left" status="T"><i class="far fa-window-close"></i></button>';
                                        }
                                        else {
                                            $BtnStatus = '<button type="button" class="btn btn-xs btn-success change-status" id-data="'. $nik .'" title="Aktif" data-toggle="tooltip" data-placement="left" status="Y"><i class="far fa-check-square"></i></button>';
                                        }

                                        echo '
                                            <tr>
                                                <td>'.  $No .'.</td>
                                                <td>'.  $nik .'</td>
                                                <td>'.  $Karyawan .'</td>
                                                <td>'.  $NmGroups .'</td>
                                                <td class="text-center">'.  $Aktif .'</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-xs btn-warning btn-edit" id-data="'. $nik .'" title="Edit" data-toggle="tooltip" data-placement="left"><i class="far fa-pencil"></i></button>
                                                    '. $BtnStatus .'
                                                    <!-- <button type="button" class="btn btn-xs btn-info btn-reset" id-data="'. $nik .'" title="Reset Password" data-toggle="tooltip" data-placement="left"><i class="far fa-unlock-alt"></i></button> -->
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
    
</div>
<!-- Content -->

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "scrollX": true,
            "columnDefs": [
                  {"targets": 5, "orderable": false}
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

        confirmModal().then(()=>{
            $.ajax({
            	async: true,
            	url: "<?=C_NAME?>/ubah_status",
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
        });
    });
</script>