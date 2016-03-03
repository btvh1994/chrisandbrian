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
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="homepage.php">Home</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown text-center">
                            <ul class="navbar-nav nav">
                                <li><a href="profileview.php?id=<?php echo $_SESSION['id'];?>">My Profile</a></li>
                                <li><a href="index.php?logout=1">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
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
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
                </div>
            </div>
        </div>
    </body>
</html>