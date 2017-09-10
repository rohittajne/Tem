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
<table width="587" border="0" align="center">
  <tr>
    <td width="581" align="center">Enter Batch Id to veiw Batch Schedule :-
      
      <select name="bid" id="select">
<?php
	
	$m=new mongoClient();

$query = $m->TEM->batch->find();
foreach ( $query as $current )
	{ ?>
      <option><?php echo $current['bid']; ?>
      
<?php	}?>
      </select>
      <input type="submit" name="submit" id="submit" value="View Schedule"></td>
</tr>
</table>      
<?php
	if(isset($_POST['submit'])){
		$bid=$_POST['bid']; 
	$m=new mongoClient();

$query = $m->TEM->batch->find(array("bid"=>$bid));
foreach ( $query as $current )
	{
?>
<table width="333" height="263" border="0" align="center">
  <tr>
    <td colspan="2" align="center"><h2>Batch Schedule</h2></td>
    </tr>
  <tr>
    <td width="154">Batch ID :-</td>
    <td width="200"><?php echo $current["bid"]; ?></td>
  </tr>
  <tr>
    <td>Course Name :-</td>
    <td><?php  echo $current["cname"];  ?></td>
  </tr>
  <tr>
    <td>Faculty Name :-</td>
    <td><?php  echo $current["fname"];  ?></td>
  </tr>
  <tr>
    <td>Start Date :-</td>
    <td><?php  echo $current["sdate"];  ?></td>
  </tr>
  <tr>
    <td>End Date :-</td>
    <td><?php  echo $current["edate"];  ?></td>
  </tr>
  <tr>
    <td>Start Time :-</td>
    <td><?php  echo $current["stime"];  ?></td>
  </tr>
  <tr>
    <td>End Time :-</td>
    <td><?php  echo $current["etime"];  ?></td>
  </tr>
  <tr>
    <td>Strenght :-</td>
    <td><?php  echo $current["strenght"];  ?></td>
  </tr>

</table>
<?php
}
}
?>
</form>
</div>
</body>
</html>
