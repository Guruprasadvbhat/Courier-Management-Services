

<?php
require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<h2>View consignments </h2>
<table width="50%" border="3" style="border-collapse:separate;">
<thead>
<tr>

<th><strong>consignment id</strong></th>
<th><strong>order by</strong></th>
</tr>
</thead>
<tbody>
<?php




$MyConnection = new mysqli ("localhost", "root", "", "tyc");
 
mysqli_multi_query ($MyConnection, "CALL disp") OR DIE (mysqli_error($MyConnection));

while (mysqli_more_results($MyConnection)) {

       if ($result = mysqli_store_result($MyConnection)) {

              while ($row = mysqli_fetch_assoc($result)) {?>
  
  
<td align="center"><?php echo $row["id"]; ?></td>
<td align="center"><?php echo $row["ord_by"]; ?></td>

</tr>
<?php

 

                    

              }
              mysqli_free_result($result);
       }

EXIT(0);
 

}
 ?>