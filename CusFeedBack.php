<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <script language="javascript">
    
    </script>
        <form name="frm" method="post" action="">
        <h1>Customer feedback</h1>
        <p>
        
        </p>
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Customer username</strong></th>
                    <th><strong>Customer email</strong></th>
                     <th><strong>Feedback details</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
                include_once("connection.php");
                $NO = 1;
                $result = pg_query($conn,"SELECT * FROM feedback");
                while($row=pg_fetch_array($result, Null, PGSQL_ASSOC))
                {
            ?>
			<tr>
              <td class="cotCheckBox"><?php echo $NO;?></td>
              <td><?php echo $row["username"];?></td>
              <td><?php echo $row["email"];?></td>
              <td><?php echo $row["description"];?></td>
              
            </tr>
            <?php
            $NO++;
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