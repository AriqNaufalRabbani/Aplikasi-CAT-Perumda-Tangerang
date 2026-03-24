
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
                                <th>Nama Menu</th>
                                <th>Sub Menu</th>
                                <th>Link</th>
                                <th>Icon</th>
                                <th>SeqNo</th>
                                <th>Jenis Menu</th>
                                <th>Aktif</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $No = 0;
                                foreach ($data['menu'][0] as $ParentMenu) {
                                    $No++;
                                    $ParentId 	= trim($ParentMenu['IdMenu']);
                                    $NmMenu   	= trim($ParentMenu['NmMenu']);
                                    $ParentIcon = trim($ParentMenu['IconMenu']);
                                    $ParentLink = trim($ParentMenu['LinkMenu']);
                                    $ParentSeqNo = trim($ParentMenu['SeqNo']);
                                    $ParentAktif = trim($ParentMenu['Aktif']);
                                    // $JmlSubMenu  = count($data['menu'][$ParentId]);

                                    $BtnActive = $ParentAktif == 'Y' ? '<button type="button" class="btn btn-xs btn-default change-status" id-menu="'. $ParentId .'" title="Non-Aktif" data-toggle="tooltip" data-placement="left" status="T"><i class="far fa-window-close"></i></button>' : '<button type="button" class="btn btn-xs btn-success change-status" id-menu="'. $ParentId .'" title="Aktif" data-toggle="tooltip" data-placement="left" status="Y"><i class="far fa-check-square"></i></button>';

                                    echo '
                                        <tr style="font-weight: bold;">
                                            <td>'. $No .'.</td>
                                            <td>'. $NmMenu .'</td>
                                            <td>-</td>
                                            <td>'. $ParentLink .'</td>
                                            <td>'. $ParentIcon .'</td>
                                            <td class="text-center">'. $ParentSeqNo .'</td>
                                            <td class="text-center">Main Menu</td>
                                            <td class="text-center">'. $ParentAktif .'</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-xs btn-warning btn-edit" id-menu="'. $ParentId .'" title="Edit" data-toggle="tooltip" data-placement="left"><i class="far fa-pencil"></i></button>
                                                '. $BtnActive .'
                                            </td>
                                        </tr>
                                    ';

                                    if ($data['menu'][$ParentId]) {
                                        $SubNo = 'a';
                                        foreach ($data['menu'][$ParentId] as $SubMenu) {
                                            $SubId 		  = trim($SubMenu['IdMenu']);
                                            $SubMenuNm    = trim($SubMenu['NmMenu']);
                                            $SubMenuIcon  = trim($SubMenu['IconMenu']);
                                            $SubMenuLink  = trim($SubMenu['LinkMenu']);
                                            $SubMenuSeqNo = trim($SubMenu['SeqNo']);
                                            $SubMenuAktif = trim($SubMenu['Aktif']);

                                            $BtnActive = $SubMenuAktif == 'Y' ? '<button type="button" class="btn btn-xs btn-default change-status" id-menu="'. $SubId .'" title="Non-Aktif" data-toggle="tooltip" data-placement="left" status="T"><i class="far fa-window-close"></i></button>' : '<button type="button" class="btn btn-xs btn-success change-status" id-menu="'. $SubId .'" title="Aktif" data-toggle="tooltip" data-placement="left" status="Y"><i class="far fa-check-square"></i></button>';

                                            echo '
                                                <tr>
                                                    <td>&emsp;'. $No .'.'. $SubNo .'</td>
                                                    <td>&emsp;'. $NmMenu .'</td>
                                                    <td style="font-weight: bold;">'. $SubMenuNm .'</td>
                                                    <td>&emsp;'. $SubMenuLink .'</td>
                                                    <td>&emsp;'. $SubMenuIcon .'</td>
                                                    <td class="text-center">'. $SubMenuSeqNo .'</td>
                                                    <td class="text-center">Sub Menu</td>
                                                    <td class="text-center">'. $SubMenuAktif .'</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-xs btn-warning btn-edit" id-menu="'. $SubId .'" title="Edit" data-toggle="tooltip" data-placement="left"><i class="far fa-pencil"></i></button>
                                                        '. $BtnActive .'
                                                        <button type="button" class="btn btn-xs btn-danger btn-delete" id-menu="'. $SubId .'" title="Hapus" data-toggle="tooltip" data-placement="left"><i class="far fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            ';
                                            ++$SubNo;
                                        }
                                    }
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
                  {"targets": 8, "orderable": false}
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
        var IdMenu = $(this).attr('id-menu');
		$.ajax({
			async: true,
			url: "<?=C_NAME?>/edit",
			type: "POST",
			data : {
                IdMenu: IdMenu
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
        var IdMenu = $(this).attr('id-menu');
        var status = $(this).attr('status');
        var text   = (status == 'Y') ? 'Aktifkan data?' : 'Non-aktifkan data?';

		Swal.fire({
			icon: 'question',
			title: text,
			showCancelButton: true,
			confirmButtonText: `Ya`,
			cancelButtonText: `Batal`,
		})
		.then((act) => {
			if (act.isConfirmed) {
                $.ajax({
                	async: true,
                	url: "<?=C_NAME?>/ubah_status",
                	type: "POST",
                	data : {
                        IdMenu: IdMenu,
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
			}
		});
    });

    $(document).on('click', '.btn-delete', function(){
        var self = $(this);
        var Id   = $(this).attr('id-menu');

        confirmModal({title: 'Hapus data?'}).then(()=>{
            $.ajax({
                async: true,
                url: "<?=C_NAME?>/delete",
                type: "POST",
                data : {
                    Id: Id
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
