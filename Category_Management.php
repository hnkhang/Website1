    <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
        <form name="frm" method="post" action="">
        <h1>Product Category</h1>
        <p>
        <img src="assets/images/add.png" alt="Add new" width="16" height="16" border="0" /> <a href="?page=add_category"> Add</a>
        </p>
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Category Name</strong></th>
                     <th><strong>Description</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
                include_once("connection.php");
                $NO = 1;
                $result = mysqli_query($conn,"SELECT * FROM category");
                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
            ?>
			<tr>
              <td class="cotCheckBox"><?php echo $NO;?></td>
              <td><?php echo $row["Cat_Name"];?></td>
              <td><?php echo $row["Cat_Des"];?></td>
              <td style='text-align:center'><a href="?page=update_category&&id=<?php echo $row["Cat_ID"];?>"><img src='assets/images/edit.png' border='0'  /> </a></td>
              <td style='text-align:center'><a href="?page=category_management&&function=del&&id=<?php echo $row["Cat_ID"];?>" onclick="return DeleteConfirm()"><img src='assets/images/delete.png' border='0' /> </a></td>
            </tr>
            <?php
            $NO++;
            }
            ?>
            <?php
                if(isset($_GET["function"])=="del"){
                    if(isset($_GET["id"])){
                        $id = $_GET["id"];
                        mysqli_query($conn, "DELETE From product where Cat_ID='$id'");
                        mysqli_query($conn, "DELETE From Category where Cat_ID='$id'");
                    }
                }
            ?>
			</tbody>
        </table>  
        
        
        <!--Nút Thêm mới , xóa tất cả-->
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            	
            </div>
        </div><!--Nút chức nang-->
 </form>
   