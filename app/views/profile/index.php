
<?php 
    $Phone  = trim($data['user']['phone']);
    $Alamat = trim($data['user']['alamat']);
    $Pict   = 'cdn/images/users/' . USERPICT . '?' . filemtime('cdn/images/users/' . USERPICT);
?>

<!-- Content -->
<div class="">
	<!-- Content Header (Page header) -->
	<!-- <section class="content-header">
		<h1>Profile</h1>
		<ol class="breadcrumb">
			<li><a href="<?=BASE_URL?>"><i class="fa fa-chart-line"></i> Dashboard</a></li>
			<li class="active">Profile</li>
		</ol>
	</section> -->

    <style>
        #tbl_profile .td-label{
            max-width: 30px;
        }
    </style>

	<!-- Main content -->
	<section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-default">
                    <div class="box-body">
                        <form action="profile/setProfile" method="POST" enctype="multipart/form-data" id="form_profile">
                            <div class="row">
                                <div style="display: flex; justify-content: center; margin-bottom: 1rem;">
                                    <div style="border: 2px solid #d2d6de; border-radius: 15px; padding: 5px;">
                                        <img src="<?=$Pict?>" class="viewer" id="pict_privew" alt="User Picture" style="width: 144px; height: 144px; border-radius: 15px; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-horizontal" style="max-width: 720px; margin: auto;">
                                        <div class="form-group">
                                            <label class="col-sm-3">Foto</label>
                                            <div class="col-sm-7">
                                                <input type="hidden" name="tmpPict" value="<?=USERPICT?>" />
                                                <input type="hidden" name="tmpNewPict" />
                                                <input type="file" name="pict" class="form-control" accept="image/*" id="fileInput" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">User ID</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" value="<?=USERID?>" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">Nama</label>
                                            <div class="col-sm-7">
                                            <input type="text" class="form-control" value="<?=USERNAME?>" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">E-mail</label>
                                            <div class="col-sm-7">
                                            <input type="text" class="form-control" name="email" value="<?=$_SESSION['email']?>" placeholder="example@supernova-id.com" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">No. Handphone</label>
                                            <div class="col-sm-7">
                                            <input type="text" class="form-control" name="phone" value="<?=$Phone?>" placeholder="08xxxxxxxxxx" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">Alamat</label>
                                            <div class="col-sm-7">
                                                <textarea name="alamat" class="form-control" rows="3" style="resize: none;"><?=$Alamat?></textarea>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="col-sm-3">Password</label>
                                            <div class="col-sm-7">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" autocomplete="off" name="password" value="" placeholder="********" readonly />
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-default" id="btn_show_password" style="display: none;"><i class="fa fa-eye"></i></button>
                                                        <button type="button" class="btn btn-warning" id="btn_ubah_password"><i class="fa fa-key"></i> Ubah</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                        <div class="form-group">
                                            <div class="col-sm-12" style="text-align: center;">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</section>
	<!-- /.content -->
    
</div>
<!-- Content -->

<script>
    var z = $('#form_profile').serialize();

    function isFormModify(){
        var a = $('#form_profile').serialize();

        if (a == z) {
            return false;
        }
        else {
            return true;
        }
    }
    
    $("#form_profile").on("submit", function(e){
        e.preventDefault();

        var isModify = isFormModify();

        if (isModify) {
            confirmModal().then(()=>{
                $('button[type="submit"]').prop('disabled', true);
                submitForm(this, this.action, 'Memuat ulang...').then((res)=>{
                    if (res) {
                        window.location.reload();
                    } else {
                        console.log(res);
                    }
                });
            });
        } else {
            alertModal('error', 'Tidak ada perubahan data');
        }
    });

    const currPict  = $('#pict_privew').attr('src');
    $(document).on('change', 'input[name="pict"]', function(){
        var self      = $(this);
        var file      = this.files[0];

        if (file) {
            var fileName  = file.name;
            var fileSize  = file.size;
            var fileType  = file.type;
            var fileAllow = ["image/jpeg", "image/jpg", "image/png"];

            if (!fileAllow.includes(fileType)) {
                $('input[name="tmpNewPict"]').val("");
                self.val("");
                $("#pict_privew").attr('src', currPict);

                Swal.fire({
                    icon: 'error',
                    text: 'Jenis gambar yang diperbolehkan adalah JPG, JPEG dan PNG!'
                });
            } else if (fileSize > 2097152) {
                $('input[name="tmpNewPict"]').val("");
                self.val("");
                $("#pict_privew").attr('src', currPict);

                Swal.fire({
                    icon: 'error',
                    text: 'Ukuran gambar tidak boleh lebih dari 2MB!'
                });
            } else {
                var fileReader 	  = new FileReader();
                fileReader.onload = function (e) {
                    $("#pict_privew").attr('src', e.target.result);
                    $('input[name="tmpNewPict"]').val('Y');
                }
                fileReader.readAsDataURL(file);
            }
        } else {
            $("#pict_privew").attr('src', currPict);
            $('input[name="tmpNewPict"]').val("");
        }
    });

    // $('#btn_show_password').on('click', function(){
    //     var self = $(this);
    //     var target = $('input[name="password"]');

    //     if (!self.hasClass('password-show')) {
    //         target.attr('type', 'text');
    //         self.toggleClass('password-show');
    //     }
    //     else {
    //         target.attr('type', 'password');
    //         self.toggleClass('password-show');
    //     }
    // });

    // $('#btn_ubah_password').on('click', function(){
    //     var self   = $(this);
    //     var target = $('input[name="password"]');

    //     if (target.prop('readonly')) {
    //         $('#btn_show_password').show();

    //         target.prop('readonly', false);
    //         target.focus();

    //         self.html('<i class="fa fa-key"></i> Batal');
    //         self.toggleClass('btn-warning');
    //         self.addClass('btn-danger');
    //     }
    //     else {
    //         $('#btn_show_password').hide();
    //         $('#btn_show_password').removeClass('password-show');

    //         target.val("");
    //         target.attr('type', 'password');
    //         target.prop('readonly', true);

    //         self.html('<i class="fa fa-key"></i> Ubah');
    //         self.toggleClass('btn-danger');
    //         self.addClass('btn-warning');
    //     }
    // });
</script>