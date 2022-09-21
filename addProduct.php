<?php

session_start();

$_SESSION['current_page'] = 'home.php';

if( 
    isset($_SESSION['emp_email']) &&
    !empty($_SESSION['emp_email'])
){
    
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
        <link href="css/style-login.css" rel="stylesheet">
        <link href="css/style-landing-page.css" rel="stylesheet"> 

        <!-- External JS File -->
        <script type="text/javascript" src="js/code.js"></script>

        <title> Add New Product | Ecomarce</title>

        <style>
            
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


        <!-- Login Section -->
        <div class="container-fluid login-container content" style="padding: 2em 2em">
            <div class="d-flex justify-content-center d-flex align-items-center" style="flex-direction: column;">
            <h1 class="subtitle-text" style="margin-bottom: -0.5em;">
                <strong> Ecomarce </strong>
            </h1>
            <h4 style="margin-top: 1em; margin-bottom:2em;">Add New Product!</h4>
            </div>

            <form action="addProductProcess.php" method="post" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="Product">Product Name</label>
                    <input class="form-control" type="text" id="pname" name="pname" placeholder="Product Name" required>
                </div>
                <div class="form-group">
                    <label for="desc">Product Description</label>
                    <textarea class="form-control" type="text" id="desc" name="desc" placeholder="Product Description" rows="3" required> </textarea>
                </div>
                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input class="form-control" type="number" id="price" name="price" placeholder="Price of Product" required>
                </div>
                <div class="form-group">
                    <label for="stock">Amount in Stock</label>
                    <input class="form-control" type="number" id="stock" name="stock" placeholder="Amount in Stock" required>
                </div>


                <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 1em;">
                    <input class="btn btn-primary" type="submit" value="Click to Add Product">
                </div>
            </form>
        </div>
        <!-- Login Section End -->
        

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

        <!-- JS Script for Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <script>
            function checkPass(){
                let pass = document.getElementById('mypass').value;
                let passval = document.getElementById('mypassval').value;
                let passval_field = document.getElementById('mypassval');
                let passval_div = document.getElementById('passval-div');
                // let dob = document.getElementById('dob').value;

                // console.log(dob);

                if(passval != ""){
                    if(pass != passval){
                        passval_field.classList.add('is-invalid');
                        passval_field.classList.remove('is-valid');
                    }
                    else if(pass != ""){
                        passval_field.classList.add('is-valid');
                        passval_field.classList.remove('is-invalid');
                    }
                }
            }
            // Starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    let pass = document.getElementById('mypass').value;
                    let passval = document.getElementById('mypassval').value;
                    let passval_field = document.getElementById('mypassval');

                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
            })();
        </script>

    </body>
    </html>

    <?php
}
else{
    ?>
        <script>
            alert("Please log out before going to the sign-up page!");
            location.assign("index.html"); 
        </script>
    <?php
}

?>