<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "a095a439", "shaic4Em", "a095a439");
	if($mysqli->connect_errno)
	{
		echo "<label> Connect failed. </label>";
		exit();
	}
	else
	{
		$users = "SELECT user_id FROM Users";
		if($result = $mysqli->query($users))
		{
			echo '<table>';
			echo '<tr> <th>Users</th> </tr>';
			while($row = $result->fetch_assoc())
			{
				echo '<tr> <td>' .$row["user_id"]. '</td> </tr>';
			}
		}
		else
		{
			echo "<label> User Fetch Failed. </label>";
		}
	}
?>