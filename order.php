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
                        <a href="order.php">order</a>
                    </li>
                    
                </ol>
                    <div class="clearfix"></div>
                 </div>
                 
                      
           
           
           
 

        <div class="row">
                   <div class="col-md-12">
                       <div class="white-box">
                           <h2 class="header-title">order information</h2>
                            <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="bus" cellspacing="0">
                             <?php


$query = "SELECT * FROM car_order  ";


$result = mysqli_query($connection, $query);


?>
<?php require_once('logincheck.php');?>
                         
                                   
                                     <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>customer_id</th>
                                            <th>name</th>
                                            <th>ticket_type</th>
                                            <th>order_month</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                                   <?php
                                                    while ($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
     echo "<td>" . $row["customer_id"] . "</td>";
    echo "<td>" . $row["Name"] . "</td>";
     echo "<td>" . $row["ticket_type"] . "</td>";  
      echo "<td>" . $row["order_month"] . "</td>";   
                                                     
     
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

   


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>

 
    <script src="assets/js/init/datatables-init.js"></script>

   

                  </body>
</html>
