<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="https://sfesearch.com/assets/128.png">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

     <style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}
.dropdown-container{
    position:absolute;
  top: 7px;
  right:70px;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>


   
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <?php 
 include_once("../DBConnection.php"); 
 session_start();
 $records=mysqli_query($db,"SELECT * FROM analyticss");
 ?>
 <?php
 function printByCountry($db,$cid)
{
  
  
  $country_query = "SELECT * FROM analyticss WHERE country = '$cid' order by id DESC";
  
  $exec_country_query = mysqli_query($db,$country_query);
    $sno =1;
    while($row = mysqli_fetch_array($exec_country_query,MYSQLI_ASSOC))
    {
      
                              echo "<tr>";
                              echo "<td>".$sno."</td>";
                              echo "<td>".$row['id']."</td>";
                              echo "<td>".$row['ip']."</td>";
                              echo "<td>".$row['search_term']."</td>";
                              echo "<td>".$row['engine']."</td>";
                              echo "<td>".$row['country']."</td>";
                              echo "<td>".$row['browser']."</td>";
                              echo "</tr>";
                              $sno++;
                            }

     


}
function printByCountryWithTime($db,$cid,$tid)
{
  
  if($tid==='1')
  {  
     
  $country_query = "SELECT * FROM analyticss WHERE country = '$cid' AND TIMEDIFF(NOW(),time)<='24:00:00' order by id DESC";
   }
   elseif($tid==='7')
   {
    $country_query = "SELECT * FROM analyticss WHERE country = '$cid' AND time >= 'NOW()- INTERVAL 7 DAY' order by id DESC";
   }
   elseif($tid==='14')
   {
    $country_query = "SELECT * FROM analyticss WHERE country = '$cid' AND time >= 'NOW()- INTERVAL 14 DAY' order by id DESC";
   }
   elseif($tid==='30')
   {
    $country_query = "SELECT * FROM analyticss WHERE country = '$cid' AND time >= 'NOW()- INTERVAL 30 DAY' order by id DESC";
   }
  $exec_country_query = mysqli_query($db,$country_query);
    $sno =1;
    while($row = mysqli_fetch_array($exec_country_query,MYSQLI_ASSOC))
    {
      
                              echo "<tr>";
                              echo "<td>".$sno."</td>";
                              echo "<td>".$row['id']."</td>";
                              echo "<td>".$row['ip']."</td>";
                              echo "<td>".$row['search_term']."</td>";
                              echo "<td>".$row['engine']."</td>";
                              echo "<td>".$row['country']."</td>";
                              echo "<td>".$row['browser']."</td>";
                              echo "</tr>";
                              $sno++;
                            }

     


}
function printByBrowser($db,$bid)
{
  
  
  $browser_query = "SELECT * FROM analyticss WHERE browser = '$bid' order by id DESC";
  
  $exec_browser_query = mysqli_query($db,$browser_query);
    $sno =1;
    while($row = mysqli_fetch_array($exec_browser_query,MYSQLI_ASSOC))
    {
      
                              echo "<tr>";
                              echo "<td>".$sno."</td>";
                              echo "<td>".$row['id']."</td>";
                              echo "<td>".$row['ip']."</td>";
                              echo "<td>".$row['search_term']."</td>";
                              echo "<td>".$row['engine']."</td>";
                              echo "<td>".$row['country']."</td>";
                              echo "<td>".$row['browser']."</td>";
                              echo "</tr>";
                              $sno++;
                            }

     


}
function printByBrowserWithTime($db,$bid,$tid)
{
  
  if($tid==='1')
  {     
  $browser_query = "SELECT * FROM analyticss WHERE browser = '$bid' AND TIMEDIFF(NOW(),time)<='24:00:00' order by id DESC";
   }
   elseif($tid==='7')
   {
    $browser_query = "SELECT * FROM analyticss WHERE browser = '$bid' AND time >= 'NOW()- INTERVAL 7 DAY' order by id DESC";
   }
   elseif($tid==='14')
   {
    $browser_query = "SELECT * FROM analyticss WHERE browser = '$bid' AND time >= 'NOW()- INTERVAL 14 DAY' order by id DESC";
   }
   elseif($tid==='30')
   {
    $browser_query = "SELECT * FROM analyticss WHERE browser = '$bid' AND time >= 'NOW()- INTERVAL 30 DAY' order by id DESC";
   }
 
  
  $exec_browser_query = mysqli_query($db,$browser_query);
    $sno =1;
    while($row = mysqli_fetch_array($exec_browser_query,MYSQLI_ASSOC))
    {
      
                              echo "<tr>";
                              echo "<td>".$sno."</td>";
                              echo "<td>".$row['id']."</td>";
                              echo "<td>".$row['ip']."</td>";
                              echo "<td>".$row['search_term']."</td>";
                              echo "<td>".$row['engine']."</td>";
                              echo "<td>".$row['country']."</td>";
                              echo "<td>".$row['browser']."</td>";
                              echo "</tr>";
                              $sno++;
                            }

     


}
function printByEngine($db,$eid)
{
  
  
  $engine_query = "SELECT * FROM analyticss WHERE engine = '$eid' order by id DESC";
  
  $exec_engine_query = mysqli_query($db,$engine_query);
    $sno = 1;
    while($row = mysqli_fetch_array($exec_engine_query,MYSQLI_ASSOC))
    {
      
                              echo "<tr>";
                              echo "<td>".$sno."</td>";
                              echo "<td>".$row['id']."</td>";
                              echo "<td>".$row['ip']."</td>";
                              echo "<td>".$row['search_term']."</td>";
                              echo "<td>".$row['engine']."</td>";
                              echo "<td>".$row['country']."</td>";
                              echo "<td>".$row['browser']."</td>";
                              echo "</tr>";
                              $sno++;
                            }

     


}
function printByEngineWithTime($db,$eid,$tid)
{
  if($tid==='1')
  {     
  $engine_query = "SELECT * FROM analyticss WHERE engine = '$eid' AND TIMEDIFF(NOW(),time)<='24:00:00' order by id DESC";
   }
   elseif($tid==='7')
   {
    $engine_query = "SELECT * FROM analyticss WHERE engine = '$eid' AND time >= 'NOW()- INTERVAL 7 DAY' order by id DESC";
   }
   elseif($tid==='14')
   {
    $engine_query = "SELECT * FROM analyticss WHERE engine = '$eid' AND time >= 'NOW()- INTERVAL 14 DAY' order by id DESC";
   }
   elseif($tid==='30')
   {
    $engine_query = "SELECT * FROM analyticss WHERE engine = '$eid' AND time >= 'NOW()- INTERVAL 30 DAY' order by id DESC";
   }
  
  
  $exec_engine_query = mysqli_query($db,$engine_query);
    $sno = 1;
    while($row = mysqli_fetch_array($exec_engine_query,MYSQLI_ASSOC))
    {
      
                              echo "<tr>";
                              echo "<td>".$sno."</td>";
                              echo "<td>".$row['id']."</td>";
                              echo "<td>".$row['ip']."</td>";
                              echo "<td>".$row['search_term']."</td>";
                              echo "<td>".$row['engine']."</td>";
                              echo "<td>".$row['country']."</td>";
                              echo "<td>".$row['browser']."</td>";
                              echo "</tr>";
                              $sno++;
                            }

     


}
function printByTime($db,$tid)
{
  if($tid==='1')
  {     
  $time_query = "SELECT * FROM analyticss WHERE TIMEDIFF(NOW(),time)<='24:00:00' order by id DESC";
   }
   elseif($tid==='7')
   {
    $time_query = "SELECT * FROM analyticss WHERE time >= 'NOW()- INTERVAL 7 DAY' order by id DESC";
   }
   elseif($tid==='14')
   {
    $time_query = "SELECT * FROM analyticss WHERE time >= 'NOW()- INTERVAL 14 DAY' order by id DESC";
   }
   elseif($tid==='30')
   {
    $time_query = "SELECT * FROM analyticss WHERE time >= 'NOW()- INTERVAL 30 DAY' order by id DESC";
   }
  
  
  $exec_time_query = mysqli_query($db,$time_query);
    $sno = 1;
    while($row = mysqli_fetch_array($exec_time_query,MYSQLI_ASSOC))
    {
      
                              echo "<tr>";
                              echo "<td>".$sno."</td>";
                              echo "<td>".$row['id']."</td>";
                              echo "<td>".$row['ip']."</td>";
                              echo "<td>".$row['search_term']."</td>";
                              echo "<td>".$row['engine']."</td>";
                              echo "<td>".$row['country']."</td>";
                              echo "<td>".$row['browser']."</td>";
                              echo "</tr>";
                              $sno++;
                            }

     


}
 ?>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
             <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="tables.php" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><img src="https://sfesearch.com/assets/128.png" style="height: 35px; margin: 0px 10px;"
><strong>Safe Search Dashboard</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>Safe Search</strong></div></a>

              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
               
                <!-- Languages dropdown    -->
                
                <!-- Logout    -->
                <li class="nav-item"><a href="../index.php" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
       
        <div class="content-inner">
         
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                
              
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                          <div class="dropdown">
                        <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
                         <?php
                          $url= $_SERVER['QUERY_STRING'];
                          
                         
                         echo "<a class='dropdown-item edit' href="."result.php?$url&time_url=1"."> Last 24 hours</a>";
                         echo "<a class='dropdown-item edit' href="."result.php?$url&time_url=7"."> Last 7 days</a>";
                         echo "<a class='dropdown-item edit' href="."result.php?$url&time_url=14"."> Last 14 days</a>";
                         echo "<a class='dropdown-item edit' href="."result.php?$url&time_url=30"."> Last 1 month</a>";
                       /* <a href="#" class="dropdown-item edit"> Last 7 days</a>
                      <a href="#" class="dropdown-item edit"> Last 14 days</a>
                    <a href="#" class="dropdown-item edit"> Last 1 month</a>*/
                     ?></div>
                      </div>
                      </div>
                    <div class="card-header d-flex align-items-center" style="padding: 20px 15px">
                      <h3 class="h4">Analytics</h3>
                       <div class="dropdown-container">
                   <div class="dropdown">
  <button class="dropbtn">Country</button>
  <div class="dropdown-content">
    
    <?php
     $country="SELECT distinct country FROM analyticss";
     $country_fetch=mysqli_query($db,$country);
     while($country_list=mysqli_fetch_array($country_fetch,MYSQLI_ASSOC))
     {
     
      echo "<tr>";
      $country=$country_list['country'];
      echo "<a href="."result.php?country_url=$country"."><td>".$country_list['country']."</a></td>";
      echo "</tr>";
      
     }
    ?>
 
</div>
</div>
<div class="dropdown">
  <button class="dropbtn">Engine</button>
  <div class="dropdown-content">
    
    <?php
     $engine="SELECT distinct engine FROM analyticss";
     $engine_fetch=mysqli_query($db,$engine);
     while($engine_list=mysqli_fetch_array($engine_fetch,MYSQLI_ASSOC))
     {
     
      echo "<tr>";
      $engine=$engine_list['engine'];
      echo "<a href="."result.php?engine_url=$engine"."><td>".$engine_list['engine']."</a></td>";
      echo "</tr>";
      
     }
    ?>
 
</div>
</div>
<div class="dropdown">
  <button class="dropbtn">Browser</button>
  <div class="dropdown-content">
    
    <?php
     $browser="SELECT distinct browser FROM analyticss";
     $browser_fetch=mysqli_query($db,$browser);
     while($browser_list=mysqli_fetch_array($browser_fetch,MYSQLI_ASSOC))
     {
     
      echo "<tr>";
      $browser=$browser_list['browser'];
      echo "<a href="."result.php?browser_url=$browser"."><td>".$browser_list['browser']."</a></td>";
      echo "</tr>";
      
     }
    ?>
 
</div>
</div>
<div class="dropdown">
  <a href="tables.php"><button class="dropbtn" style="
    padding: 16px 35px;">All</button></a>
</div>
</div>
</div>

                    
                    <div class="card-body">
                      <div class="table-responsive">                       
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Sr No.</th>
                              <th>Id</th>
                              <th>IP Address</th>
                              <th>Search Term</th>
                              <th>Engine</th>
                              <th>Country</th>
                              <th>Browser</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php
                           if((isset($_GET['country_url']))&&(!isset($_GET['time_url'])))
                           {
                                  $var=$_GET['country_url'];
                                  $_SESSION['country_url'] = $var;
                                  
                                   printByCountry($db,$var);
                          }
                          elseif(isset($_GET['engine_url'])&&(!isset($_GET['time_url'])))
                           {
                                  $var=$_GET['engine_url'];
                                  $_SESSION['engine_url'] = $var;
                                  
                                   printByEngine($db,$var);
                          }
                          elseif(isset($_GET['browser_url'])&&(!isset($_GET['time_url'])))
                           {
                                  $var=$_GET['browser_url'];
                                  $_SESSION['browser_url'] = $var;
                                  
                                   printByBrowser($db,$var);
                          }
                          elseif((isset($_GET['country_url']))&&(isset($_GET['time_url'])))
                          {
                            $var=$_GET['country_url'];
                            $vartime=$_GET['time_url'];
                            
                            $_SESSION['country_url'] = $var;
                            $_SESSION['time_url'] = $vartime;
                            printByCountryWithTime($db,$var,$vartime);


                          }
                           elseif((isset($_GET['browser_url']))&&(isset($_GET['time_url'])))
                          {
                            $var=$_GET['browser_url'];
                            $vartime=$_GET['time_url'];
                            
                            $_SESSION['browser_url'] = $var;
                            $_SESSION['time_url'] = $vartime;
                            printByBrowserWithTime($db,$var,$vartime);


                          }
                           elseif((isset($_GET['engine_url']))&&(isset($_GET['time_url'])))
                          {
                            $var=$_GET['engine_url'];
                            $vartime=$_GET['time_url'];
                           
                            $_SESSION['engine_url'] = $var;
                            $_SESSION['time_url'] = $vartime;
                            printByEngineWithTime($db,$var,$vartime);


                          }
                          elseif((!isset($_GET['country_url']))&&(!isset($_GET['browser_url']))&&(!isset($_GET['engine_url']))&&(isset($_GET['time_url'])))
                          {
                            
                            $vartime=$_GET['time_url'];
                            $_SESSION['time_url'] = $vartime;
                            printByTime($db,$vartime);


                          }

                            ?>

                           
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </section>
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Your company &copy; 2017-2019</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="https://bootstrapious.com/p/admin-template" class="external">Bootstrapious</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>