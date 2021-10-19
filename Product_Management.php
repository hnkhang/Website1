
    
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
                        $sq = "select pro_image from product WHERE product_id = '$id'";

                        $res = pg_query($conn, $sq);
                        $row = pg_fetch_array($res, Null, PGSQL_ASSOC);
                        $filepic = $row['pro_image'];
                        unlink("assets/images/".$filepic);
                        pg_query($conn, "DELETE From product where product_id = '$id'");
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
                $result = pg_query($conn, "SELECT product_id, product_name, price, pro_image, cat_name 
                From product a, category b
                where a.cat_id = b.cat_id order by price DESC ");

                while($row=pg_fetch_array($result, Null, PGSQL_ASSOC))
                {
			?>
			<tr>
              <td ><?php echo $No;  ?></td>
              <td ><?php echo $row["product_id"]; ?></td>
              <td><?php echo $row["product_name"]; ?></td>
              <td><?php echo $row["price"]; ?></td>
              <td><?php echo $row["cat_name"]; ?></td>
             <td align='center' class='cotNutChucNang'>
                 <img src='assets/images/<?php echo $row['pro_image'] ?>' border='0' width="50" height="50"  /></td>
             <td align='center' class='cotNutChucNang'><a href="?page=update_product&&id=<?php echo $row["product_id"];?>"><img src='assets/images/edit.png' border='0'/></a></td>
             <td align='center' class='cotNutChucNang'><a href="?page=product_management&&function=del&&id=<?php echo $row["product_id"];?>" onclick="return DeleteConfirm()"><img src='assets/images/delete.png' border='0' /></a></td>
            </tr>
            <?php
               $No++;
                }
			?>
           
			</tbody>
        
        </table>  

 </form>

