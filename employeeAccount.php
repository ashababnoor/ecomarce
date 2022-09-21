<?php

session_start();

$_SESSION['current_page'] = 'employeeAccount.php';

if(
    isset($_SESSION['emp_email']) &&
    !empty($_SESSION['emp_email']) &&
    isset($_SESSION['emp_id']) &&
    !empty($_SESSION['emp_id'])
){
    //page will be shown only if user is logged in
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link rel="icon" href="resources/" type="image/svg">

        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Bootsrap Icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-employee-general.css" rel="stylesheet">
        <link href="css/style-employee-home.css" rel="stylesheet">

        <title>Employee Home Page | Ecomarce</title>

        <style>
            .main-container > div {
                margin-bottom: 0em;
            }
            .main-container h4{
                margin-left: 1em;
            }
            
        </style>
    </head>

    <body>
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="employeeHome.php" class="navbar-brand"> Ecomarce </a>
            
            <div class="navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" id="dropDownForLogOut" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1em;">
                            <?php echo $_SESSION['emp_firstname'], ' ', $_SESSION['emp_lastname']; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropDownForLogOut">
                            <a href="employeeAccount.php" class="dropdown-item"> Settings </a>
                            <div class="dropdown-divider"></div>
                            <a href="employeeLogoutProcess.php" class="dropdown-item"> Log Out </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Main Section Start -->
        <div class="content main-container narrow-container container-div">

            <!-- First Row : Title -->

            <div class="row">
                <h4 class="" style="color: var(--clr-bs-primary);">My Employee Info </h4>
            </div>
            
            

        </div>
        <!-- Main Section End -->


        <!-- Footer Start -->
        <footer>
            <div class="row no-gutters text-center text-dark bg-light custom-footer">
                <div class="col-sm-4">
                    Contact Information
                </div>
                <div class="col-sm-4">
                    Copyright © 2022
                </div>
                <div class="col-sm-4">
                    <a href="index.html" class="">
                        Ecomarce
                    </a>
                </div>
            </div>
        </footer>
        <!-- Footer End -->


        <!-- JS files needed for Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
    </html>

    <?php

}
else{
    ?>
        <script> location.assign("employeeLogin.php") </script>
    <?php
}

?>