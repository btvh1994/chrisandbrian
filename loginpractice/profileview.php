<?php 
    session_start(); include('connection.php');
    
    $query = "SELECT * FROM profiles WHERE user_id = '".mysqli_real_escape_string($link, $_GET['id'])."';";
    
    error_log($query);
    
    $result = mysqli_query($link, $query);
    
    $results = mysqli_num_rows($result);
    
    if (!$results) header("Location: errorpage.php");
    
    else {
        $row = mysqli_fetch_array($result);
        if ($row['name'])
	        $name = $row['name'];
	    else 
	        $name = "";
	    if ($row['job'])
	        $job = $row['job'];
	    else 
	        $job = "";
	    if ($row['relationship_status'])
	        $relationship = $row['relationship_status'];
	    else 
	        $relationship = "";
	    if ($row['description'])
	        $description = $row['description'];
	    else 
	        $description = "";
	    error_log($name.", ".$job.", ".$relationship.", ".$description.", ".$row);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Viewing <?php echo $name; ?>'s Profile</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <style type="text/css">
            .marginTop2{
   			margin-top:80px;
   		
   		}
   		.marginTop{
   			margin-top:30px;
   		
   		}
        </style>
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
         	<div class="container">
    	    	<div class="navbar-header pull-left">
    		    	<a class="navbar-brand" href="homepage.php">Secret Diary</a>
    	    	</div>
      	    	<div class="pull-right">
     		    	<ul class= "navbar-nav nav">
     		    	    <li><a href="profileview.php?id=<?php echo $_SESSION['id'];?>">My Profile</a></li>
         		       	<li><a href="index.php?logout=1">Log Out</a></li>
         		    </ul>
     		    </div>
            </div>	
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 marginTop2">
                    (profile picture goes here)
                </div>
                <div class="col-md-6 marginTop2">
                    <h1><?php echo $name;?></h1>
                    <p>Job: <?php echo $job;?></p>
                    <p>Relationship status: <?php echo $relationship; ?></p>
                    <div class="well" style="background-color: #827bd2; color: white;">
                        <p><?php echo $description;?></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>