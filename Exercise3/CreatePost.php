<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "a095a439", "shaic4Em", "a095a439");
	if($mysqli->connect_errno)
	{
		echo "<label> Connect failed. </label>";
		exit();
	}
	else
	{
		$user = $_POST["name"];
		$post = $_POST["text"];
		
		$userFound = FALSE;
		
		if(strlen($post) != 0 && strlen($user))
		{
			$userExists = "SELECT user_id FROM Users";
			if($result = $mysqli->query($userExists))
			{
				while($row = $result->fetch_assoc())
				{
					if($row["user_id"] == $user)
					{
						$userFound = TRUE;
						$createPost = "INSERT INTO Posts (user_id, content) VALUES (\"" .$user. "\", \"" .$post. "\");";
						if($posted = $mysqli->query($createPost))
						{
							echo "<label> New Post created. </label>";
						}
						else
						{
							echo "<label> Creating Post failed. </label>";
						}
					}
				}
				if($userFound == FALSE)
				{
					echo "<label> Invalid Username </label>";
				}
			}
			else
			{
				  echo "<label> Getting users failed. </label>";
			}
		}
		else
		{
			echo "<label> The text must not be empty. </label>";
		}
	}
		
?>