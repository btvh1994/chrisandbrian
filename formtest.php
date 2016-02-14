<!DOCTYPE html>
<html>
    <head>
        <title>Form Test</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body>
        <h3 class="text-center">This is going to be used for form testing in php, feel free to play around with it!</h3>
        <div class="container">
            <div class="row">
                <div class="well col-md-6 col-md-offset-3 text-center">
                    <form method="post">
                        <div class="form-group">
                            <input class="form-control" name="name" placeholder="Your name here">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="mood" placeholder="Your mood here">
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
        </br>
        <div class="container">
            <div class="row">
                <?php 
                    if ($_POST['name'] != null AND $_POST['mood'] != null)
                        echo "<div class='well col-md-6 col-md-offset-3 text-center'>Hello ".$_POST['name'].", I see that you feel ".$_POST['mood']." today.</div>";
                ?>
            </div>
        </div>
        <div class="container text-center">
            <a href="index.php" class="btn btn-success">Back to home page</a>
        </div>
    </body>
</html>