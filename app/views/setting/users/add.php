
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h4 class="modal-title" id="myModalLabel">Tambah Data Users</h4>
		</div>
        <form action="<?=BASE_URL . C_NAME?>/pushUsers" method="POST" enctype="multipart/form-data" id="form_add">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6" style="margin-bottom:10px;">
                        <div class="form-group">
                            <label>Group</label>
                            <select name="IdGroups" class="select2 form-control" required>
                                <option value="" selected disabled>Pilih Main Menu</option>
                                <?php
                                    foreach ($data['groups'] as $groups) {
                                        $IdGroups = trim($groups['IdGroups']);
                                        $NmGroups = trim($groups['NmGroups']);

                                        echo '<option value="'. $IdGroups. '">'. $NmGroups .'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6" style="margin-bottom:10px;">
                        <div class="form-group">
                            <label>Pilih Users</label>
                            <select name="Users[]" class="users form-control" multiple required></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered responsive table-striped table-add-menu" style="width:100%" id="table_add_menu">
                            <thead>
                                <tr>
                                    <th style="white-space: nowrap; min-width: 292px !important;"><input type="checkbox" id="selectAll"  i-check="flat-blue"> Pilih Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $No = 0;
                                    foreach ($data['menu'][0] as $menu) {
                                        $No++;
                                        $ParentIdMenu = trim($menu['IdMenu']);
                                        $ParentNmMenu = trim($menu['NmMenu']);
                                        $JmlSubMenu   = $data['menu'][$ParentIdMenu] ? count($data['menu'][$ParentIdMenu]) : 0;

                                        $d = '';
                                        if ($JmlSubMenu > 0) {
                                            $SubNo = 'A';
                                            
                                            foreach ($data['menu'][$ParentIdMenu] as $submenu) {
                                                $IdMenu = trim($submenu["IdMenu"]);
                                                $NmMenu = trim($submenu["NmMenu"]);
                                                $d .= '
                                                    <label style="margin-right: 0.5rem; font-weight: inherit;">
                                                        <input type="checkbox" name="IdMenu[]" value="'. $IdMenu .'" class="child-menu" parent-id="'. $ParentIdMenu .'" i-check="flat-blue">&nbsp;&nbsp;'. $SubNo .'. '. $NmMenu .'
                                                    </label>
                                                ';
                                                ++$SubNo;
                                            }

                                            echo '
                                                <tr>
                                                    <td>
                                                        <label style="margin-right: 0.5rem;"> 
                                                            <input type="checkbox" name="" parent="'. $ParentIdMenu .'" value="'. $ParentIdMenu .'" class="parent-menu" i-check="flat-blue">&nbsp;&nbsp;'. $No .'. '. $ParentNmMenu .' 
                                                        </label><br>
                                                        &emsp;'. $d .'
                                                    </td>
                                                </tr>
                                            ';
                                        }
                                        else {
                                            echo '
                                                <tr>
                                                    <td>
                                                        <label style="margin-right: 0.5rem;"> 
                                                        <input type="checkbox" name="IdMenu[]" value="'. $ParentIdMenu .'" i-check="flat-blue">&nbsp;&nbsp;'. $No .'. '. $ParentNmMenu .'
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
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" id="btn_submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Batal</button>
                    </div>
                </div>
            </div>
        </form>
	</div>
</div>

<!-- icheck Custom script -->
<script src="<?=BASE_URL?>cdn/js/icheck-custom.js"></script>
<script>
    $('.select2').select2({
        width:"100%",
    });

    $("#form_add").on("submit", function(e){
        e.preventDefault();

        confirmModal().then(()=>{
            submitForm(this, this.action, 'Memuat ulang...').then((res)=>{
                window.location.reload();
            });
        });
    });

    $('.users').select2({
        minimumInputLength: 1,
        allowClear: true,
        placeholder: 'Nama User',
        width:"100%",
        ajax: {
            dataType: 'json',
            url: '<?=C_NAME?>/getKaryawanByName',
            delay: 1000,
            data: function (params) {
                return {
                    search: params.term
                }
            },
            processResults: function (data, page) {
                return {
                    results: data
                };
            }
        }
    });

    var table = $('#table_add_menu').DataTable({
        "scrollX": true,
        "lengthMenu": [
            [25, 50, 100, 200, -1], 
            [25, 50, 100, 200, "All"]
        ],
        "ordering": false
    });

    $("#form_add").on("submit", function(e){
        e.preventDefault();

        confirmModal().then(()=>{
            $('#table_add_menu_length select[name="table_add_menu_length"]').val(-1).trigger('change');
            submitForm(this, this.action, 'Memuat ulang...').then((res)=>{
                window.location.reload();
            });
        });
    });

    $('#selectAll').on( 'ifChanged', function () {
        if ($(this).is(':checked')) {
            table.$('input[type="checkbox"]').iCheck('check').trigger('change');
        } else {
            table.$('input[type="checkbox"]').iCheck('uncheck').trigger('change');
        }
    } );

    $(".child-menu").on('ifChanged', function(){
        var self     = $(this);
        var ParentId = self.attr('parent-id');
        var target   = $('input[parent="'+ ParentId +'"]');
        var checked  = $('input[parent-id="'+ ParentId +'"]:checked').length;

        if (checked > 0) {
            target.prop('checked', true);
            target.closest('div').addClass('checked');
        } else {
            target.prop('checked', false);
            target.closest('div').removeClass('checked');
        }
    });

    $(".parent-menu").on('ifChanged', function(){
        var self     = $(this);        
        var ParentId = self.val();
        var target   = $('input[parent-id="'+ ParentId +'"]');

        if (self.is(':checked')) {
            target.prop('checked', true);
            target.closest('div').addClass('checked');
        } else {
            target.prop('checked', false);
            target.closest('div').removeClass('checked');
        }        
    });
</script>