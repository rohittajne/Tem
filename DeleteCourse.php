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
    <td colspan="2" align="center"><h3>Delete Course</h3></td>
  </tr>
  <tr>
    <td>Enter Course ID :-</td>
    <td><input type="text" name="cid" id="textfield"></td>
  </tr>
  <tr>
    <td height="28" colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Delete">


              
                            
<?php 
if(isset($_POST['submit'])){
$cid=$_POST['cid'];
	  
$m=new MongoClient();
try{
$db=$m->TEM;
$collection = $db->course;

$arr=array( 'cid'=>$cid);

$r=$collection->remove($arr);

echo "Record Deleted...";
$m->close();
}

catch(MongoException $m)
{
echo $m;
exit;
}
}

?>



</td>
  </tr>
</table>
</form>
</div>
</body>
</html>
