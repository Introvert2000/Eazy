<?php

require_once 'connection.php';
$city = $_GET['city'];

if(empty($_SESSION['city'])){
    $select_query = mysqli_query($connection,"SELECT * FROM restaurant WHERE city = '{$city}' ");
    
}
else{
    $select_query = mysqli_query($connection,"SELECT * FROM restaurant ");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="book.css">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
<style>
    .custom-button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff; /* Button background color */
  color: #fff; /* Button text color */
  border: none; /* Remove default border */
  border-radius: 5px; /* Add rounded corners */
  cursor: pointer; /* Change cursor on hover to indicate interactivity */
  text-align: center; /* Center text horizontally */
  text-decoration: none; /* Remove underlines for <a> elements */
}

.custom-button:hover {
  background-color: #0056b3; /* Change background color on hover */
}

.custom-button:active {
  background-color: #00479e; /* Change background color when clicked */
}

</style>
</head>


<body>
<header>
        <nav>
            <div class="container">
                <div class="logo">
                    <a href="#">Happy Diner</a>
                </div>                
                <div class="menu">
                   <?php
                   session_start();
                   if(empty($_SESSION['Name1']))
                   {
                   
                   ?>
                    <ul>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                    <?php }
                    else{
                        ?>

                        <ul>
                        <li id="username"> <a><?php if(!empty($_SESSION['Name1'])){ echo $_SESSION['Name1']; }?></a> </li>
                        </ul>
                        
                        <?php
                    }
                    ?>
                </div>
            </div>
        </nav>
</header>
<main>
     <?php
        while($row = mysqli_fetch_assoc($select_query)){

    ?>
     <div class="card">
            <div class="image">
             
             <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />

        
            </div>
        <div class="caption">
           
                <?php 
                $restaurantName=$row['restaurant_name'];
                $_SESSION['restaurant']=$restaurantName;
                ?>

            <div>
                   <p class="product_name"><?php echo $restaurantName; ?></p>
                </div>
                <div class="mainart">
                <p class="price">$20</p>
                <div class="revi">
                <p class="price">3</p>
                <img class="star" src="star-svgrepo-com.svg" alt="">
                </div>
                </div>
            <button type="button" id="button_colour" onclick="displaySelectedOption(`<?php echo $restaurantName; ?>`)">Order</button>
            <script>
                function displaySelectedOption(restaurantName) {
                    window.location.href = `delivery_product2.php?restaurantName=${restaurantName}`;
                }
            </script>
        </div>
         

        </form>

     </div>
     <?php
}
     ?>
</main>

</body>
</html>

