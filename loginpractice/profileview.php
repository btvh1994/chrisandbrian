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
	    if ($row['birthdate']){
	        $date = DateTime::createFromFormat('Y-m-d', $row['birthdate']);
	        $bday = $date->format('F jS, Y');
	    } else 
	        $bday = "";
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
        <div class="container">
            <div class="row">
                <div class="col-md-3 marginTop2">
                    (profile picture goes here)
                </div>
                <div class="col-md-6 marginTop2">
                    <h1><?php echo $name;?></h1>
                    <p>Job: <?php echo $job;?></p>
                    <p>Birthday: <?php echo $bday; ?></p>
                    <p>Relationship status: <?php echo $relationship; ?></p>
                    <div class="well" style="background-color: #827bd2; color: white;">
                        <p><?php echo $description;?></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    </body>
</html>