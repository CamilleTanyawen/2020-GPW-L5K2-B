<?php

$pagelevel = 3;
error_reporting(0);
require('db.php');
require('header.php');
require_once('logincheck.php');

?>





    
   <!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">Dashboard</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
  
                    </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->          
           

                <!--Start row-->
                  <div class="row">
                   <!--Start info box-->
                   <div class="col-md-3 col-sm-6">
                       <div class="info-box-main">
                          <div class="info-stats">
                              <p>1250</p>
                              <span>Today Sales </span>
                          </div>
                          <div class="info-icon text-primary ">
                              <i class="mdi mdi-cart"></i>
                          </div>
                          <div class="info-box-progress">
                             <div class="progress">
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                             </div>
                          </div>
                          </div>
                       </div>
                   </div>
                   <!--End info box-->
                   
                   <!--Start info box-->
                   <div class="col-md-3 col-sm-6">
                       <div class="info-box-main">
                          <div class="info-stats">
                              <p>2300</p>
                              <span>Daily visitors</span>
                          </div>
                          <div class="info-icon text-info">
                             <i class="mdi mdi-account-multiple"></i>	
                          </div>
                          <div class="info-box-progress">
                             <div class="progress">
                              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                             </div>
                          </div>
                          </div>
                       </div>
                   </div>
                   <!--End info box-->
                
                   <!--Start info box-->
                   <div class="col-md-3 col-sm-6">
                       <div class="info-box-main">
                          <div class="info-stats">
                              <p>5320</p>
                              <span>Daily revenue</span>
                          </div>
                          <div class="info-icon text-warning">
                              <i class="fa fa-dollar"></i>
                          </div>
                          <div class="info-box-progress">
                             <div class="progress">
                              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                              </div>
                          </div>
                          </div>
                       </div>
                   </div>
                   <!--End info box-->
                
                   <!--Start info box-->
                   <div class="col-md-3 col-sm-6">
                       <div class="info-box-main">
                          <div class="info-stats">
                              <p>65</p>
                              <span>Pending Orders</span>
                          </div>
                          <div class="info-icon text-danger">
                              <i class="mdi mdi-weight"></i>
                          </div>
                          <div class="info-box-progress">
                             <div class="progress">
                              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                             </div>
                          </div>
                          </div>
                       </div>
                   </div>
                   <!--End info box-->
                
                  </div>
                  <!--End row-->
                  
           
           <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
  
   
                <!--Start row-->  
    
                <div class="row">
                     <div class="col-md-6">
                         <div class="white-box">
                         <h2 class="header-title">Amount of tickets sold (thousands)</h2>
                            <ul class="list-inline text-center m-t-10">
                              
                            </ul>
                               
                                <canvas id="case" height="250PX"></canvas>
                             
                         </div>
                     </div>
                     
                     
                  <div class="col-md-6">
                      <div class="white-box">
                          <div class="card-header py-3">
                  <h6 class="header-title">Most popular destination</h6>
                          </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">ChengDu 
                      <br><span class="float-right"></span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">KangDing<br><span class="float-right"></span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">MianYang<br><span class="float-right"></span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 38%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">NanChong<br> <span class="float-right"></span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width:30%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">PanZhiHua<br><span class="float-right"></span></h4>
                  <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 27%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      
                  </div>
                </div>
              </div>
                          
                      <div class="row">
                    <div class="white-box">
                    <div class="col-md-12">
						<table class="table stats-table ">
							<thead>
								<tr>
									<th>NO</th>
									<th>ticket_type</th>
									<th>Price</th>
								</tr>
							</thead>
                           
							<tbody>
                                
								<tr>
									<th scope="row">1</th>
									<td> ecomony </td>
                                    
									<td> 25RMB/50KM </td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td> business </td>
                                    <td> 95RMB/50KM</td>
								</tr>
				
								
							</tbody>
						</table>
					</div>
					<div class="clearfix"> </div>
				</div>
                  
              
                
  
<?php require_once('case.php');?>
                  </body>
</html>

    
 </body>

</html>

