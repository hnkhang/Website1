<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css">
<script src="js/jquery-3.2.0.min.js"/></script>
<script src="js/jquery.dataTables.min.js"/></script>
<script src="js/dataTables.bootstrap.min.js"/></script>
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
</head>

<body> 
    
<?php
    include_once("connection.php");
    if(isset($_POST['btnSend']))
    {
        $us = $_POST['txtUsername'];
        $email = $_POST['txtEmail'];
        $sub = $_POST['txtSub'];
        $err = "";
        if($us==""){
            $err .= "Enter username please <br/>";
        }
        if($email==""){
            $err .= "Enter Email please <br/>";
        }
        if($sub==""){
            $err .= "Enter your feedback
             please <br/>";
        }
        if($err!=""){
            echo $err;
        }
        else{
                $us = htmlspecialchars(mysqli_real_escape_string($conn,$us));
				$email = htmlspecialchars(mysqli_real_escape_string($conn,$email));
				$sub = htmlspecialchars(mysqli_real_escape_string($conn,$sub));
				
                $sq = "SELECT * FROM feedback where Username='$us' and Email = '$email' and Description='$sub'";
				$result = mysqli_query($conn, $sq);
				if(mysqli_num_rows($result)==0){
					mysqli_query($conn, "INSERT INTO feedback (Username, Email, Description) VALUES ('$us', '$email', '$sub')");
					echo "<script>alert('Feedback sent thanks for your opinion')</script>";

                }
                else{
					echo '<li> Duplicate record</li>';
				}
        

       
    }
}
?>
<h1>Your Feedback</h1>
<form id="form1" name="form1" method="POST" >
<div class="row">
    <div class="form-group">				    
        <label for="txtUsername" class="col-sm-2 control-label">Username(*):  </label>
		<div class="col-sm-10">
		      <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value=""/>
		</div>
      </div>  
      
    <div class="form-group">
		<label for="txtPass" class="col-sm-2 control-label" >Email(*):  </label>			
		<div class="col-sm-10">
		      	<input type="text" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email" value=""/>
		</div>
	</div> 
    <div class="form-group">
		<label for="txtPass" class="col-sm-2 control-label" >Subject(*):  </label>			
		<div class="col-sm-10">
		      	<input type="text" name="txtSub" id="txtSub" class="form-control" placeholder="What's your problem?" value=""/>
		</div>
	</div> 
	<div class="form-group"> 
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
        	<input type="submit" name="btnSend"  class="btn btn-primary" id="btnSend" value="Send"/>
            <input type="reset" name="btnCancel"  class="btn btn-primary" id="btnCancle" value="Cancel"/>
		</div>  
	</div>
 </div>
    
</form>        
                   
</body>      
                            