//This will try to give a new commer the opportunity to have his/her own account.

<?php
	if(empty($_POST['username']) || empty($_POST['password']))
	{
		$message="Invalid details on the account";
		header('location:index_login.php');
	}
	session_start();
	include'../config.php';
	
	$matnum = mysql_real_escape_string($_POST['mat_num']);
	$fname = mysql_real_escape_string($_POST['fname']);
	$mname = mysql_real_escape_string($_POST['mname']);
	$lname = mysql_real_escape_string($_POST['lname']);
	$gender = mysql_real_escape_string($_POST['gender']);
	$dob = mysql_real_escape_string($_POST['dob']);
	$username = mysql_real_escape_string($_POST['username']);
	$password = md5(mysql_real_escape_string($_POST['password']));
	$email = mysql_real_escape_string($_POST['email']);
	$sec_quest = mysql_real_escape_string($_POST['sec_quest']);
	$sec_ans = mysql_real_escape_string($_POST['sec_ans']);
	$tel_num = mysql_real_escape_string($_POST['telephone']);
	
	$query="SELECT username FROM $dbase_table WHERE username='$username' AND password='$password'";
	$results=mysql_query($query);
	
	if(mysql_num_rows($results) > 0 )
	{
		$message="Change the details";
		header('location:index_sign.php');
	}
	else
	{
	$query="INSERT INTO $dbase_table
	 (`matricule_number`, `first_name`, `middle_name`, `last_name`, 
	  `gender`, `dob`, `email`, `username`, `password`, `security_question`, 
	  `security_answer`, `telephone_number`, `id`)
	VALUES ('$matnum', '$fname', '$mname', '$lname', '$gender', 
	'$dob', '$email', '$username', '$password', '$sec_quest', '$sec_ans', '$tel_num', '')";
	
	$_SESSION['user']=$username;
	mysql_query($query) or die('problem inserting user'. $username . ' to the database' . mysql_error());
	   // echo"<pre>".print_r($_POST,true)."</pre>";
	header('location:../index.php');
	}
	
	//test if the combination of the username and password have already been used in the system
	


?>
