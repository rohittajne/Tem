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




<table width="661" height="127" border="0" align="center">
  <tr>
    <td height="29" align="center"><a href="AddCourse.php">Add Course</a></td>
    <td align="center">&nbsp;</td>
    <td align="center"><a href="DeleteCourse.php">Delete Course</a></td>
  </tr>
  <tr>
    <td height="29" colspan="3" align="center"><h3>Courses</h3></td>
    </tr>
  <tr>
    <td height="29" align="center">Course ID</td>
    <td align="center">Course Name</td>
    <td align="center">Description</td>
  </tr>
       <?php 
	$m=new MongoClient();
$query = $m->TEM->course->find();
foreach ( $query as $current )
	{
?>
<tr align="center">
<?php
echo "<td>".$current["cid"]."</td>";
echo "<td>".$current["name"]."</td>";
echo "<td>".$current["desc"]."</td>";

?>
</tr>
<?php
}
?>
</table>
</div>
</body>
</html>
