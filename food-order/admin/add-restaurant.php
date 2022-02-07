<?php include('partials/menu.php') ?>
<div class="main-content">
<div class="wrapper">
    <h1>Add Restaurant</h1>
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
            <td>NAME:</td>
            <td>
            <input type="text" name="name" placeholder="Enter The Restaurant name">
            </td>
        </tr>
        <tr>
            <td>USERNAME:</td>
            <td>
                <input type="text" name="username" placeholder="Enter restaurant username ">
            </td>
        </tr>
        <tr>
            <td>DESCRIPTION</td>
            <td>
            <input style = "width:300px; height:50px;" type="text" name="description" placeholder="Enter description about food">
            </td>
        </tr>
        <tr>
            <td>LOCATION:</td>
            <td>
                <input type="text" name="location" placeholder="Enter restaurant username ">
            </td>
        </tr>
        <tr>
            <td>PASSWORD:</td>
            <td>
                <input type="password" name="password" placeholder="Enter new restaurant Password ">
            </td>
        </tr>
        <tr>
            <td>PHOTO:</td>
            <td>
            <input type="file" name="menu_image">
            </td>
        </tr>
        <tr>      
        <tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Restaurant" class="btn-secondary">
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
        $name=$_POST['name'];
        $username=$_POST['username'];
        $location=$_POST['location'];
        $description=$_POST['description'];
        $password=$_POST['password'];
        $menu_image= $_FILES['menu_image']['name'];
       
        $target = "uploads/".basename($_FILES["menu_image"]["name"]);
        move_uploaded_file ($_FILES["menu_image"]["tmp_name"], $target); // for encryption
// sql to insert to database
    $sql="INSERT INTO tbl_restaurant SET
        name='$name',
        username='$username',
        location='$location',
        description='$description',
        password='$password',
        menu_image='$menu_image'
        ";
    $res=mysqli_query($conn,$sql) or die(mysqli_error());
    if($res==TRUE)
    {
        $_SESSION['add']="Restaurant Added Successfully";
        header("location:".SITEURL.'admin/manage-restaurant.php');
    }
    else
    {
        $_SESSION['add']="Faild to add Restaurant";
        header("location:".SITEURL.'admin/add-restaurant.php');
    }


    }
    

?>