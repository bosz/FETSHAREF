//This will contain the login and signup file of the FETSHAREF project
//The config file holds the database information and is incharged of connecting to the mysql database using the 
//parameters given to it.

<?php
      //cannot come to this page without having filled the login form.
	if(empty($_POST['username']) || empty($_POST['password']))
	{
		$message="Invalid details on the account";
		header('location:index_login.php');
	}
	session_start();
	include'../config.php';
	    //the username and passwords have been given by the user
	$username=mysql_real_escape_string($_POST['username']);
      //it makes use of the md5 encryption standard to encrypt the password
	$password=md5(mysql_real_escape_string($_POST['password']));
	
	$query="SELECT 'username', 'password' FROM $dbase_table WHERE username='$username' AND password='$password'";
	
	$results=mysql_query($query);
	
	if(mysql_num_rows($results) > 0 )
	{
		$_SESSION['user']=$username;
		header('location:../index.php');
	}
	else
	{
		echo "Invalid user login details" . "<br />";
		echo '<h3>' . '<a href="index_login.php">' . 'Please try again' . '</a>' . '</h3>' . '<br />';
	}

?>
