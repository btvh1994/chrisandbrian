<?php 
    
    session_start();
    include("connection.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Chris and Brian cool site</title>
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
            <?php
                $query= "SELECT * FROM `profiles` WHERE user_id ='".$_SESSION['id']."'";
    			
    			$result = mysqli_query($link, $query);	
    			
    			$results = mysqli_num_rows($result);
                if (!$results){
                    echo "<h1 class='jumbotron'>Welcome!</h1><div class='container text-center'><div class='well'>
            <p>You've just signed up with a fantastic community of badasses (see Brian and Chris). <a href='profilesetup.php'>Create a profile</a> and share the love with the community!</p><br/></div></div>";
                }
                else {
                    echo "<h1 class='jumbotron'>Welcome back!</h1><div class='container text-center'><div class='well'><p>We have fun things planned! For now, <a href='profilelist.php'>check out the rest of the community</a></p></br></br>
                    <p>Also, if you want to update your profile, simply click <a href='profilesetup.php'>here</a> to change it up!</div></div>";
                }
            ?>
            <a href="../index.php">Back to main home page</a>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
        </div>
    </body>
</html>