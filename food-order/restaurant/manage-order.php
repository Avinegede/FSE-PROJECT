<?php include('partials/menu.php') ?>
<table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>FOOD</th>
                        <th>QUANTITY</th>
                        <th>ORDER DATE</th>
                        <th>ORDER TYPE</th>
                        <th>CUSTOMER NAME</th>
                        <th>CUSTOMER CONTACT</th>
                        <th>CUSTOMER EMAIL</th>
                        <th>CUSTOMER ADDRESS</th>
                    </tr>
                <?php
                $res_name = $_SESSION['restorant_username'];
    
                        $sql="SELECT * FROM tbl_order WHERE res_name = '$res_name'";
                        $res=mysqli_query($conn,$sql);
                        if ($res==TRUE)
                        {
                            $count=mysqli_num_rows($res);
                            $sn=1;
                            if ($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $food=$rows['food'];
                                    $qty=$rows['qty'];
                                    $order_date=$rows['order_date'];
                                    $ordertype=$rows['ordertype'];
                                    $customer_name=$rows['customer_name'];
                                    $customer_contact=$rows['customer_contact'];
                                    $customer_email=$rows['customer_email'];
                                    $customer_address=$rows['customer_address'];

                                    ?>
                                        <tr>
                                            <td><?php echo $sn++ ?></td>
                                            <td><?php echo $food?></td>
                                            <td><?php echo $qty?></td>
                                            <td><?php echo $order_date ?></td>
                                            <td><?php echo $ordertype ?></td>
                                            <td><?php echo $customer_name ?></td>
                                            <td><?php echo $customer_contact?></td>
                                            <td><?php echo $customer_email ?></td>
                                            <td><?php echo $customer_address ?></td>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            
                        }
                    
                    ?>
                </table>