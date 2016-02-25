<?php 
    if ($_SESSION['id']){
        session_destroy();
    }
    $link= new mysqli("localhost", "tripadmin", "password", "tripplanningsite");
    // Check connection
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    } 
    
    $sql = "SELECT * FROM locations";
    $result = $link->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['id'].":&nbsp&nbsp&nbsp&nbsp Name: "
            .$row['name']."&nbsp&nbsp&nbsp&nbsp Nearest City: "
            .$row['nearest_city']."&nbsp&nbsp&nbsp&nbsp Price: "
            .$row['price']."&nbsp&nbsp&nbsp&nbsp Latitude: "
            .$row['latitude']."&nbsp&nbsp&nbsp&nbsp Longitude: "
            .$row['longitude']."&nbsp&nbsp&nbsp<a href='inputpage.php?id=".$row['id']."'>Edit</a></br></br>";
        }
    } else {
        echo "0 results";
    }
    $link->close();
    echo "<br/><br/><a href='index.php'>Back to homepage</a></br></br><a href='inputpage.php'>Input more entries</a>";
?>