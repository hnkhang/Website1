<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css">
<script src="js/jquery-3.2.0.min.js"/></script>
<script src="js/jquery.dataTables.min.js"/></script>
<script src="js/dataTables.bootstrap.min.js"/></script>
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>



<?php
    if(isset($_POST['btnLogin']))
    {
        $us = $_POST['txtUsername'];
        $us = mysqli_real_escape_string($conn, $us);
        $pa = $_POST['txtPass'];
        $err = "";
        if($us==""){
            $err .= "Enter username please <br/>";
        }
        if($pa==""){
            $err .= "Enter password please <br/>";
        }
        if($err!=""){
            echo $err;
        }
        else{
            include_once("connection.php");
            $pass = md5($pa);
            $res = mysqli_query($conn, "Select Username, Password, state from customer where Username='$us' and Password='$pass'") 
            or die(mysqli_error($conn));
            $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
            if(mysqli_num_rows($res)==1){
                $_SESSION["us"] =$us;
                $_SESSION["admin"] = $row["state"]; 
                echo "<script> alert('You have logged in successfully')</script>";
                echo '<meta http-equiv="refresh" content="0;url=?page=index">';
            }
            else{
                echo "you have logged in fail";
            }
        }

       
    }
?>


<h1>Login</h1>
<form id="form1" name="form1" method="POST" >
<div class="row">
    <div class="form-group">				    
        <label for="txtUsername" class="col-sm-2 control-label">Username(*):  </label>
		<div class="col-sm-10">
		      <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value=""/>
		</div>
      </div>  
      
    <div class="form-group">
		<label for="txtPass" class="col-sm-2 control-label" >Password(*):  </label>			
		<div class="col-sm-10">
		      	<input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Password" value=""/>
		</div>
	</div> 
	<div class="form-group"> 
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
        	<input type="submit" name="btnLogin"  class="btn btn-primary" id="btnLogin" value="Login"/>
            <input type="submit" name="btnCancel"  class="btn btn-primary" id="btnLogin" value="Cancel"/>
		</div>  
	</div>
 </div>
    
</form>
   