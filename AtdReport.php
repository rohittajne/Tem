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
</style>
</head>
<body>
<div class="page">
<div class="head">
<div class="first">T</div><div class="title">echnical</div>
<div class="first">E</div><div class="title">ducation</div>
<div class="first">M</div><div class="title">anager</div>
</div> 
<form name="fr" method="post">
<table width="392" height="116" border="0" align="center">
  <tr>
    <td colspan="2" align="center"><h3>Attendance Report</h3></td>
  </tr>
  <tr>
    <td>Enter Batch ID :-</td>
    <td><select name="bid" id="bid">
        <?php
	$m=new MongoClient();
	
$query = $m->TEM->batch->find();
foreach ( $query as $current )
{
?>
    <option><?php echo $current["bid"]; ?></option>
 <?php } ?>
        </select></td>
  </tr>
  <tr>
    <td height="28" colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Veiw Report"></td>
  </tr>
</table>
 <?php if(isset($_POST['submit'])){
 $m=new mongoClient();
 $bid=$_POST["bid"];
 ?>
<table width="679" height="56" border="1" align="center">
  <tr>
    <td width="340" align="center">Name</td>
    <td width="115" align="center">Course</td>
    <td width="101" align="center">Attendance</td>
    <td width="95" align="center">Performance</td>
  </tr>
 
<?php
$query = $m->TEM->atdreport->find(array('bid'=>$bid));
foreach ( $query as $current)
{
?>
<tr align="center">
<?php
echo "<td>".$current["name"]."</td>";
echo "<td>".$current["cname"]."</td>";
echo "<td>".$current["atd"]."</td>";
echo "<td>".$current["perf"]."</td>";
?>
</tr>
<?php
}
?>
</table>
<?php
}
?>
</form>
</div>
</body>
</html>
