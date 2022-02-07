<?php include('partials/menu.php'); ?> 

<div class= "main-content">
    <div class="wrapper">
        <h1>MANAGE RESTAURANT</h1>
         </br> </br> 
                <!-- button to add admin -->
                <a href="add-restaurant.php" class="btn-primary">ADD RESTAURANT</a>
                </br>  </br> </br>
                <table class="tbl-full">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>USERNAME</th>
                        <th>DESCRIPTION</th>
                        <th>LOCATION</th>
                        <th>PHOTO</th>
                    </tr>

                    <?php
                        $sql="SELECT * FROM tbl_restaurant";
                        $res=mysqli_query($conn,$sql);
                        if ($res==TRUE)
                        {
                            $count=mysqli_num_rows($res);
                            $sn=1;
                            if ($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id=$rows['id'];
                                    $name=$rows['name'];
                                    $username=$rows['username'];
                                    $location=$rows['location'];
                                    $description=$rows['description'];
                                    $menu_image=$rows['menu_image'];
                                    ?>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $name ?></td>
                                            <td><?php echo $username ?></td>
                                            <td><?php echo $description ?></td>
                                            <td><?php echo $location ?></td>
                                            <td><?php echo $menu_image ?></td>
                                            <td><?php echo "<img width = 100px height = 100px object-fit = cover src='uploads/".$menu_image."'>"; ?></td>

                                            <td>
                                            <a href="#" class="btn-secondary">Update RESTAURANT</a> 
                                            <a href="#" class="btn-danger">Delete RESTAURANT</a>  
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            
                        }
                    
                    ?>
                </table>
                </div>
        </div>
        <!-- main content section end here -->
<?php include ('partials/footer.php') ?>

<h1></h1>