    <!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
<?php
	include_once("connection.php");
	function bind_Category_List($conn){
		$sqlstring = "select Cat_ID, Cat_Name from  Category";
		$result = mysqli_query($conn,$sqlstring);
		echo "<select name='CategoryList' class= 'form-control'>
		<option value='0'>Choose category</option>";
		while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
			echo "<option value='".$row['Cat_ID']."'>".$row['Cat_Name']."</option>";
	}
	echo "</select>";
	}
	if(isset($_POST['btnAdd']))
	{
		$id= $_POST["txtID"];
		$proname = $_POST["txtName"];
		
		$detail = $_POST['txtDetail'];
		$price = $_POST['txtPrice'];
		
		$pic = $_FILES['txtImage'];
		$category = $_POST['CategoryList'];
		$err = "";

		if(trim($id)==""){
			$err .= "<li>Enter ID please</li>";
		}
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
			if($pic['type']=="image/png" || $pic['type']=="image/jpg" || $pic['type']=="image/jpeg" || $pic['type']=="image/gif")
			{
				if($pic['size'] <= 614000){
					$sq = "SELECT * From product where Product_ID='$id' or Product_Name='$proname'";
					$result = mysqli_query($conn,$sq);
					if(mysqli_num_rows($result)==0)
					{
						copy($pic['tmp_name'], "assets/images/".$pic['name']);
						$filePic = $pic['name'];
						$sqlstring = "INSERT into product(Product_ID, Product_Name, Price, DetailDesc, Pro_image, Cat_ID) 
						VALUES ('$id','$proname', '$price', '$detail', '$filePic', '$category')";
						
						mysqli_query($conn,$sqlstring);
						echo '<meta http-equiv="refresh" content="0; URL=?page=product_management">';
					}
					else{
						echo "<li>Dulicate ID or name</li>";
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
	}

?>
<div class="container">
	<h2>Adding new Product</h2>

	 	<form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="txtTen" class="col-sm-2 control-label">Product ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Product ID" value=''/>
							</div>
				</div> 
				<div class="form-group"> 
					<label for="txtTen" class="col-sm-2 control-label">Product Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Product Name" value=''/>
							</div>
                </div>   
                <div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product category(*):  </label>
							<div class="col-sm-10">
							      <?php bind_Category_List($conn); ?>
							</div>
                </div>  
                          
                <div class="form-group">  
                    <label for="lblGia" class="col-sm-2 control-label">Price(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value=''/>
							</div>
                 </div>   
                            
                <div class="form-group">  
        	        <label for="lblDetail" class="col-sm-2 control-label">Detail description(*):  </label>
							<div class="col-sm-10">
							      <textarea name="txtDetail" rows="4" class="ckeditor"></textarea>
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
							      <input type="file" name="txtImage" id="txtImage" class="form-control" value=""/>
							</div>
                </div>
                        
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=product_management'" />
                              	
						</div>
				</div>
			</form>
</div>
