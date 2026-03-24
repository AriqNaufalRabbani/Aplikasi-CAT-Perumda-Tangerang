
<div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-header">
            <button type="button" class="close BtnClose">x</button>
            <h4 class="modal-title" id="myModalLabel" style="font-weight: 600;">Feedback CRM Phase 1 (Periode Survey : 15/06/2023 s/d 20/06/2023)</h4>
            
        </div>
        <div class="modal-body">
            
            <div class="box box-primary" style="padding-top: 20px; border-radius: 20px;">
                <iframe id="FrameReport" loading="lazy" name="FrameReport"  
                    src="https://docs.google.com/forms/d/e/1FAIpQLSeHkeQg0EJvD-xM3_Tx2VnaJ1KVSJMwkQMIb-bNsip1ZOXf-w/viewform?usp=sf_link"
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
