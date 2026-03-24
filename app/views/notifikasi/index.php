
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="max-width: 50px;">No.</th>
                                <th class="text-center" style="max-width: 100px;">Date</th>
                                <th>Title</th>
                                <th>Notifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $No = 0;
                                foreach ($data['notifikasi'] as $notifikasi) {
                                    $No++;
                                    $Title  = trim($notifikasi['Title']);
                                    $Pesan  = trim($notifikasi['Pesan']);
                                    $Link   = trim($notifikasi['Link']);
                                    $Module = trim($notifikasi['Module']);
                                    $CrtDt  = trim($notifikasi['CrtDt']);

                                    ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $No ;?>.
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo $Link ;?>">    
                                                    <?php echo date('Y/m/d H:i', strtotime($CrtDt)) ;?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo $Link ;?>">
                                                    <?php echo $Title ;?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo $Link ;?>">
                                                    <?php echo $Pesan ;?>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<script>
    $('section.content-header h1').text('Notifikasi');
    $('section.content-header .breadcrumb').append('<li>Notifikasi</li>');

    $(document).ready(function() {
        $('#example').DataTable({
            // "scrollX": true,
            "lengthMenu": [
                [25, 50, 100, 200, -1], 
                [25, 50, 100, 200, "All"]
            ]
        });
    });
</script>
