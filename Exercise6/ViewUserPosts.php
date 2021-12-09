<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "a095a439", "shaic4Em", "a095a439");
	if($mysqli->connect_errno)
	{
		echo "<label> Connect failed. </label>";
		exit();
	}
	else
	{
		$user = $_POST["userDropDown"];
		
		$posts = "SELECT * FROM Posts WHERE user_id=\"" .$user. "\"";
		echo "<label> " .$user. "'s Posts: </label><br>";
		echo '<table>';
		echo '<tr> <th>Post ID</th> <th>Content</th> </tr>';
		if($result = $mysqli->query($posts))
		{

			while($row = $result->fetch_assoc())
			{
				echo '<tr> <td>' .$row["post_id"]. '</td> <td>' .$row["content"]. '</td> </tr>';
			}
		}
		else
		{
			echo "<label> Post Fetch Failed. </label>";
		}
		echo "</table>";
	}
?>