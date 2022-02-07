
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <!-- custom css file link  -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style1.css" />
  <script src="https://unpkg.com/scrollreveal"></script>

  <title>All Restaurant Menu</title>
</head>


<header>

    <a href="#" class="logo"><i class="fas fa-utensils"></i>agelgel.</a>

    <nav class="navbar">
        <a href="#home">home</a>
          <a href="#about">about</a>
          <a href="#service">services</a>
          <a href="#team">team</a>
          <a href="#contact">contact</a>
          <a href="#">foods</a>
          <a href="/login.html">login</a>
          <a href="/login.html">sign up</a>
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-shopping-cart"></a>
    </div>
    
    </header>


 <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>TITLE</th>
                        <th>PRICE</th>
                        <th>CATAGORY</th>
                        <th>DESCRIPTION</th>
                        <th>PHOTO</th>
                    </tr>
                <?php
    $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
    $db_select=mysqli_select_db($conn,DB_NAME) or die(mysqli_error());  
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
                                    $price=$rows['price'];
                                    $catagory_id=$rows['catagory_id'];
                                    $description=$rows['description'];
                                    $image_name=$rows['image_name'];
                                    ?>
                                        <tr>
                                            <td><?php echo $sn++ ?></td>
                                            <td><?php echo $title?></td>
                                            <td><?php echo $price?></td>
                                            <td><?php echo $catagory_id ?></td>
                                            <td><?php echo $description ?></td>
                                            <td><?php echo "<img width = 100px height = 100px object-fit = cover src='uploads/".$image_name."'>"; ?></td>
                                            <td>
                                            <a href="#" class="btn-secondary">Update FOOD</a> 
                                            <a href="#" class="btn-danger">Delete FOOD</a>  
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            
                        }
                    
                    ?>
                </table>  
