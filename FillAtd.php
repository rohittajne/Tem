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
<table width="384" height="88" border="1" align="center">
  <tr>
    <td colspan="2" align="center"><p>Fill Attendance</p>
      <p>Enter Batch ID to Fill Attendance :- 
        <select name="bid" id="bid">
        <?php
	$m=new MongoClient();
$query = $m->TEM->batch->find();
foreach ( $query as $current )
	{
?>
    <option><?php echo $current["bid"]; ?></option>
 <?php } ?>
        </select>
        <input type="submit" name="search" id="seach" value="Search Batch">
      </p></td>
    </tr>
    <?php
	if(isset($_POST['search'])){
		$bid=$_POST['bid']; ?>
<input type="hidden" name="bid1" value="<?php echo $bid; ?>">
	
  <tr>
    <td width="152" align="left">Name :-</td>
    <td width="216" align="left"><select name="name" id="bid2">
      <?php
	$m=new MongoClient();
	$db=$m->TEM;
$query = $m->TEM->approved->find(array('bid'=>$bid));
foreach ( $query as $current )
	{ ?>
      <option><?php echo $current["name"]; $cname=$current["course"]; ?></option>
      <?php }  ?>
    </select> </td>
<input type="hidden" name="cname" value="<?php echo $cname; ?>">
    </tr>
 <?php } ?>
  <tr>
    <td>Attendance :-</td>
    <td><input type="text" name="atd" id="textfield"></td>
    </tr>
  <tr>
    <td>Performance :-</td>
    <td><select name="perf" id="select">
      <option>Excellent</option>
      <option>Good</option>
      <option>Poor</option>
      <option>Very Bad</option>
    </select></td>
    </tr>
  <tr>
    <td colspan="2" align="center"><p>&nbsp;</p>
      <p>
        <input type="submit" name="submit" id="submit" value="Submit">
      </p>
 <?php 
if(isset($_POST['submit'])){
$col = $m->TEM->atdreport;
$name=$_POST["name"];
$atd=$_POST["atd"];
$perf=$_POST["perf"];
$cname=$_POST['cname'];
$bid=$_POST['bid1'];
$document = array( 
"bid" => "$bid",
"cname" => "$cname",
"name" => "$name",
"atd" => "$atd",
"perf" => "$perf"
);
$col->insert($document);
echo "Record Added..";
}
 ?></td>
    </tr>
<?php  ?>
</table>
</form>
</div>
</body>
</html>
