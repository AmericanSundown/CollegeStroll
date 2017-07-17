<?php
session_start();
	$server="localhost";
	$user="root";
	$password="";
	$db="collegegasm";
	$conn=new mysqli($server,$user,$password,$db);

	$u=$_POST("uname");
	$p=$_POST("pass");
	
			$sql="INSERT INTO users(user_name,user_pass,) 
			VALUES('$u','$p');";
			if($conn->query($sql)===True){

			
			}
			else{
			echo "Error:".$sql."<br>".$conn->error;
			}
		
		$conn->close();
?>