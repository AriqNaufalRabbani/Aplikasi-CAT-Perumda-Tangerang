
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4 col-xs-6">
                                    <div class="form-group">
                                        <a href="<?=BASE_URL?>document/posting_actual" class="btn btn-link"><i class="fa fa-search-plus"></i> Post Actual</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="form-group">
                                        <a href="<?=BASE_URL?>document/posting_projection" class="btn btn-link"><i class="fa fa-paper-plane"></i> Post Projection</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="form-group">
                                        <a href="<?=BASE_URL?>document/upload" class="btn btn-link"><i class="fa fa-table"></i> Upload File Budget</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <input type="month" class="form-control col-sm-12" id="prd" value="<?=date('Y-m')?>">
                            </div>
                        </div>
                    </div>
                    <!-- <div style="display: flex; justify-content: space-between; flex-flow: wrap;">
                        <div>
                            <a href="<?=BASE_URL?>document/posting_actual" class="btn btn-link"><i class="fa fa-search-plus"></i> Post Actual</a>
                            <a href="<?=BASE_URL?>document/posting_projection" class="btn btn-link"><i class="fa fa-paper-plane"></i> Post Projection</a>
                            <a href="<?=BASE_URL?>document/upload" class="btn btn-link"><i class="fa fa-table"></i> Upload File Budget</a>
                        </div>
                        <div>
                            <input type="month" class="form-control col-sm-12" id="prd" value="<?=date('Y-m')?>">
                        </div>
                    </div> -->
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Group</th>
                                        <th>Sales</th>
                                        <th>Periode</th>
                                        <th>Budget Sales IDR</th>
                                        <th>Budget MM IDR</th>
                                        <th>Running Meter</th>
                                        <th style='text-align:center;'>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<script>
    $(document).ready(function() {
        getData();
    });

    function getData(){
        var periode = $('#prd').val();

        $('#example').DataTable({
            "lengthMenu": [
                [25, 50, 100, 200, -1], 
                [25, 50, 100, 200, "All"]
            ],
            destroy: true,
            "scrollX": true,
            "processing": true,
            "serverSide": true,
            "order":[],
            "columnDefs": [
                  {"targets": 6, "orderable": false}
            ],
            "ajax":{
                url: BASE_URL + "document/fetch",
                type: "POST",
                data: {
                    periode: periode,
                    isModify: '<?=ISMODIFY?>'
                }
            }
        });
    }

    $('#prd').on('change', function(){
        getData();
    });
</script>
