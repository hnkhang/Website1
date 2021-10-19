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
        $date = $_POST['slDate'];
        $month = $_POST['slMonth'];
        $year = $_POST['slYear'];
        $err = "";
        if($us==""){
            $err .= "<li>Enter username please </li><br/>";
        }
        if($email==""){
            $err .= "<li>Enter Email please</li> <br/>";
        }
        if($sub==""){
            $err .= "<li>Enter your specification
             please</li> <br/>";
        }
        if($date=="0" || $month=="0" || $year=="0"){
            $err .="<li> Choose the time you want to book please</li><br/>";
        }
        if($err!=""){
            echo $err;
        }
        else{
                $us = htmlspecialchars(mysqli_real_escape_string($conn,$us));
				$email = htmlspecialchars(mysqli_real_escape_string($conn,$email));
				$sub = htmlspecialchars(mysqli_real_escape_string($conn,$sub));
				
                $sq = "SELECT * FROM booking where Username='$us' and email = '$email' and ReservationDate='$date' and ReservationMonth='$month' and ReservationYear='$year'";
				$result = mysqli_query($conn, $sq);
				if(mysqli_num_rows($result)==0){
					mysqli_query($conn, "INSERT INTO booking (Username, email, ReservationDate, ReservationMonth, ReservationYear, Specification) 
                    VALUES ('$us', '$email', '$date', '$month', '$year', '$sub')");
					echo "<script>alert('Your information has been sent, an email will arrive shortly')</script>";
                }
                else{
					echo '<li> Duplicate record</li>';
				}
              
    }
}
?>
<h1>Table Booking</h1>
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
		<label for="txtPass" class="col-sm-2 control-label" >Specification(*):  </label>			
		<div class="col-sm-10">
		      	<input type="text" name="txtSub" id="txtSub" class="form-control" placeholder="What is your specification?" value=""/>
		</div>
	</div> 
    <div class="form-group"> 
                            <label for="lblNgaySinh" class="col-sm-2 control-label">Date of your reservation:  </label>
                            <div class="col-sm-10 input-group">
                                <span class="input-group-btn">
                                  <select name="slDate" id="slDate" class="form-control" >
                						<option value="0">Choose Date</option>
										<?php
                                            for($i=1;$i<=31;$i++)
                                             {                                                
                                                 echo "<option value='".$i."'>".$i."</option>";
                                             }
                                        ?>
                				 </select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slMonth" id="slMonth" class="form-control">
                					<option value="0">Choose Month</option>
									<?php
                                        for($i=1;$i<=12;$i++)
                                         {
                                             echo "<option value='".$i."'>".$i."</option>";
                                         }
                          
                                    ?>
                				</select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slYear" id="slYear" class="form-control">
                                    <option value="0">Choose Year</option>
                                    <?php
                                        for($i=2021;$i<=2022;$i++)
                                         {
                                             echo "<option value='".$i."'>".$i."</option>";
                                         }
                                    ?>
                                </select>
                                </span>
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
                            