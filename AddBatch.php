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
<table width="413" height="168" border="0" align="center">
  <tr>
    <td colspan="2" align="center"><h3>Add Batch</h3></td>
    </tr>
  <tr>
    <td width="184">Course Name :-</td>
    <td width="282">
    <select name="cname" id="select">
<?php    
$m=new MongoClient();

    $query = $m->TEM->course->find();
foreach ( $query as $current )
	{
    ?>
    <option><?php echo $current["name"]; ?></option>
  <?php  } ?>
    </select></td>
  </tr>
  <tr>
    <td>Faculty Name :-</td>
    <td><select name="fname" id="select2">
    <?php
    $query = $m->TEM->user->find(array('type'=> "Faculty"));
	foreach ( $query as $current)
	{
    ?>
    <option><?php echo $current["name"]; ?></option>
  <?php  } ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Start Date :-</td>
    <td><input type="text" name="sdate" id="textfield4"></td>
  </tr>
  <tr>
    <td>End Date :-</td>
    <td><input type="text" name="edate" id="textfield5"></td>
  </tr>
  <tr>
    <td>Start Time:-</td>
    <td><input type="text" name="stime" id="textfield6"></td>
  </tr>
  <tr>
    <td>End Time :-</td>
    <td><input type="text" name="etime" id="textfield7"></td>
  </tr>
  <tr>
    <td>Strenght :-</td>
    <td><input type="text" name="strenght" id="textfield3"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Add Batch">
    <?php
if(isset($_POST["submit"]))
{
$cname=$_POST["cname"];
$fname=$_POST["fname"];
$sdate=$_POST["sdate"];
$edate=$_POST["edate"];
$stime=$_POST["stime"];
$etime=$_POST["etime"];
$strenght=$_POST["strenght"];
$collection =$m->TEM->batch;
$bid=date(d).time();

$document = array( 
"bid" => "$bid",
"cname" => "$cname",
"fname" => "$fname",
"sdate" => "$sdate",
"edate" => "$edate",
"stime" => "$stime",
"etime" => "$etime",
"strenght" => "$strenght",
);
$collection->insert($document);
echo "Batch Added...";
} 

?>
       </td>
    </tr>
</table>
</form>
</div>
</body>
</html>
