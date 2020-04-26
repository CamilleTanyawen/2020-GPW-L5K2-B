<?php

require ('db.php');

?>

<html>
    <head>
        <title>Zoo</title>
        <link type="text/css" rel="stylesheet" href="style.css">
    </head>      
        <h1 style="text-align:center">Zoo Management System</h1>
        <hr/>
        
        
<a href="animals.php">Animal</a>
<a href="locations.php">Location</a>
<a href="doctors.php">Doctor</a>
<a href="illness.php">Illness</a>
<a href="medicine.php">Medicine</a>

<p>
    <img src="timg.jpg" width="1000" height="400"></p>
    
<?php

// 5. close db connection
mysqli_close($connection);

?>