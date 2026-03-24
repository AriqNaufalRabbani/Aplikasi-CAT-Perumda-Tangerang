
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
		</div>
        <form action="<?=BASE_URL . _NAME?>/push" method="POST" enctype="multipart/form-data" id="form_add">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>News</label>
                            <textarea name="News" class="form-control" cols="30" rows="10" style="resize: none;" onchange="this.value=this.value.trim()"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Aktif</label>
                            <div class="form-inline">
                                <label style="margin-right: 0.5rem;">
                                    <input type="radio" name="Aktif" i-check="flat-blue" value="Y" required> Ya
                                </label>
                                <label>
                                    <input type="radio" name="Aktif" i-check="flat-blue" value="T"> Tidak
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