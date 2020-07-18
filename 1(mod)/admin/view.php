<?php
require '../dbconfig/config.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<h2>View Records</h2>
<table width="80%" border="5" style="border-collapse:seprate;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Name</strong></th>
<th><strong>Email</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select username,eml from userinfo ORDER BY pname;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["eml"]; ?></td>



<td align="center">
<a href="delete.php?username=<?php echo $row["username"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
