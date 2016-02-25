<?php 

    session_start();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Chris and Brian cool site - Profile List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <style type="text/css">
            .marginTop2{
   			margin-top:80px;
   		
   		}
   		.marginTop{
   			margin-top:2px;
   		
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
        <div class="container text-center marginTop2">
            <div class="jumbotron">
                <h1>Profile list</h1>
            </div>
        </div>
        <div class = "container">
            <div class="row">
                <div class = "col-md-6 col-md-offset-3 text-center">
                    <?php 
                        $link= new mysqli("localhost", "loginadmin", "password", "loginsite");
                        // Check connection
                        if ($link->connect_error) {
                            die("Connection failed: " . $link->connect_error);
                        }
                        $sql = "SELECT * FROM profiles";
                        $result = $link->query($sql);
                        
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                if ($row['user_id'] != $_SESSION['id']){
                                    echo "<div class='marginTop'><div class='row well'><div class='col-md-4' style='border-right: 1px solid black;'>".$row['name'].
                                    "</div><div class='col-md-4'>".$row['job'].
                                    "</div><div class='col-md-4'><a class='btn btn-default' href='profileview.php?id=".$row['user_id']."'>View</a></div></div></div></br>";
                                }
                            }
                        } else {
                            echo "No profiles available at this time";
                        }
                        $link->close();
                    ?>
                    <a href="homepage.php" class="btn btn-success">Back to Home Page</a>
                    <a href="../index.php" class="btn btn-success">Back to Main Home Page</a>
                </div>
            </div>
        </div>
    </body>
</html>