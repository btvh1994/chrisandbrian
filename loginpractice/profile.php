<?php 
	
	$query= "SELECT * FROM `profiles` WHERE user_id ='".$_SESSION['id']."'";
			
	$result = mysqli_query($link, $query);	
	
	$results = mysqli_num_rows($result);
	

	
  	if ($_POST['submit']=="Finish") {
		
		if (!($results)){
		
			$query = "INSERT INTO `profiles` (`user_id`, `name`, `job`, `relationship_status`, `description`) VALUES ('"
			.$_SESSION['id']
			."', '".mysqli_real_escape_string($link, $_POST['name'])
			."', '".mysqli_real_escape_string($link, $_POST['job'])
			."', '".mysqli_real_escape_string($link, $_POST['relationship'])
			."', '".mysqli_real_escape_string($link, $_POST['description'])."');";
			
			error_log($query);
	
			mysqli_query($link, $query);
			
			mysqli_commit($link);
			
			header("Location:homepage.php");
		
		}
		else {
			$query = "UPDATE `profiles` SET name = '"
			.mysqli_real_escape_string($link, $_POST['name'])."', job = '"
			.mysqli_real_escape_string($link, $_POST['job'])."',relationship_status = '"
			.mysqli_real_escape_string($link, $_POST['relationship'])."',description = '"
			.mysqli_real_escape_string($link, $_POST['description'])."' WHERE user_id = "
			.$_SESSION['id'].";";
			
			error_log($query);
	
			mysqli_query($link, $query);
			
			mysqli_commit($link);
			
			header("Location:homepage.php");
		}
  	}



?>