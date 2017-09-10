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
    <td colspan="2" align="center"><h3>Add Course</h3></td>
    </tr>
  <tr>
    <td width="184">Course Name :-</td>
    <td width="282"><input type="text" name="cname" id="textfield"></td>
  </tr>
  <tr>
    <td>Description :-</td>
    <td><textarea name="desc" id="textarea"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Add Course">
            
<?php
  if(isset($_POST["submit"]))
{
$name=$_POST["cname"];
$desc=$_POST["desc"];
$cid=getdate().time();
$m=new MongoClient();
$db=$m->TEM;
$collection = $db->course;

$document = array(
"cid" => "$cid", 
"name" => "$name",
"desc" => "$desc"
);

$collection->insert($document);
 
echo "Course Added...";
 } 
?>            

      
      
      </td>
    </tr>
    
</table>
</form>
</div>
</body>
</html>
