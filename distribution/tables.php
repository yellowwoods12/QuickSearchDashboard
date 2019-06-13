<?php
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["loggedin"]) ){
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Safe Search - Admin Dashboard</title>
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
 
 $records=mysqli_query($db,"SELECT * FROM analyticss order by id DESC");
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
                  </a>

              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
               
                <!-- Languages dropdown    -->
                
                <!-- Logout    -->
                <li class="nav-item"><a href="../logout.php" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
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
                          
                         
                         echo "<a class='dropdown-item edit' href="."result.php?time_url=1"."> Last 24 hours</a>";
                         echo "<a class='dropdown-item edit' href="."result.php?time_url=7"."> Last 7 days</a>";
                         echo "<a class='dropdown-item edit' href="."result.php?time_url=14"."> Last 14 days</a>";
                         echo "<a class='dropdown-item edit' href="."result.php?time_url=30"."> Last 1 month</a>";
                       /* <a href="#" class="dropdown-item edit"> Last 7 days</a>
                      <a href="#" class="dropdown-item edit"> Last 14 days</a>
                    <a href="#" class="dropdown-item edit"> Last 1 month</a>*/
                     ?></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center" style="padding: 20px 15px">
                      <h3 class="h4">analytics</h3>
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
</div>
</div>
                    
                    <div class="card-body">
                      <div class="table-responsive">                       
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Sr No.</th>
                              <th>ID</th>
                              <th>IP Address</th>
                              <th>Search Term</th>
                              <th>Engine</th>
                              <th>Country</th>
                              <th>Browser</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sno=1;
                            while($analytics=mysqli_fetch_array($records,MYSQLI_ASSOC))
                            {
                                
                              echo "<tr>";
                              echo "<td>".$sno."</td>";
                              echo "<td>".$analytics['id']."</td>";
                              echo "<td>".$analytics['ip']."</td>";
                              echo "<td>".$analytics['search_term']."</td>";
                              echo "<td>".$analytics['engine']."</td>";
                              echo "<td>".$analytics['country']."</td>";
                              echo "<td>".$analytics['browser']."</td>";
                              echo "</tr>";
                              $sno++;
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