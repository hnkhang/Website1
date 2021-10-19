
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
    <script language="javascript">
    function DeleteConfirm(){
        if(confirm("Are you sure?")){
            return true;
        }
        else{
            return false;
        }
    }
    </script>

<?php
include_once("connection.php");

                if(isset($_GET["function"])=="del"){
                    if(isset($_GET["id"])){
                        $id = $_GET["id"];
                        $sq = "select Pro_image from product WHERE Product_ID = '$id'";

                        $res = mysqli_query($conn, $sq);
                        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
                        $filepic = $row['Pro_image'];
                        unlink("assets/images/".$filepic);
                        mysqli_query($conn, "DELETE From product where Product_ID = '$id'");
                    }
                }
            ?>
        <form name="frm" method="post" action="">
        <h1>Product Management</h1>
        <p>
        	<img src="assets/images/add.png" alt="Thêm mới" width="16" height="16" border="0" /><a href="?page=add_product"> Add new</a>
        </p>
        <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Product ID</strong></th>
                    <th><strong>Product Name</strong></th>
                    <th><strong>Price($)</strong></th>
                    <th><strong>Category</strong></th>
                    <th><strong>Image</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
            				$No = 1;
                $result = mysqli_query($conn, "SELECT Product_ID, Product_Name, Price, Pro_image, Cat_Name 
                From Product a, Category b
                where a.Cat_ID = b.Cat_ID order by Price DESC ");

                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
			?>
			<tr>
              <td ><?php echo $No;  ?></td>
              <td ><?php echo $row["Product_ID"]; ?></td>
              <td><?php echo $row["Product_Name"]; ?></td>
              <td><?php echo $row["Price"]; ?></td>
              <td><?php echo $row["Cat_Name"]; ?></td>
             <td align='center' class='cotNutChucNang'>
                 <img src='assets/images/<?php echo $row['Pro_image'] ?>' border='0' width="50" height="50"  /></td>
             <td align='center' class='cotNutChucNang'><a href="?page=update_product&&id=<?php echo $row["Product_ID"];?>"><img src='assets/images/edit.png' border='0'/></a></td>
             <td align='center' class='cotNutChucNang'><a href="?page=product_management&&function=del&&id=<?php echo $row["Product_ID"];?>" onclick="return DeleteConfirm()"><img src='assets/images/delete.png' border='0' /></a></td>
            </tr>
            <?php
               $No++;
                }
			?>
           
			</tbody>
        
        </table>  

 </form>

