<?php include('partials/menu.php') ?>
</div>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Food</h1>
                </br> </br>
                    <?php 
                        if (isset($_SESSION['add']))
                        {
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                     ?> 
            <form action="" method="POST" autocomplete = "off" enctype = "multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>TITLE:</td>
                        <td>
                        <input type="text" name="title" placeholder="Enter Food Title ">
                        </td>
                    </tr>

                    <tr>
                        <td>PRICE:</td>
                        <td>
                        <input type="text" name="price" placeholder="Enter The Price ">
                        </td>
                    </tr>

                    <tr>
                        <td>CATAGORY:</td>
                        <td>
                            <input type="text" name="catagory" placeholder="Enter The Catagory ">
                        </td>
                    </tr>
                    <tr>
                        <td>PHOTO:</td>
                        <td>
                        <input type="file" name="image_name">
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td>DESCRIPTION</td>
                        <td>
                        <input style = "width:300px; height:50px;" type="text" name="description" placeholder="Enter description about food">
                        </td>
                    </tr>
                    <tr>
                    

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="ADD FOOD" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
</div>

<?php include('partials/footer.php') ?>
<?php
//to save admin in the database
// check the submit button is clicked or not
    if (isset($_POST['submit']))
    {
     $title=$_POST['title'];
     $price=$_POST['price'];
     $catagory=$_POST['catagory'];
     $description=$_POST['description'];
     $image_name = $_FILES['image_name']['name'];
    $res_username =$_SESSION['username'];
     $target = "uploads/".basename($_FILES["image_name"]["name"]);
    move_uploaded_file ($_FILES["image_name"]["tmp_name"], $target);

// sql to insert to database
    $sql="INSERT INTO tbl_food SET
        title='$title',
        price='$price',
        catagory_id='$catagory',
        description='$description',
        image_name='$image_name',
        res_username='$res_username'
        ";
    $res=mysqli_query($conn,$sql) or die(mysqli_error());
    if($res==TRUE)
    {
        $_SESSION['add']="Food Added Successfully";
        header("location:".SITEURL.'restaurant/manage-food.php');
    }
    else
    {
        $_SESSION['add']="Faild to add Food";
        header("location:".SITEURL.'restaurant/add-food.php');
    }


    }
    

?>