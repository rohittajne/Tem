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
	text-decoration: underline;
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


<form name="fr" method="post">
<table width="356" height="335" border="0" align="center">
  <tr>
    <td height="39" colspan="2" align="center"><a href="UserList.php">User Request List</a><h2>Add User</h2></td>
    </tr>
  <tr>
    <td width="154">Type :- </td>
    <td width="186"><select name="type" required id="select">
    <option>Employee</option>
    <option>Faculty</option>
    </select></td>
  </tr>
  <tr>
    <td> Name:-</td>
    <td><input name="name" type="text" required id="textfield"></td>
  </tr>
  <tr>
    <td>User ID:-</td>
    <td><input name="userid" type="text" required id="textfield2"></td>
  </tr>
  <tr>
    <td>Password :-</td>
    <td><input name="pass" type="password" required id="textfield3"></td>
  </tr>
  <tr>
    <td>Email ID:-</td>
    <td><input name="email" type="text" required id="textfield4"></td>
  </tr>
  <tr>
    <td>Date of Birth:-</td>
    <td><input name="dob" type="text" required id="textfield5"></td>
  </tr>
  <tr>
    <td>Gender :-</td>
    <td><p>
      <label>
        <input name="gender" type="radio" required id="RadioGroup1_0" value="Male">
        Male</label>
     
      <label>
        <input name="gender" type="radio" required id="RadioGroup1_1" value="Female">
        Female</label>
      <br>
    </p></td>
  </tr>
  <tr>
    <td>Contact :-</td>
    <td><input name="contact" type="text" required id="textfield7"></td>
  </tr>
  <tr>
    <td>Address :-</td>
    <td><input name="address" type="text" required id="textfield8"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Add User">
    
    
    <?php
  if(isset($_POST["submit"]))
{
$type=$_POST["type"];
$name=$_POST["name"];
$userid=$_POST["userid"];
$pass=$_POST["pass"];
$email=$_POST["email"];
$dob=$_POST["dob"];
$gender=$_POST["gender"];
$contact=$_POST["contact"];
$address=$_POST["address"];


$m=new MongoClient();
$db=$m->TEM;
$collection = $db->user;

$document = array( 
"type" => "$type",
"name" => "$name",
"userid" => "$userid",
"pass" => "$pass",
"email" => "$email",
"dob" => "$dob",
"gender" => "$gender",
"contact" => "contact",
"address" => "address",
);

$collection->insert($document);
echo "User Added...";
} 

?>
    
    </td>
  </tr>
</table>
</div>
</body>
</html>
