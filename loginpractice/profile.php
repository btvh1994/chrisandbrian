<?php 
		
  		if ($_POST['submit']=="Finish") {
			
			
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




?>