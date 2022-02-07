<?php include('../config/constants.php') ?>

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

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
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
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"Category"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
</body>
<?php
                        $sql="SELECT * FROM tbl_food";
                        $res=mysqli_query($conn,$sql);
                        if ($res==TRUE)
                        {
                            $count=mysqli_num_rows($res);
                            $sn=1;
                            if ($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $title=$rows['title'];
                                    $id=$rows['id'];
                                    $res_name=$rows['res_username'];
                                    $price=$rows['price'];
                                    $catagory_id=$rows['catagory_id'];
                                    $description=$rows['description'];
                                    $image_name=$rows['image_name'];

                                    ?>
                                      <section class="food-menu">
                                        <div class="container">
        

                                            <div class="food-menu-box">
                                              <div class="food-menu-img">
                                              <?php echo "<img width = 100px height = 100px object-fit = cover border-radius: 50% src='uploads/".$image_name."'>"; ?>
                                                  
                                                </div>

                                            <div class="food-menu-desc">
                                            <h4><?php echo $title?></h4>
                                            <p class="food-price"><?php echo $price?></p>
                                            <p class="food-detail"><?php echo $description ?></p>
                                            <br />
                                            <a href="order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                         </div>
                                        </div>
                                      </section>  
                                    
                                      <?php
                                }
                            }
                            
                        }
                    
                    ?>
<?php include ('partials/footer.php'); ?>
