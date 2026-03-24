<?php
    $tgl = date("Y-m-d");

    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment;filename=Template Upload Budget $tgl.xls "); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<div>
<?php
    echo"<table class='table table-bordered table-striped table-hover ' width='100%' >
        <thead>
            <tr>
                <th rowspan='2' style='background-color:#00FFF7;'><center>Sales</center></th>
                <th rowspan='2' style='background-color:#00FFF7;'><center>Group</center></th>
                <th colspan='12' style='background-color:#00FFF7;'><center>Sales IDR</center></th>
                <th rowspan='30' style='background-color:#FFFFFF;'><center></center></th>
                <th colspan='12' style='background-color:ORANGE;'><center>MM IDR</center></th>
                <th rowspan='30' style='background-color:#FFFFFF;'><center></center></th>
                <th colspan='12' style='background-color:#44FF00;'><center>Running Meter</center></th>
            </tr>	
            <tr>	
                ";
                
                $weeks	=date('y');
                for ($i = 1; $i <= 12; $i++)
                {
                    $month_name = date('M', mktime(0, 0, 0, $i, 1, $weeks));
                    $test = $weeks.''.$i;
                    $month 	= date('m', mktime(0, 0, 0, $i, 10));
                    $prd 	= $weeks.''.$month;
                    $r_prd = $r_prd.'\''.$prd.'\''.',' ;						
                    echo"<th  style='background-color:#00FFF7;' valign='center' align='center'><b><center>$month_name-$weeks</center></b></th>";
                }
                
                for ($i = 1; $i <= 12; $i++)
                {
                    $month_name = date('M', mktime(0, 0, 0, $i, 1, $weeks));
                    $test = $weeks.''.$i;
                    $month 	= date('m', mktime(0, 0, 0, $i, 10));
                    $prd 	= $weeks.''.$month;
                    $r_prd = $r_prd.'\''.$prd.'\''.',' ;						
                    echo"<th  style='background-color:ORANGE;' valign='center' align='center'><b><center>$month_name-$weeks</center></b></th>";
                }
                
                for ($i = 1; $i <= 12; $i++)
                {
                    $month_name = date('M', mktime(0, 0, 0, $i, 1, $weeks));
                    $test = $weeks.''.$i;
                    $month 	= date('m', mktime(0, 0, 0, $i, 10));
                    $prd 	= $weeks.''.$month;
                    $r_prd = $r_prd.'\''.$prd.'\''.',' ;						
                    echo"<th  style='background-color:#44FF00;' valign='center' align='center'><b><center>$month_name-$weeks</center></b></th>";
                }
                    // $ir_prd  	= substr($r_prd,0,strlen($r_prd)-1);

            echo"</tr>
        </thead>";
        
        foreach ($data['cs'] as $cs)
        {
            echo"<tr>
                <td><center>".trim($cs["KdSalesGroup"])."</center></td>
                <td><center>".trim($cs["KdSales"])."</center></td>
            </tr>";
        }
        
        ?> 
    </table>
</div>
</body>
</html>
