<?php


$dbase_info=array('server' 			=> 	 	'localhost', 
			   	  'dbase' 			=> 		'fetsharef2',
			   	  'uname' 			=> 		'root',
			   	  'upass' 			=> 		'root'
			   		);


$connection=mysql_connect($dbas_info[server], $dbase_info[uname], $dbase_info[upass]);


if(!$connection)
{
	//the mysql_error() will be replaced when ready for deployment.
	die('connection not done ' . mysql_error() . "<br />");
}


mysql_select_db($dbase_info[dbase], $connection);






/*
This is good to go.
***WORKING****
*/

?>
