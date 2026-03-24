
<div class="modal-dialog modal-sm">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h4 class="modal-title" id="myModalLabel">Tambah Data Users</h4>
		</div>
        <form action="<?=BASE_URL . C_NAME?>/pushUsers" method="POST" enctype="multipart/form-data" id="form_add">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
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
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Pilih Users</label>
                            <select name="Users[]" class="users form-control" multiple required></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" id="btn_submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
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
</script>