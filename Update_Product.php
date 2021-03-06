    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
<?php
	include_once("connection.php");
	function bind_Category_List($conn, $selectedValue){
		$sqlstring ="SELECT cat_id, cat_name from category";
		$result = pg_query($conn, $sqlstring);
		echo "<select name='CategoryList' class='form-control'>
		<option value='0'>Choose category</option>";
		while ($row = pg_fetch_array($result, Null, PGSQL_ASSOC)){
			if($row['cat_id']==$selectedValue){
				echo"<option value='". $row['cat_id']."' selected>".$row['cat_name']."</option>";
			}
			else{
				echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
			}
		}
	echo"</select>";
	}

?>
<?php	
	if(isset($_POST["btnUpdate"]))
	{
		$id = $_POST["txtID"];
		$proname = $_POST["txtName"];
		$detail = $_POST["txtDetail"];
		$price = $_POST["txtPrice"];
		$pic = $_FILES['txtImage'];
		$category = $_POST['CategoryList'];

		$err = "";
		
		if(trim($proname)==""){
			$err .= "<li>Enter product name please</li>";
		}
		if($category=="0"){
			$err .= "<li>choose product category please</li>";
		}
		if(!is_numeric($price)){
			$err .= "<li>Product price must be a number</li>";
		}
		if($err!=""){
			echo "<ul>$err</ul>";
		}
		else{
			if($pic['name']!="")
			{
			if($pic['type']=="image/png" || $pic['type']=="image/jpg" || $pic['type']=="image/jpeg" || $pic['type']=="image/gif")
			{
				if($pic['size'] <= 614000){
					$sq = "SELECT * From product where product_id !='$id' and product_name='$proname'";
					$result = pg_query($conn,$sq);
					if(pg_num_rows($result)==0){
						copy($pic['tmp_name'], "assets/images/".$pic['name']);
						$filePic = $pic['name'];
						$sqlstring = "UPDATE product set product_name='$proname', price='$price', detaildesc='$detail', pro_image='$pic', cat_id='$category' where product_id='$id' ";
						
						pg_query($conn,$sqlstring);
						echo '<meta http-equiv="refresh" content="0; URL=?page=product_management">';
					}
					else{
						echo "<li>Dulicate name</li>";
					}
				}
				else
				{
					echo "<li>Size is too big</li>";
				}
			
			
			}
			else{
				echo "<li>Image format is not correct</li>";
			}
		}
			else {
				$sq = "SELECT * From product where product_id !='$id' and product_name='$proname'";
						$result = pg_query($conn,$sq);
						if(pg_num_rows($result)==0){

							$sqlstring = "UPDATE product set product_name='$proname', price='$price', detaildesc='$detail', cat_id='$category' where product_id='$id'";
							
							pg_query($conn,$sqlstring);
							echo '<meta http-equiv="refresh" content="0; URL=?page=product_management">';
			             }	
						else {
							echo "<li>Dulicate product name</li>";
							}
			} 
		}

	}
		
	
?>
<?php
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$sqlstring = "SELECT product_name, price, detaildesc,
		 pro_image, cat_id from product where product_id='$id'";

		 $result= pg_query($conn,$sqlstring);
		 $row = pg_fetch_array($result, Null, PGSQL_ASSOC);	
		 
		 $proname= $row['product_name'];
		 $price = $row['price'];
		 $detail = $row['detaildesc'];
		 $pic = $row['pro_image'];
		 $category = $row['cat_id'];	
?>
<div class="container">
	<h2>Updating Product</h2>

	 	<form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="txtTen" class="col-sm-2 control-label">Product ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" 
								  placeholder="Product ID" readonly value='<?php echo $id; ?>'/>
							</div>
				</div> 
				<div class="form-group"> 
					<label for="txtTen" class="col-sm-2 control-label">Product Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" 
								  placeholder="Product Name" value='<?php echo $proname; ?>'/>
							</div>
                </div>   
                <div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product category(*):  </label>
							<div class="col-sm-10">
							      <?php bind_Category_List($conn, $category);  ?>
							</div>
                </div>  
                          
                <div class="form-group">  
                    <label for="lblGia" class="col-sm-2 control-label">Price(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value='<?php echo $price; ?>'/>
							</div>
                 </div>   
                            
                            
                <div class="form-group">  
        	        <label for="lblDetail" class="col-sm-2 control-label">Detail description(*):  </label>
							<div class="col-sm-10">
							      <textarea name="txtDetail" rows="4" class="ckeditor"><?php echo $detail; ?></textarea>
              					  <script language="javascript">
                                        CKEDITOR.replace( 'txtDetail',
                                        {
                                            skin : 'kama',
                                            extraPlugins : 'uicolor',
                                            uiColor: '#eeeeee',
                                            toolbar : [ ['Source','DocProps','-','Save','NewPage','Preview','-','Templates'],
                                                ['Cut','Copy','Paste','PasteText','PasteWord','-','Print','SpellCheck'],
                                                ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                                                ['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
                                                ['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
                                                ['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote'],
                                                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
                                                ['Link','Unlink','Anchor', 'NumberedList','BulletedList','-','Outdent','Indent'],
                                                ['Image','Flash','Table','Rule','Smiley','SpecialChar'],
                                                ['Style','FontFormat','FontName','FontSize'],
                                                ['TextColor','BGColor'],[ 'UIColor' ] ]
                                        });	
                                    </script> 
                                  
							</div>
                </div>
                            
 
				<div class="form-group">  
	                <label for="sphinhanh" class="col-sm-2 control-label">Image(*):  </label>
							<div class="col-sm-10">
							<img src='assets/images/<?php echo $pic;  ?>' border='0' width="50" height="50"  />
							      <input type="file" name="txtImage" id="txtImage" class="form-control" value=""/>
							</div>
                </div>
                        
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
                              <input type="reset" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=product_management'" />
                              	
						</div>
				</div>
			</form>
</div>
<?php
	}
	else{
		echo '<meta http-equiv="refresh" content="0; URL=?page=product_management"/>';
	}
?>
