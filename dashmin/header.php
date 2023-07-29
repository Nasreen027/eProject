<?php
include("php/query.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
    h4 {
        color: #6C7293;
    }
</style>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <!-- <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div> -->
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">


                    <a href="hospitalData.php" class="nav-item nav-link "><i class="fa fa-hospital me-2"></i>Hospital
                        Data</a>
                    <a href="vaccineReport.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Vaccine
                        Report</a>
                        <a href="parentRequest.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Parent</a>
                        <a href="childDetails.php" class="nav-item nav-link"><i class="fa fa-child me-2"></i>Child
                        Details</a>
                        <a href="requestPage.php" class="nav-item nav-link"><i class="fa fa-bell me-2"></i>Notifications</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class=" d-none d-md-flex ms-4">
                    <input id="taskFilter" name="search-query" class="taskFilter form-control border-0" type="search"
                        placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <?php 
                         $queryParentData = $pdo->query("SELECT * from parent_login where parentStatus = 'pending' LIMIT 2");
                         $resultParentData = $queryParentData->fetchAll(PDO::FETCH_ASSOC);
                         $queryHospitalData = $pdo->query("SELECT * from hospital_login where hospitalStatus = 'pending'  LIMIT 2");
                         $resultHospitalData = $queryHospitalData->fetchAll(PDO::FETCH_ASSOC);
                         $queryAppointment = $pdo->query("SELECT * from children_details where appointmentStatus = 'pending'  LIMIT 1");
                         $resultAppointment = $queryAppointment->fetchAll(PDO::FETCH_ASSOC);
                         if(empty($resultParentData) && empty($resultHospitalData)&& empty($resultAppointment) ){
                          ?>
                           <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">
                        <i class="fa fa-bell me-lg-2">
                        </i>
                        <span class="d-none d-lg-inline-flex">Notifications</span>
                       
                    </a>
                        
                        <?php 
                    }else{
                        
                        ?>
                          <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2 position-relative">
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute top-0 start-0 p-1"></div>
                            </i>
                            <span class="d-none d-lg-inline-flex">Notifications</span>
                           
                        </a>
                       
                     <?php
                     
                    }?>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

                            <?php
                            
                    
                             foreach($resultParentData as $row1){
                       ?>
                            <a href="parentRequest.php" class="dropdown-item link-secondary">

                                        <h6 class="fw-normal mb-0">
                                            <?php echo ucfirst($row1['parentName'])?> has requested for registeration
                                        </h6>
                            </a>
                            <hr class="dropdown-divider">
                            <?php
                             }
?>
                            <?php
                            
                    
                             foreach($resultAppointment as $row){
                       ?>
                            <a href="childDetails.php" class="dropdown-item link-secondary">

                                        <h6 class="fw-normal mb-0">
                                            <?php echo ucfirst($row['childName'])?> has requested for registeration
                                        </h6>
                            </a>
                            <hr class="dropdown-divider">
                            <?php
                             }                         
                    
                             foreach($resultHospitalData as $row2){
                       ?>
                            <a href="hospitalData.php" class="dropdown-item link-secondary">


                                <h6 class="fw-normal mb-0">
                                    <?php echo ucfirst($row2['hospitalName'])?> hospital has requested for registeration
                                </h6>


                            </a>
                            <hr class="dropdown-divider">
                            <?php
                             }
?>
                            <?php
    if (empty($resultHospitalData) && empty($resultParentData)  && empty($resultAppointment) ) {
        ?>
        <a class="dropdown-item text-center link-secondary">No notification</a>
    <?php
    } else {
        ?>
        <a href="requestPage.php" class="dropdown-item text-center link-secondary">See all notifications</a>
    <?php
    }
    ?>
                            <hr class="dropdown-divider">

                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Navbar End -->