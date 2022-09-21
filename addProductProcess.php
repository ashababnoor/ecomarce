<?php

if ($_SERVER['REQUEST_METHOD']=="POST"){

    //checking if the fields are set and not empty
    if(   isset($_POST['pname']) 
       && !empty($_POST['pname'])
       && isset($_POST['desc'])
       && !empty($_POST['desc'])
       && isset($_POST['price'])
       && !empty($_POST['price'])
       && isset($_POST['stock'])
       && !empty($_POST['stock'])
    ){
        $name=$_POST['pname'];
        $desc=$_POST['desc'];
        $price=$_POST['price'];
        $stock=$_POST['stock'];

        try{
            $conn = new PDO("mysql:host=localhost:3306;dbname=ecomarce_db;", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $querystring = "INSERT INTO `products`(`pname`, `descrp`, `price`, `stock`) 
                            VALUES('$name', '$desc', $price, $stock)"; 
            
            $conn->exec($querystring);

            ?>
                <script> location.assign("addProduct.php"); alert("Product added!"); </script>

            <?php
            
        }
        catch(PDOException $ex){

            //reroute to employee login page
            ?>
                <script>location.assign("employeeHome.php");</script>
            <?php
        }
    }
    else{ 
        //if email and password is empty or not set, we will reroute to the login page
        ?>
            <script>location.assign("index.html");</script>
        <?php
    }
}
else{

    //reroute to employee login page if request method isn't post
    ?>
        <script>location.assign("index.html");</script>
    <?php
}

?>