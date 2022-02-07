<?php 
include('../config/constants.php');
if(!isset($_GET['food_id'])){
    header("location: foods.php");
}

$id = $_GET['food_id'];
$sql = "SELECT * FROM tbl_food WHERE id = {$id}";
$query = mysqli_query($conn, $sql);
$food_data = mysqli_fetch_assoc($query);

if(isset($_POST['submit'])){
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $customer_contact = mysqli_real_escape_string($conn, $_POST['customer_contact']);
    $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
    $ordertype = mysqli_real_escape_string($conn, $_POST['ordertype']);
    $customer_address = mysqli_real_escape_string($conn, $_POST['customer_address']);
    $food_title = $food_data['title'];
    $res_name = $food_data['res_username'];
    $sql = "INSERT INTO `tbl_order`(`food`, `qty`, `ordertype`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `res_name`) VALUES ('{$food_title}','{$qty}','{$ordertype}','{$customer_name}','{$customer_contact}','{$customer_email}','{$customer_address}','{$res_name}')";
    if(mysqli_query($conn, $sql)){
        // success message
        echo '
        <script>alert("Successfuly Orederd!")</script>
        ';
    }else{
        // error message
        echo '
        <script>alert("Something went wrong, please try again!")</script>
        ';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/style2.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" class="logo"><i class="fas fa-utensils"></i>agelgel.</a>
            
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="catagories.php">Categories</a>
                    </li>
                    <li>
                        <a href="foods.php">Foods</a>
                    </li>
                    
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>

                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form class="order" method="POST" autocomplete = "off">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="uploads/<?php echo $food_data['image_name']; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $food_data['title'];?></h3>
                        <p class="food-price"><?php echo $food_data['price'];?></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="customer_name" placeholder="E.g. abebe balcha" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="customer_contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="customer_email" placeholder="E.g. hi@abebe balcha.com" class="input-responsive" required>
                    
                    <select class="order-label" name="ordertype" id="">
                        <option value="Delivery">Delivery</option>
                        <option value="Reserve">Reserve</option>
		            </select>
                    <div class="order-label">Address</div>
                    <textarea name="customer_address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">THE TEAM </a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->
