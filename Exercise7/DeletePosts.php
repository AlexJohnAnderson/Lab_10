<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "a095a439", "shaic4Em", "a095a439");
	if($mysqli->connect_errno)
	{
		echo "<label> Connect failed. </label>";
		exit();
	}
	else
	{
		$postsForDelete = $_POST["posts"];
		for($i = 0; $i < count($postsForDelete); $i++)
		{
			$delete = "DELETE FROM Posts WHERE post_id=\"" .$postsForDelete[$i]. "\";";
			if($success = $mysqli->query($delete))
			{
				echo "<label>Post with ID '" .$postsForDelete[$i]. "' has been deleted </label><br>";
			}
			else
			{
				echo "<label>Post with ID '" .$postsForDelete[$i]. "' has failed while deleting</label><br>";
			}
		}
	}
?>