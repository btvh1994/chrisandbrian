<?php 

    $link= mysqli_connect("localhost", "tripadmin", "password", "tripplanningsite");
    
    if ($_POST['submit']=="Enter") {
		
		if ($_POST['lat'] > 90.0 OR $_POST['lat'] < -90.0) $error.="<br />Please make sure that latitude is within the correct range (-90.0 through 90.0).";
		
		if ($_POST['long'] > 180.0 OR $_POST['long'] < -180.0) $error.="<br />Please make sure that longitude is within the correct range (-180.0 through 180.0).";
		
		if ($error) $error = "There were error(s) in your sign up details:".$error;
			
		else {	
    		$query = "INSERT INTO `locations` (`name`, `nearest_city`, `price`, `longitude`, `latitude`) VALUES ('"
    		.mysqli_real_escape_string($link, $_POST['name'])
    		."', '".mysqli_real_escape_string($link, $_POST['city'])
    		."', '".mysqli_real_escape_string($link, $_POST['price'])
    		."', '".mysqli_real_escape_string($link, $_POST['long'])
    		."', '".mysqli_real_escape_string($link, $_POST['lat'])."');";
    		
    		error_log($query);
    
    		mysqli_query($link, $query);
    		
    		mysqli_commit($link);
    		
    		header("Location:inputpage.php");
		}
	}	


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Input Page</title>
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
                    <h2 class="marginTop">Enter here</h2>
                    <p>Not all firlds are required, blanks can be fixed later.</p></br>
                    <?php
 			 
         			 	if ($error) {
         			 	
         			 		echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
         			 	
         			 	}
         			 	
         			 	if ($message) {
         			 	
         			 		echo '<div class="alert alert-success">'.addslashes($message).'</div>';
         			 	
         			 	}
         			 
         			 ?>
                    <form method="post" class="marginTop">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="name"/>
                        </div>
                        <div class="form-group">
                            <label for="city">Nearest City</label>
                            <input type='text' name="city" class="form-control" placeholder="(Does not have to be exact)"/>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" placeholder="price" step="any"/>
                        </div>
                        <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="number" name="lat" class="form-control" placeholder="latitude" step="any"/>
                        </div>
                        <div class="form-group">
                            <label for="long">Longitude</label>
                            <input type="number" name="long" class="form-control" placeholder="longitude" step="any"/>
                        </div>
                        <input type="submit" name="submit" value="Enter" class="btn btn-success btn-lg marginTop"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <a href="index.php" class="btn btn-success">Back to Home Page</a>
            <a href="outputfile.php" class="btn btn-warning">Check out the Database table</a>
        </div>
    </body>
</html>