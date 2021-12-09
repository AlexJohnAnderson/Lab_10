<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "a095a439", "shaic4Em", "a095a439");
	if($mysqli->connect_errno)
	{
		echo "<label> Connect failed. </label>";
		exit();
	}
	else
	{
		$newUser = $_POST["name"];
		if(strlen($newUser) != 0)
		{
			$query = "INSERT INTO Users (user_id) VALUES (\"" .$newUser. "\");";
			if($CreateUser = $mysqli->query($query))
			{
				if ($CreateUser === TRUE)
				{
				  echo "<label> New user created successfully! </label>";
				}
			}
			else
			{
				  printf($CreateUser);
				  echo "<label> New user creation failed becuase this user id already exists. </label>";
			}
		}
		else
		{
			echo "<label> You must enter a username. </label>";
		}
	}
?>