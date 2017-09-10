<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Technical Education Manager</title>
<link rel="stylesheet" href="style.css">
<style type="text/css">
body,td,th {
	color: #FFF;
}
a:link {
	color: #FFF;
	text-decoration: none;
}
a:visited {
	color: #FFF;
	text-decoration: none;
}
a:hover {
	color: #FFF;
	text-decoration: none;
}
a:active {
	color: #FFF;
	text-decoration: none;
}
</style>
</head>
<body>

<div class="page">
<div class="head">
<div class="first">T</div><div class="title">echnical</div>
<div class="first">E</div><div class="title">ducation</div>
<div class="first">M</div><div class="title">anager</div>
</div>  

<table width="743" height="124" border="0" align="center">
  <tr>
    <td height="29" colspan="4" align="center"><a href="AddBatch.php">Add Batch</a></td>
    <td colspan="4" align="center"><a href="DeleteBatch.php">Delete Batch</a></td>
    </tr>
  <tr>
    <td height="29" colspan="8" align="center"><h3>Schedule Batch</h3></td>
    </tr>
  <tr>
    <td align="center">Batch ID</td>
    <td align="center">Course Name</td>
    <td height="29" align="center">Faculty Name</td>
    <td align="center">Start Date</td>
    <td align="center">End Date</td>
    <td align="center">Start Time</td>
    <td align="center">End Time</td>
    <td align="center">Strength</td>
  </tr>
       <?php 
	$m=new MongoClient();
$query = $m->TEM->batch->find();
foreach ( $query as $current )
	{
?>
<tr align="center">
<?php
echo "<td>".$current["bid"]."</td>";
echo "<td>".$current["cname"]."</td>";
echo "<td>".$current["fname"]."</td>";
echo "<td>".$current["sdate"]."</td>";
echo "<td>".$current["edate"]."</td>";
echo "<td>".$current["stime"]."</td>";
echo "<td>".$current["etime"]."</td>";
echo "<td>".$current["strenght"]."</td>";
?>
</tr>
<?php
}
?>
</table>
</div>
</body>
</html>
