<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h4 class="modal-title" id="myModalLabel">Tambah Data Menu</h4>
		</div>
        <form action="<?=C_NAME?>/pushMenu" method="POST" enctype="multipart/form-data" id="myForm">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
						<div class="form-group has-feedback">
                            <label>Jenis Menu</label>
                            <select name="JnsMenu" class="form-control">
                                <option value="M">Main Menu</option>
                                <option value="S">Sub Menu</option>
                            </select>
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							<div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
						<div class="form-group has-feedback">
                            <label>Parent Menu</label>
                            <select name="ParentId" class="form-control select2" disabled data-required-error="Main menu belum dipilih!">
                                <option value="" selected disabled>Pilih Main Menu</option>
                                <?php
                                    foreach ($data['parentmenu'] as $parentmenu) {
                                        $IdMenu = trim($parentmenu['IdMenu']);
                                        $NmMenu = trim($parentmenu['NmMenu']);

                                        echo '<option value="'. $IdMenu. '">'. $NmMenu .'</option>';
                                    }
                                ?>
                            </select>
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							<div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
						<div class="form-group has-feedback">
                            <label>SeqNo</label>
                            <input type="number" name="SeqNo" class="form-control" placeholder="0" min="0" data-error="Nilai minimum adalah 0" required data-required-error="Kolom harus diisi!">
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							<div class="help-block with-errors"></div>
						</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
						<div class="form-group has-feedback">
                            <label>Nama Menu</label>
                            <input type="text" name="menu" class="form-control" placeholder="Menu" required data-required-error="Kolom harus diisi!">
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							<div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
						<div class="form-group">
                            <label>Font Menu</label>
                            <input type="text" name="font" class="form-control" placeholder="fa fa-menu">
                        </div>
                    </div>
                    <div class="col-lg-4">
						<div class="form-group has-feedback">
                            <label>Link Menu</label>
                            <input type="text" name="link" class="form-control" placeholder="menu" required data-required-error="Kolom harus diisi!">
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
                                    <input type="radio" name="aktif" i-check="flat-blue" value="Y" checked required> Ya
                                </label>
                                <label>
                                    <input type="radio" name="aktif" i-check="flat-blue" value="T"> Tidak
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
            $('select[name="ParentId"]').val('').trigger('change');
            $('select[name="ParentId"]').prop('disabled', true);
            $('select[name="ParentId"]').prop('required', false);
        }
        else {
            $('select[name="ParentId"]').prop('disabled', false);
            $('select[name="ParentId"]').prop('required', true);
        }
    });
</script>
