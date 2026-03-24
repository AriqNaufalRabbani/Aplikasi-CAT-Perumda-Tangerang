
<div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-header">
            <button type="button" class="close BtnClose">x</button>
            <h4 class="modal-title" id="myModalLabel" style="font-weight: 600;">SURVEI KEPUASAN PENGGUNA 2023</h4>
            
        </div>
        <div class="modal-body">
            
            <div class="box box-primary" style="padding-top: 20px; border-radius: 20px;">
                <iframe id="FrameReport" loading="lazy" name="FrameReport"  
                    src="https://istsurvey.supernova-id.com/istsurvey/index2.php"
                    width="100%" height="1000px" frameborder='0'>
                </iframe>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger BtnClose">Close</button>
        </div>
        
    </div>
</div>

<script>
    $(".BtnClose").click(function(){
        $("#MainModal").html('');
        $("#MainModal").modal('hide');
    })
</script>
