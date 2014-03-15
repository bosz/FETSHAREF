<?php
/*
This function takes 3 parameter and test if the combination of the username and password already occur on that table
If that set already exists in the table, it returns 1 to the caller otherwise, it returns a 0;
1: DETAILS ALREADY EXITS FOR THAT PAIR OF USERNAME AND PASSWORD.
2: DETAILS DONT EXITST FOR THAT PAIR OF USERNAME AND PASSWORD
*/
function verify_details($username, $password)
{
	$query="SELECT * FROM 'user_info' WHERE 'username'=$username AND 'password'=$password";
	$resp=mysql_query($query)
	
	if(mysql_num_rows($resp)>0)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}

/*The username and password feild must have been field else the page will be redirected the the home page.
This is to avoid certain hacks.*/
function check_accout($username, $password)
{
	if( !isset($username) && !isset($password) )
		{
			echo "" . "<a href="/fetsharef/sign_log_files/index_login.php" >" . "Login first" . "</a>" ."<br />";//To login(index)
			//header("location: /fetsharef/sign_log_files/index_login.php");
		}
}
?>
