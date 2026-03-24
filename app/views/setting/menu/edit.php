<?php
    $IdMenu       = trim($data['menu']['IdMenu']);
    $ParentIdMenu = trim($data['menu']['ParentId']);
    $StatusMenu   = trim($data['menu']['StatusMenu']);
    $ParentNmMenu = trim($data['menu']['NmMenu']);
    $ParentIcon   = trim($data['menu']['IconMenu']);
    $ParentLink   = trim($data['menu']['LinkMenu']);
    $SeqNo        = trim($data['menu']['SeqNo']);
    $ParentAktif  = trim($data['menu']['Aktif']);
?>

<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h4 class="modal-title" id="myModalLabel">Edit Data Menu</h4>
		</div>
        <form action="<?=C_NAME?>/setMenu" method="POST" enctype="multipart/form-data" id="myForm">
            <input type="hidden" name="IdMenu" value="<?=$IdMenu?>">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Jenis Menu</label>
                            <select name="JnsMenu" class="form-control">
                                <option value="M" <?=$StatusMenu == 'M' ? 'selected' : ''?>>Main Menu</option>
                                <option value="S" <?=$StatusMenu == 'S' ? 'selected' : ''?>>Sub Menu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Parent Menu</label>
                            <select name="ParentId" class="form-control select2" <?=$ParentIdMenu == '0' ? 'disabled' : '';?>>
                                <option value="" disabled <?=$ParentIdMenu == '0' ? 'selected' : '';?>>Pilih Main Menu</option>
                                <?php
                                    foreach ($data['parentmenu'] as $parentmenu) {
                                        $IdSubMenu = trim($parentmenu['IdMenu']);
                                        $NmSubMenu = trim($parentmenu['NmMenu']);
                                        $Selected = $IdSubMenu == $ParentIdMenu ? 'selected' : '';

                                        echo '<option value="'. $IdSubMenu. '" '. $Selected .'>'. $NmSubMenu .'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>SeqNo</label>
                            <input type="number" name="SeqNo" class="form-control" placeholder="Menu" required value="<?=$SeqNo?>" />
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							<div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Nama Menu</label>
                            <input type="text" name="menu" class="form-control" placeholder="Menu" required value="<?=$ParentNmMenu?>" />
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							<div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Font Menu</label>
                            <input type="text" name="font" class="form-control" placeholder="fa fa-menu" value="<?=$ParentIcon?>" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Link Menu</label>
                            <input type="text" name="link" class="form-control" placeholder="menu" required value="<?=$ParentLink?>" />
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							<div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Aktif</label>
                            <div class="form-inline">
                                <label style="margin-right: 0.5rem;">
                                    <input type="radio" name="aktif" i-check="flat-blue" value="Y" <?=$ParentAktif == 'Y' ? 'checked' : '';?> required /> Ya
                                </label>
                                <label>
                                    <input type="radio" name="aktif" i-check="flat-blue" value="T" <?=$ParentAktif == 'T' ? 'checked' : '';?> /> Tidak
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
    $('#myForm').validator().on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            e.preventDefault();
            confirmModal().then(()=>{
                submitForm(this, this.action, 'Memuat ulang...').then((res)=>{
                    window.location.reload();
                });
            });
        }
    });

    $('.select2').select2({
        width:"100%",
    });

    $('select[name="JnsMenu"]').on('change', function(){
        var JnsMenu = $(this).val();

        if (JnsMenu == 'M') {
            $('select[name="ParentId"]').val("").trigger('change');
            $('select[name="ParentId"]').prop('disabled', true);
        }
        else {
            $('select[name="ParentId"]').prop('disabled', false);
        }
    });
</script>
