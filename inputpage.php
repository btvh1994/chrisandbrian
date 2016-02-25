<?php 
    session_start();
    $link= mysqli_connect("localhost", "tripadmin", "password", "tripplanningsite");
    if ($_GET['id']){
        $_SESSION['id'] = $_GET['id'];
        $query ="SELECT * FROM `locations` WHERE id = '".$_GET['id']."'";
        error_log($query);
        $result = mysqli_query($link,$query);
        $results = mysqli_num_rows($result);
        if ($results) {
            $row = mysqli_fetch_array($result);
            if ($row['name'])
                $name = $row['name'];
            else
                $name = "";
            if ($row['nearest_city'])
                $city = $row['nearest_city'];
            else
                $city = "";
            if ($row['price'])
                $price = $row['price'];
            else
                $price = "";
            if ($row['longitude'])
                $long = $row['longitude'];
            else
                $long = "";
            if ($row['latitude'])
                $lat = $row['latitude'];
            else
                $lat = "";
            error_log($name.", ".$city.", ".$price.", ".$long.", ".$lat);
        }
    }
    
    
    error_log($_GET['id']);
    
    if ($_POST['submit']=="Enter") {
		
		if ($_POST['lat'] > 90.0 OR $_POST['lat'] < -90.0) $error.="<br />Please make sure that latitude is within the correct range (-90.0 through 90.0).";
		
		if ($_POST['long'] > 180.0 OR $_POST['long'] < -180.0) $error.="<br />Please make sure that longitude is within the correct range (-180.0 through 180.0).";
		
		if ($error) $error = "There were error(s) in your sign up details:".$error;
			
		else {	
		    if (!$results){
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
    		else {
    		    $query = "UPDATE locations SET name = '".mysqli_real_escape_string($link, $_POST['name']).
    		    "', nearest_city = '".mysqli_real_escape_string($link, $_POST['city']).
    		    "', price = '".mysqli_real_escape_string($link, $_POST['price']).
    		    "', longitude = ".mysqli_real_escape_string($link, $_POST['long']).
    		    ", latitude = ".mysqli_real_escape_string($link, $_POST['lat']).
    		    " WHERE id = ".$_SESSION['id'].";";
    		    error_log($query);
    
    	    	mysqli_query($link, $query);
    		
    		    mysqli_commit($link);
    		
        		header("Location:outputfile.php");
    		}
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
                    <h2 class="marginTop">Database Form</h2>
                    <p>Not all firlds are required, blanks can be fixed later.</p></br>
                    <?php
 			 
         			 	if ($error) {
         			 	
         			 		echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
         			 	
         			 	}
         			 
         			 ?>
                    <form method="post" class="marginTop">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="name" value="<?php if ($results) echo $name;?>"/>
                        </div>
                        <div class="form-group">
                            <label for="city">Nearest City</label>
                            <input type='text' name="city" class="form-control" placeholder="(Does not have to be exact)" value="<?php if ($results) echo $city;?>"/>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" placeholder="price" step="any" value="<?php if ($results) echo $price;?>"/>
                        </div>
                        <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="number" name="lat" class="form-control" placeholder="latitude" step="any" value="<?php if ($results) echo $lat;?>"/>
                        </div>
                        <div class="form-group">
                            <label for="long">Longitude</label>
                            <input type="number" name="long" class="form-control" placeholder="longitude" step="any" value="<?php if ($results) echo $long;?>"/>
                        </div>
                        <input type="submit" name="submit" value="Enter" class="btn btn-default btn-lg marginTop"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <a href="index.php" class="btn btn-primary">Back to Home Page</a>
            <a href="outputfile.php" class="btn btn-warning">Check out the Database table</a>
        </div>
    </body>
</html>