<?php

$pagelevel = 3;
error_reporting(0);
require_once('db.php');
session_start();
require_once('header.php');
require_once('logincheck.php');
?>
<!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">finance</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="homepage.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="ticket.php">ticket</a>
                    </li>
                    
                </ol>
                    <div class="clearfix"></div>
                 </div>
      
         
       <div class="content">
            <div class="animated fadeIn">
                <div class="row">
<div class="white-box">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                
                             <?php

 if(isset($_POST[submit])) {
 $ticket_date = $_POST[ticket_date];
$query = "SELECT * FROM `car_ticket` ";
$query .= "where ticket_date = '$ticket_date' ";
     
}else{
    $query  = "SELECT * "; 
    $query .= "FROM car_ticket ";
}

$result = mysqli_query($connection, $query);

if (!$result) {
    die("query is wrong");
}

?>
                                <div class="card">
<div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
            <form action="ticket.php" method="post">
              <input type="date" class="form-control bg-light border-0 small" name="ticket_date" placeholder="enter date..." aria-label="Search" aria-describedby="basic-addon2" size="30" >
                
              <input type="submit" name="submit" value="search">
                </form>
              </div>
            </div>
        </div>
 
                            <div class="card-body">
                             
                                      <table class="table table-bordered table-hover" id="bootstrap-data-able" cellspacing="0">
                                     <thead>
                                        <tr>
                                            <th>ticket_id</th>
                                            <th>customer_id</th>
                                           <th>name</th>
                                            <th>ticket_type</th>
                                            <th>ticket_date</th>
                                            <th>ticket_price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                                   <?php
                                                    while ($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row["ticket_id"] . "</td>";
    echo "<td>" . $row["customer_id"] . "</td>";
     echo "<td>" . $row["name"] . "</td>";       
  echo "<td>" . $row["ticket_type"] . "</td>";
   echo "<td>" . $row["ticket_date"] . "</td>";                                                     
      echo "<td>" . $row["ticket_price"] . "</td>";                                                 
     
    echo "</tr>";
}
            
?>
                                               </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
<?php
    
    //4. free results
    mysqli_free_result($result);

    //5. close db connection
    mysqli_close($connection);

?>
   
    
		<?php
 
       require_once('footer.php') 
    ?>
        
</body>
</html>