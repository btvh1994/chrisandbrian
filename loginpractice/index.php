<?php include("login.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Social media test</title>
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
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
  			
          				<span class="icon-bar"></span>
          				
          				<span class="icon-bar"></span>
          				
          				<span class="icon-bar"></span>
          					
          			</button>
          			<a class="navbar-brand">Social Media Site</a>
                </div>
                <div class="collapse navbar-collapse">
                    <form class="navbar-form navbar-right" method="post"> 
  			
          				<div class="form-group">
          				
          					<input type="email" name="loginemail" placeholder="Email" class="form-control" value="<?php echo addslashes($_POST['loginemail']); ?>" />
          																								   
          				</div>
          				
          				<div class="form-group">
          				
          					<input type="password" name="loginpassword" placeholder="Password" class="form-control" value="<?php echo addslashes($_POST['loginpassword']); ?>" />
          																											
          				</div>
          				
          				<input type="submit" name= "submit" class="btn btn-success" value="Log In">
          				
          			</form>
                </div>
            </div>
        </div>
        <div class="container text-center marginTop2">
            <div class="row">
                <div class="well col-md-6 col-md-offset-3">
                    <h2 class="marginTop">Sign up!</h2>
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
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="email"/>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type='password' name="password" class="form-control" placeholder="password"/>
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" name="cpassword" class="form-control" placeholder="confirm password"/>
                        </div>
                        <input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg marginTop"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <a href="../index.php" class="btn btn-success">Back to Home Page</a>
        </div>
        
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
        <script>
        
        
    		$(".contentContainer").css("min-height",$(window).height());
        
        </script>
    </body>
</html>