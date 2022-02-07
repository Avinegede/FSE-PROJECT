<?php include('partials/menu.php') ?>
        <!-- main content section start here -->
        <div class ="main-content">
                <div class ="wrapper">
                <h1>MANAGE FOOD</h1>
                </br> </br>
                <?php 
                if (isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                ?> 
                </br>
                </br>

                <!-- button to add admin -->
                <a href="add-food.php" class="btn-primary">Add Food</a>
            </br>  </br> </br>
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
    </div>
</div>

<?php include ('partials/footer.php'); ?>
