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
<div class="login">
<form name="f1" method="post"> 
<input class="text" name="loginid" type="text" autofocus required placeholder="LoginID" size="35">
<br>	
<input class="password" name="password" type="password" required placeholder="Password" size="35">
<br>
<input class="submit" type="submit" name="submit" value="Login">

<?php
$m=new mongoClient();
$db=$m->TEM;
$collection = $db->user;

if(isset($_POST["submit"])){
$user=$_POST["loginid"];
$pass=$_POST["password"];

if($user=="Admin" && $pass=="pass123") {
	$_SESSION["user_id"]='$user';
	$_SESSION["user_name"]='$user';

	if(isset($_SESSION["user_name"])) {
	header("Location:Admin.php");
	}
}
else{	

	$query = $collection->find(array('userid'=> $user));
	foreach($query as $doc)
	{	
		$type=$doc['type'];
	 if($user==$doc['userid'] && $pass==$doc['pass'] && $type=='Employee')
	{	

		?>
			<script type="text/javascript">
			window.location="EmpHome.php?userid=<?php echo $user;?>"
			</script> 
<?php	
	} 
	if($user==$doc['userid'] && $pass==$doc['pass'] && $type=='Faculty')
	{
			?>
			<script type="text/javascript">
			window.location="Faculty.php?userid=<?php echo $user;?>"
			</script>
<?php		
	}
		
	else{
	 		$message="Invalid Username or Password!!!";
		}
	}
}
}

?>
	
</form>

</div>


</div>
</body>
</html>
