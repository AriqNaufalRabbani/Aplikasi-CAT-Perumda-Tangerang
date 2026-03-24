<?php 
    $IdGroups   = trim($data['groups']['IdGroups']);
    $NmGroups   = trim($data['groups']['NmGroups']);
    $Dashboard  = trim($data['groups']['Dashboard']);
    $isModify   = trim($data['groups']['isModify']);
    $Aktif      = trim($data['groups']['Aktif']);
?>

<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h4 class="modal-title" id="myModalLabel">Edit Data Groups</h4>
		</div>
        <form action="<?=C_NAME?>/setGroups" method="POST" enctype="multipart/form-data" id="form_edit">
            <input type="hidden" name="IdGroups" value="<?=$IdGroups?>">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Nama Groups</label>
                            <input type="text" name="NmGroups" class="form-control" placeholder="Nama Group" value="<?=$NmGroups?>" required oninput="this.value = this.value.toUpperCase()" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Dashboard</label>
                            <input type="text" name="Dashboard" class="form-control" placeholder="https://google.com" value="<?=$Dashboard?>" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <table class="table table-bordered table-striped" id="table_edit_menu" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="white-space: nowrap; min-width: 292px !important;"><input type="checkbox" id="selectAll"  i-check="flat-blue"> Pilih Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $No = 0;
                                    $JmlMenu = 0;
                                    $JmlMenuCheck = 0;
                                    foreach ($data['menu'][0] as $menu) {
                                        $No++;
                                        $ParentIdMenu = trim($menu['IdMenu']);
                                        $ParentNmMenu = trim($menu['NmMenu']);
                                        $ParentChecked  = trim($menu["Checked"]);
                                        $JmlSubMenu   = count($data['menu'][$ParentIdMenu]);

                                        $d = '';
                                        if ($JmlSubMenu > 0) {
                                            $SubNo = 'A';
                                            
                                            foreach ($data['menu'][$ParentIdMenu] as $submenu) {
                                                $IdMenu = trim($submenu["IdMenu"]);
                                                $NmMenu = trim($submenu["NmMenu"]);
                                                $Checked = trim($submenu["Checked"]);
                                                $JmlMenu++;
                                                
                                                if ($Checked == 'checked') {
                                                    if ($ParentChecked == '') {
                                                        $ParentChecked = 'checked';
                                                    }
                                                    $JmlMenuCheck++;
                                                }

                                                $d .= '
                                                    <label style="margin-right: 0.5rem; font-weight: inherit;">
                                                        <input type="checkbox" name="IdMenu[]" value="'. $IdMenu .'" class="child-menu" parent-id="'. $ParentIdMenu .'" i-check="flat-blue" '. $Checked .'>&nbsp;&nbsp;'. $SubNo .'. '. $NmMenu .'
                                                    </label>
                                                ';
                                                ++$SubNo;
                                            }

                                            echo '
                                                <tr>
                                                    <td>
                                                        <label style="margin-right: 0.5rem;"> 
                                                            <input type="checkbox" name="" parent="'. $ParentIdMenu .'" value="'. $ParentIdMenu .'" class="parent-menu" i-check="flat-blue" '. $ParentChecked .'>&nbsp;&nbsp;'. $No .'. '. $ParentNmMenu .' 
                                                        </label><br>
                                                        &emsp;'. $d .'
                                                    </td>
                                                </tr>
                                            ';
                                        }
                                        else {
                                            $JmlMenu++;
                                            if ($ParentChecked == 'checked') {
                                                $JmlMenuCheck++;
                                            }
                                            echo '
                                                <tr>
                                                    <td>
                                                        <label style="margin-right: 0.5rem;"> 
                                                        <input type="checkbox" name="IdMenu[]" value="'. $ParentIdMenu .'" i-check="flat-blue" '. $ParentChecked .'>&nbsp;&nbsp;'. $No .'. '. $ParentNmMenu .'
                                                        </label>
                                                    </td>
                                                </tr>
                                            ';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Aktif</label>
                            <div class="form-inline">
                                <label style="margin-right: 0.5rem;">
                                    <input type="radio" name="Aktif" i-check="flat-blue" value="Y" <?=($Aktif == 'Y') ? 'checked' : '';?> /> Ya
                                </label>
                                <label>
                                    <input type="radio" name="Aktif" i-check="flat-blue" value="T" <?=($Aktif == 'T') ? 'checked' : '';?> /> Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </form>
	</div>
</div>

<!-- icheck Custom script -->
<script src="<?=BASE_URL?>cdn/js/icheck-custom.js"></script>
<script>
    var table = $('#table_edit_menu').DataTable({
        "scrollX": true,
        "lengthMenu": [
            [25, 50, 100, 200, -1], 
            [25, 50, 100, 200, "All"]
        ],
        "ordering": false
    });

    $("#form_edit").on("submit", function(e){
        e.preventDefault();

        confirmModal().then(()=>{
            $('#table_edit_menu_length select[name="table_edit_menu_length"]').val(-1).trigger('change');
            submitForm(this, this.action, 'Memuat ulang...').then((res)=>{
                window.location.reload();
            });
        });
    });

    $('#selectAll').on( 'ifChanged', function () {
        if ($(this).is(':checked')) {
            table.$('input[type="checkbox"]').iCheck('check');
        } else {
            table.$('input[type="checkbox"]').iCheck('uncheck');
        }

    } );

    $('input[name="IdMenu[]"]').on('ifChanged', function(){
        var self     = $(this);
        var ParentId = self.attr('parent-id');
        var target   = $('input[parent="'+ ParentId +'"]');
        var checked  = $('input[parent-id="'+ ParentId +'"]:checked').length;

        if (checked > 0) {
            target.prop('checked', true);
            target.closest('div').addClass('checked');
        }
        else {
            target.prop('checked', false);
            target.closest('div').removeClass('checked');
        }

        var checkedLength = table.$('input[name="IdMenu[]"]').length;
        var checked       = 0;
        
        table.$('input[name="IdMenu[]"]').each(function(i, v){
            if ($(this).is(':checked')) checked++;
        });

        if (checked == checkedLength) {
            $("#selectAll").prop('checked', true);
            $("#selectAll").closest('div').addClass('checked');
        } else {
            $("#selectAll").prop('checked', false);
            $("#selectAll").closest('div').removeClass('checked');
        }
    });

    table.$('.parent-menu').on('ifChanged', function(){
        var self     = $(this);        
        var ParentId = self.val();
        var target   = $('input[parent-id="'+ ParentId +'"]');

        if (self.is(':checked')) {
            target.prop('checked', true);
            target.closest('div').addClass('checked');
        }
        else {
            target.prop('checked', false);
            target.closest('div').removeClass('checked');
        }        
    });
</script>

<?php if ($JmlMenuCheck == $JmlMenu) echo "<script>$('#selectAll').closest('div').addClass('checked')</script>"; ?>