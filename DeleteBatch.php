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
    <td colspan="2" align="center"><h3>Delete Batch</h3></td>
  </tr>
  <tr>
    <td>Enter Batch ID :-</td>
    <td><input type="text" name="batchid" id="textfield"></td>
  </tr>
  <tr>
    <td height="28" colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Delete">
<?php    
if(isset($_POST['submit'])){
$id=$_POST['batchid'];
	  
$m=new MongoClient();
try{
$db=$m->TEM;
$collection = $db->batch;

$arr=array( 'bid'=>$id);

$r=$collection->remove($arr);

echo "Batch Deleted...";
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
