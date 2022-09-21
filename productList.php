<?php

session_start();

if(
    isset($_SESSION['emp_email']) &&
    !empty($_SESSION['emp_email'])
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

        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Bootsrap Icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-employee-general.css" rel="stylesheet">


        <!-- External JS File -->
        <script type="text/javascript" src="js/code.js"></script>

        <title> List of All Products | Ecomarce </title>

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

        <div class="container-fluid content main-container">
            <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 1em;">
                <h4> Product List </h4>
                <input type="button" class="btn btn-light" value="Add New Product" onclick="redirect('addProduct.php')">
            </div>
            
            <div class="table-responsive">
                <!-- Recipe Table -->
                <table class="table table-hover" id="dataTable">
                    <thead class="thead-light">
                        <th> ID </th> 
                        <th> Name </th>
                        <th> Description </th>
                        <th> Price </th>
                        <th> Stock </th>
                    </thead>

                    <!-- Main Body of the table -->
                    <tbody>
                        <?php
                            try{
                                $conn = new PDO("mysql:host=localhost:3306;dbname=ecomarce_db;", "root", "");
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                                $querystring = "SELECT * FROM products";
                    
                                $returnobj = $conn->query($querystring);
                                $returntable = $returnobj->fetchAll();
                    
                                if($returnobj->rowCount()==0){                    
                                    ?>
                                        <tr>
                                            <td colspan="5"> No Values Found </td>
                                        </tr>
                                    <?php
                                }
                                else{
                                    foreach($returntable as $rows){
                                        ?>
                                            <tr>
                                                <td> <?php echo $rows['id'] ?> </td>
                                                <td><?php echo $rows['pname'] ?></td>
                                                <td><?php echo $rows['descrp']?></td>
                                                <td> <?php echo $rows['price'] ?> </td>
                                                <td> <?php echo $rows['stock'] ?> </td>
                                            </tr>
                                        <?php
                                    }
                                }
                            }
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="5"> No Data Found </td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

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

        <!-- JS files for DataTables -->
        <script src="dataTables/jquery.dataTables.min.js"></script>
        <script src="dataTables/dataTables.bootstrap4.min.js"></script>

        <script>
            // Call the dataTables jQuery plugin
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });

        </script>

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
