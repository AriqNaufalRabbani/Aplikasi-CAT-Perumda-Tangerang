
<?php 
    
    $prd    = date("Y-m-d"); 
    $CutId 	= trim($data['cd']["CutId"]);
    $Prd2 	= trim($data['cd']["Prd"]);
    $mm 	= trim($data['cd']["mm"]);

?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                
                    <form action="<?=BASE_URL?>document/post" method="post" enctype="multipart/form-data" id="form_add">
                        <input type='hidden' name='CutId' value='<?=$CutId?>'>
                        <div class="form-body pal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon right">
                                            <span style="font-size:15px;">Periode <span style="color:RED;">*</span> :</span>
                                            <input id="prd" name="prd" type="date"class="form-control" value="<?php if($Prd2){ echo $Prd2; }else{ echo $prd; } ?>" required />
                                        </div>
                                    </div>
                                </div>	
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon right">
                                            <span style="font-size:15px;">Rate IDR :</span>
                                            <input id="rateidr" value="<?=$data['cd']["Rate"];?>" name="rateidr"  type="text" class="form-control money" required />
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon right">
                                            <span style="font-size:15px;">Type Material Margin :</span>
                                            <select id="mm" name="mm"  class="form-control" required />
                                                <option value="">Choose </option>
                                                <option <?php if($mm == 'ori') echo"selected"; ?> value="ori">MM Original</option>
                                                <option <?php if($mm == 'rev') echo"selected"; ?> value="rev">MM Reval</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                                $updt	 			= $data['cd']["UpdDt"];
                                $old_date 			= date($data['cd']["UpdDt"]);              // returns Saturday, January 30 10 02:06:34
                                $old_date_timestamp = strtotime($old_date);
                                $new_date 			= date('Y-m-d H:i:s', $old_date_timestamp);
                            ?>
                            <div class="form-group" style="text-align:right;">
                                Last Update : <?php if(!empty($updt)) {echo $new_date;  } else{ echo "";} ?> | By : <?php echo $data['cd']["UpdBy"];?>
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
    $("#form_add").on("submit", function(e){
        e.preventDefault();

        confirmModal().then(()=>{
            submitForm(this, this.action, 'Memuat ulang...').then((res)=>{
                window.location.reload();
            });
        });
    });
</script>
