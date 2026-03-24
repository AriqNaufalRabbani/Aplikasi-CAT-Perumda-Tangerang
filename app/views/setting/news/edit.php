<?php 
    $NIK        = trim($data['user']['nik']);
    $NmKaryawan = trim($data['user']['karyawan']);
    $IdGroups    = trim($data['user']['IdGroups']);
    $Aktif      = trim($data['user']['Aktif']);
?>

<div class="modal-dialog modal-sm">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h4 class="modal-title" id="myModalLabel">Edit Data Menu</h4>
		</div>
        <form action="<?=BASE_URL . _NAME?>/setUsers" method="POST" enctype="multipart/form-data" id="form_edit">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" name="NIK" class="form-control" value="<?=$NIK?>" readonly>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="NmKaryawan" class="form-control" value="<?=$NmKaryawan?>" readonly>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Group</label>
                            <select name="IdGroups" class="form-control select2" required>
                                <option value="" disabled>Pilih Group</option>
                                <?php
                                    foreach ($data['groups'] as $groups) {
                                        $IdGroups   = trim($groups['IdGroups']);
                                        $NmGroups  = trim($groups['NmGroups']);
                                        $Selected   = ($IdGroups == $IdGroups) ? 'selected' : '';

                                        echo '<option value="'. $IdGroups. '" '. $Selected .'>'. $NmGroups .'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Aktif</label>
                            <div class="form-inline">
                                <label style="margin-right: 0.5rem;">
                                    <input type="radio" name="Aktif" i-check="flat-blue" value="Y" <?=($Aktif == 'Y') ? 'checked' : '';?>> Ya
                                </label>
                                <label>
                                    <input type="radio" name="Aktif" i-check="flat-blue" value="T" <?=($Aktif == 'T') ? 'checked' : '';?>> Tidak
                                </label>
                            </div>
                        </div>
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
    $('.select2').select2();

    var submit = false;
    $("#form_edit").on("submit", function(e){
        if (submit === false) {
            e.preventDefault();
            confirmModal().then(function(accept){
                if (accept) {
                    submit = true;
                    $('button[type="submit"]').prop('disabled', true);
                    $("#form_edit").submit();
                } else {
                    submit = false;
                }
            });
        }
    });
</script>