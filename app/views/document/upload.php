
<link rel="stylesheet" href="<?=BASE_URL?>cdn/plugins/year-picker/yearpicker.css">
<script src="<?=BASE_URL?>cdn/plugins/year-picker/yearpicker.js"></script>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <form action="<?=BASE_URL?>document/upload_document" method="post" enctype="multipart/form-data" id="form_add">
                        <div class="form-body pal">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-icon right">
                                            <label>File Document Xls <span style="color:RED;">*</span> :</label> (Max File 5 MB)
                                            <input id="fupload" name="fupload" required type="file"class="form-control" accept="application/vnd.ms-excel"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-icon right">
                                            <label>Year</label>
                                            <input name="thn" required type="number" min="<?=date('Y')?>" max="9999" placeholder="<?=date('Y')?>" class="form-control yearpicker">
                                            <!-- <input name="thn" required type="text" class="form-control yearpicker"> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon ">
                                            <label>Template Upload Budget <span style="color:RED;">*</span> :</label>
                                            <div class="form-control">
                                                <b><a href="<?=BASE_URL?>document/ex_template" style="color:blue;"><i style="margin-top:1px;padding-top:1px;" class="fa fa-paperclip "></i> Download Template Upload Budget .xls</a></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Save</button>
                                <button type="reset" class="btn btn-default" onclick="self.history.back()"><i class="fa fa-times"></i> Cancel</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change', '#fupload', function(){
            var self      = $(this);
            var file      = this.files[0];

            if (file) {
                var fileName  = file.name;
                var fileSize  = file.size;
                var fileType  = file.type;
                var fileAllow = ["application/vnd.ms-excel"];                

                if (!fileAllow.includes(fileType)) {
                    self.val("");

                    Swal.fire({
                        icon: 'error',
                        text: 'Jenis file harus .xls'
                    });
                } else if (fileSize > 5242880) {
                    self.val("");

                    Swal.fire({
                        icon: 'error',
                        text: 'Ukuran file tidak boleh lebih dari 5MB!'
                    });
                } 
                else {
                    return true;
                }
            } else {
                self.val("");
            }
        });
    });
    
    $('.yearpicker').yearpicker({
        startYear: '<?=date('Y')?>',
    });

    $("#form_add").on("submit", function(e){
        e.preventDefault();

        confirmModal().then(()=>{
            submitForm(this, this.action, 'Memuat ulang...').then((res)=>{
                window.location.reload();
            });
        });
    });
</script>