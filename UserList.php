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
	text-decoration: none;
	color: #FFF;
}
a:hover {
	text-decoration: none;
	color: #FFF;
}
a:active {
	text-decoration: none;
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
<table width="383" height="140" border="0" align="center">
  <tr>
    <td colspan="4" align="center"><a href="AddUser.php"><h2>Add User</h2></a></td>
    </tr>
  <tr>
    <td colspan="4" align="center"><h3>User Request List</h3></td>
    </tr>
  <tr>
    <td>User Name</td>
    <td>Course Name</td>
    <td>Approve</td>
    <td>Reject</td>
  </tr>
<?php
  	$m=new MongoClient();
$db=$m->TEM;
$query = $m->TEM->applycourse->find();

foreach ( $query as $current )
	{
?>
  <tr>
    <td><?php echo $current["name"]; $name=$current["name"]; ?><input type="hidden" name="name" value="<?php echo $name; ?>"></td>
    <td><?php echo $current["course"];$course=$current["course"]; ?><input type="hidden" name="course" value="<?php echo $course; ?>"></td>
    <td><input type="submit" name="approve" id="approve" value="Approve">
    <?php if(isset($_POST["approve"]))
{ 
$collection = $db->approved;

$query = $m->TEM->batch->find(array("cname"=> $course));
foreach ( $query as $current)
{
		$bid=$current["bid"];
		$sdt=$current["sdate"];
		$edt=$current["edate"];
		$stm=$current["stime"];
		$etm=$current["etime"];
		$str=$current["strenght"];
	
$document = array( 
"bid" => "$bid",
"name"=>"$name",
"course" => "$course",
"sdt" => "$sdt",
"edt" => "$edt",
"stm" => "$stm",
"etm" => "$etm",
"str" => "$str",
);
$collection->insert($document);

try{
$db=$m->TEM;
$course=$_POST['course'];
$name=$_POST['name'];
$coll = $db->applycourse;
$arr=array( "name"=>"$name", "course"=>"$course");
$r=$coll->remove($arr);

}
catch(MongoException $m)
{
echo $m;
exit;
}
	} }
	 ?>
    </td>
    <td><input type="submit" name="reject" id="submit2" value="Reject"></td>
<?php if(isset($_POST["reject"]))
{
try{
$db=$m->TEM;
$course=$_POST['course'];
$name=$_POST['name'];
$coll = $db->applycourse;
$arr=array( "name"=>"$name", "course"=>"$course");
$r=$coll->remove($arr);
}
catch(MongoException $m)
{
echo $m;
exit;
}
	 }
?>
  </tr>
<?php  } ?>
</table>
</form>
</div>
</body>
</html>
