<?php 
    
    session_start();
    include("connection.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Chris and Brian cool site</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body>
        <div class="container text-center">
            <?php
                $query= "SELECT * FROM `profiles` WHERE user_id ='".$_SESSION['id']."'";
    			
    			$result = mysqli_query($link, $query);	
    			
    			$results = mysqli_num_rows($result);
                if (!$results){
                    echo "<h1 class='jumbotron'>Welcome!</h1><div class='container text-center'><div class='well'>
            <p>You've just signed up with a fantastic community of badasses (see Brian and Chris). <a href='profilesetup.php'>Create a profile</a> and share the love with the community!</p><br/></div></div>";
                }
                else {
                    echo "<h1 class='jumbotron'>Welcome back!</h1><div class='container text-center'><div class='well'><p>We have fun things planned, stay tuned....</p></div></div>";
                }
            ?>
            <a href="../index.php">Back to main home page</a>
        </div>
    </body>
</html>