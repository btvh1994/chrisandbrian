<?php session_start(); include("connection.php"); 

    $query= "SELECT * FROM `profiles` WHERE user_id ='".$_SESSION['id']."'";
    
    error_log($query);
			
	$result = mysqli_query($link, $query);	
	
	$results = mysqli_num_rows($result);
	
	if ($results) {
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
	
	include("profile.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Chris and Brian cool site - Profile setup</title>
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
        <div class="container text-center marginTop2">
            <div class="row">
                <div class="well col-md-6 col-md-offset-3">
                    <h2>Welcome to profile setup!</h1>
                    <p>Please enter any of the following information and tell everyone about yourself!</p></br>
                    <form method="post" class="marginTop">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="name" value="<?php if ($results) echo $name; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="job">Current Job</label>
                            <input type='text' name="job" class="form-control" placeholder="current job" value="<?php if ($results) echo $job; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="relationship">Relationship</label>
                            <input type="text" name="relationship" class="form-control" placeholder="current relationship status" value="<?php if ($results) echo $relationship; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" placeholder="tell us about yourself...." rows="5" name="description"><?php if ($results) echo $description; ?></textarea>
                        </div>
                        <input type="submit" name="submit" value="Finish" class="btn btn-success btn-lg marginTop"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <a href="homepage.php" class="btn btn-success">Back to Home Page</a>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script>
            
        </script>
    </body>
</html>