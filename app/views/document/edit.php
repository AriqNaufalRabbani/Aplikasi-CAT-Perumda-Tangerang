<?php 
    $prd 		= $_GET['prd'];
    $year		= '20'.''.substr($_GET['prd'],0,2);
    $bln 		= substr($_GET['prd'],2,2);
    $groups 	= $_GET['groups'];
    $kdsales 	= $_GET['kdsales'];
?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <form action="<?=BASE_URL?>document/process_edit" method="post" enctype="multipart/form-data" id="form_add">
                        <input type='hidden' name='prd' value='<?=$prd?>'>
                        <input type='hidden' name='groups' value='<?=$groups?>'>
                        <input type='hidden' name='kdsales' value='<?=$kdsales?>'>
                        <div class="form-body pal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon right">
                                            <span style="font-size:15px;">Periode <span style="color:RED;">*</span> :</span>
                                            <input id="prd" readonly value="<?=$year.'-'.$bln;?>" type="month"class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon right">
                                            <span style="font-size:15px;">Budget Sales :</span>
                                            <input readonly value="<?=trim($data['cd']["KdSales"]).' - '.trim($data['cd']["NmSales"]);?>" type="text"class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon right">
                                            <span style="font-size:15px;">Sales IDR :</span>
                                            <input id="salesidr" name="salesidr"  type="text" class="form-control money" value="<?=trim($data['cd']["SalesIDR"]) + 0;?>"/>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon right">
                                            <span style="font-size:15px;">Budget MM IDR :</span>
                                            <input id="mmidr" name="mmidr"  type="text" class="form-control money" value="<?=trim($data['cd']["MMIDR"]) + 0;?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon right">
                                            <span style="font-size:15px;">Budget Running Meter :</span>
                                            <input id="runmtr" name="runmtr"  type="text" class="form-control money" value="<?=trim($data['cd']["RunMTR"]) + 0;?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                                $updt     = trim($data['cd']["UpdDt"]);
                                $old_date = date(trim($data['cd']["UpdDt"]));              // returns Saturday, January 30 10 02:06:34
                                $old_date_timestamp = strtotime($old_date);
                                $new_date = date('Y-m-d H:i:s', strtotime($updt));
                            ?>
                            <div class="form-group" style="text-align:right;">
                                Last Update : <?php if(!empty($updt)) {echo $new_date;  } else{ echo "";} ?> | By : <?php echo trim($data['cd']["UpdBy"]);?>
                            
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