<?php
	require_once('../procedures.php');
	
	required_fields($_POST['username'], $_POST['password'] );
	
	session_start();
	require_once'../config.php';



	$username=mysql_real_escape_string($_POST['username']);;
	$password=md5(mysql_real_escape_string($_POST['password']));
	
	if(check_account($username, $password)==1)
	{
		$_SESSION['user']=$username;
		header('location:home.php');
	}
	else
	{
		echo "Invalid user login details" . "<br />";
		echo '<h3>' . '<a href="index_login.php">' . 'Please try again' . '</a>' . '</h3>' . '<br />';
	}

?>
