<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h4 class="modal-title" id="myModalLabel">Tambah Data Groups</h4>
		</div>
        <form action="<?=C_NAME?>/pushGroups" method="POST" enctype="multipart/form-data" id="form_add">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Nama Groups</label>
                            <input type="text" name="NmGroups" class="form-control" placeholder="Nama Group" required oninput="this.value = this.value.toUpperCase();" onchange="this.value = this.value.trim();">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Dashboard</label>
                            <input type="text" name="Dashboard" class="form-control" placeholder="https://google.com" onchange="this.value = this.value.trim();">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Aktif</label>
                            <div class="form-inline">
                                <label style="margin-right: 0.5rem;">
                                    <input type="radio" name="Aktif" i-check="flat-blue" value="Y" checked required> Ya
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
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Batal</button>
                    </div>
                </div>
            </div>
        </form>
	</div>
</div>

<!-- icheck Custom script -->
<!-- <script src="<?=BASE_URL?>cdn/js/icheck-custom.js?<?=filemtime('cdn/js/icheck-custom.js')?>"></script> -->
<script>
    // var table = $('#table_add_menu').DataTable({
    //     "scrollX": true,
    //     "lengthMenu": [
    //         [25, 50, 100, 200, -1], 
    //         [25, 50, 100, 200, "All"]
    //     ],
    //     "ordering": false
    // });

    $("#form_add").on("submit", function(e){
        e.preventDefault();

        confirmModal().then(()=>{
            // $('#table_add_menu_length select[name="table_add_menu_length"]').val(-1).trigger('change');
            submitForm(this, this.action, 'Memuat ulang...').then((res)=>{
                window.location.reload();
            });
        });
    });

    // $('#selectAll').on( 'ifChanged', function () {
    //     // var length = $('#table_add_menu_length select[name="table_add_menu_length"]').val();

    //     if ($(this).is(':checked')) {
    //         table.$('input[type="checkbox"]').iCheck('check').trigger('change');
    //         // $('#table_add_menu_length select[name="table_add_menu_length"]').val(-1).trigger('change');
    //         // $(".table-add-menu tbody").find('input').iCheck('check');
    //         // $('#table_add_menu_length select[name="table_add_menu_length"]').val(length).trigger('change');
    //     } else {
    //         table.$('input[type="checkbox"]').iCheck('uncheck').trigger('change');
    //         // $('#table_add_menu_length select[name="table_add_menu_length"]').val(-1).trigger('change');
    //         // $(".table-add-menu tbody").find('input').iCheck('uncheck');
    //         // $('#table_add_menu_length select[name="table_add_menu_length"]').val(length).trigger('change');
    //     }

    // } );

    // $(".child-menu").on('ifChanged', function(){
    //     var self     = $(this);
    //     var ParentId = self.attr('parent-id');
    //     var target   = $('input[parent="'+ ParentId +'"]');
    //     var checked  = $('input[parent-id="'+ ParentId +'"]:checked').length;

    //     if (checked > 0) {
    //         target.prop('checked', true);
    //         target.closest('div').addClass('checked');
    //     } else {
    //         target.prop('checked', false);
    //         target.closest('div').removeClass('checked');
    //     }
    // });

    // $(".parent-menu").on('ifChanged', function(){
    //     var self     = $(this);        
    //     var ParentId = self.val();
    //     var target   = $('input[parent-id="'+ ParentId +'"]');

    //     if (self.is(':checked')) {
    //         target.prop('checked', true);
    //         target.closest('div').addClass('checked');
    //     } else {
    //         target.prop('checked', false);
    //         target.closest('div').removeClass('checked');
    //     }        
    // });
</script>