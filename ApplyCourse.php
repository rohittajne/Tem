<?php $name=$_GET['user']; ?>

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
<table width="327" height="153" border="0" align="center">
  <tr>
    <td height="60" colspan="2" align="center"><H2>Apply Course</H2></td>
    </tr>
  <tr>
    <td width="143" height="47">Course Name :-</td>
    <td width="199"><select name="cname" id="select"><?php    
$m=new MongoClient();

    $query = $m->TEM->course->find();
foreach ( $query as $current )
	{
    ?>
    <option><?php echo $current["name"]; $course=$current["name"]; ?></option>
  <?php  } ?>
    </select></td>
  </tr>
  <tr>
    <td height="36" colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit">
  
  
<?php  
if(isset($_POST["submit"]))
{
	$course=$_POST['cname'];
$db=$m->TEM;
$collection = $db->applycourse;
$document = array( 
"name" => "$name",
"course" => "$course"
);

$collection->insert($document);
echo "Application Submited...";
} 
?>
  </td>
  
  </tr>
</table>
<table width="633" height="87" border="0" align="center">
  <tr>
    <td colspan="6" align="center">Approved Request Status</td>
    </tr>
  <tr>
    <td width="126">Course Name</td>
    <td width="105">StartDate</td>
    <td width="99">EndDate</td>
    <td width="99">StartTime</td>
    <td width="98">End Time</td>
    <td width="66">Strenght</td>
  </tr>  
     <?php 
	$m=new MongoClient();
$query = $m->TEM->approved->find(array('name'=>$name));
foreach ( $query as $current )
	{
?>
<tr align="center">
<?php
echo "<td>".$current["course"]."</td>";
echo "<td>".$current["sdt"]."</td>";
echo "<td>".$current["edt"]."</td>";
echo "<td>".$current["stm"]."</td>";
echo "<td>".$current["etm"]."</td>";
echo "<td>".$current["str"]."</td>";
?>
</tr>
<?php
}

?>

  </table>
  </form>
</div>
</body>
</html>
